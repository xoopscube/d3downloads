<?php

include XOOPS_ROOT_PATH."/header.php";

require_once dirname( dirname(__FILE__) ).'/class/gtickets.php' ;
require_once dirname( dirname(__FILE__) ).'/class/user_access.php' ;
include_once dirname( dirname(__FILE__) ).'/class/mycategory.php' ;
require_once dirname( dirname(__FILE__) ).'/class/post_check.php' ;
require_once dirname( dirname(__FILE__) ).'/class/submit_download.php' ;
require_once dirname( dirname(__FILE__) ).'/include/transact_functions.php' ;
require_once dirname( dirname(__FILE__) ).'/include/common_functions.php' ;
include_once dirname( dirname(__FILE__) ).'/include/upload_functions.php' ;

global $xoopsUser , $xoopsModuleConfig , $xoopsConfig ;

if( is_object( $xoopsUser ) ) {
	$xoops_isuser = true ;
	$xoops_userid = $xoopsUser->getVar('uid') ;
	$xoops_uname = $xoopsUser->getVar('uname') ;
	$module_handler =& xoops_gethandler( 'module' ) ;
	$module =& $module_handler->getByDirname( $mydirname ) ;
	$mid = $module->getVar('mid') ;
	$module_admin = $xoopsUser->isAdmin( $mid ) ;
} else {
	$xoops_isuser = false ;
	$xoops_userid = 0 ;
	$xoops_uname = '' ;
	$module_admin = false ;
}

$ispreview = $iserror = $auto_approved = $canhtml = $canupload = $config_error = 0 ;
$permissions = $category = $select_platform = $select_license = $img_ar = $liveformErrors= array() ;
$shots_help = $preview_title = $preview_body = $error_message = '';

if( ! empty( $_GET['cid'] ) ) $cid = intval( $_GET['cid'] ) ;
elseif( ! empty( $_POST['cid'] ) ) $cid = intval( $_POST['cid'] ) ;

// �o�^�� CID �̎w���K�v�Ƃ��܂�
if( empty( $cid ) ){
	redirect_header(XOOPS_URL.'/modules/'.$mydirname.'/index.php',3, _MD_D3DOWNLOADS_NO_CID );
	exit();
}

// ���݂��Ȃ� CID �̏ꍇ���_�C���N�g
$mycategory = new MyCategory( $mydirname, 'Show', $cid ) ;
if( ! $mycategory->return_cid() ) {
	redirect_header( XOOPS_URL."/modules/$mydirname/" , 2 , _MD_D3DOWNLOADS_NOREADPERM ) ;
	exit();
}

// ���e�������`�F�b�N
$user_access = new user_access( $mydirname ) ;
$permissions = $user_access->permissions_of_current_user( $cid ) ;
if( empty( $permissions['can_post'] ) ) {
	redirect_header(XOOPS_URL.'/modules/'.$mydirname.'/',3, _MD_D3DOWNLOADS_NOSUBMITPERM );
	exit();
}

// �������F�̃`�F�b�N(�Ǘ��҂͏���)
$auto_approved = $permissions['auto_approved'] ;

// HTML���̃`�F�b�N(�o�^���[�U�[�ȊO�� HTML�𖳌��Ƃ���)
$canhtml = $permissions['can_html'] ;

// �A�b�v���[�h���̃`�F�b�N
$canupload = $permissions['can_upload'] ;

// �Ǘ��҂ƊǗ��҈ȊO�̃e���v���[�g�𕪂��ď���
if( $module_admin ){
	$xoopsOption['template_main'] = $mydirname.'_admin_submit.html' ;
} else {
	$xoopsOption['template_main'] = $mydirname.'_main_submit.html' ;
}

// �p�����������̏���
$whr_cat = "cid IN (".implode(",", $user_access->can_read() ).")" ;
$bc[0] = d3download_breadcrumbs( $mydirname ) ;
$breadcrumbs = array_merge( $bc ,d3download_breadcrumbs_tree( $mydirname, $cid, $whr_cat, '', 1 ) ) ;
$formtitle = _MD_D3DOWNLOADS_SUBMIT_NEW ;
$breadcrumbs[] = array( 'name' => $formtitle ) ;

// ���e�\�ȃJ�e�S�����X�g�̂ݎ擾
$whr_cat4post = "cid IN (".implode(",", $user_access->can_post() ).")" ;
if( $module_admin ) $category = d3download_categories_selbox( $mydirname, $whr_cat4post );
else $category = d3download_categories_selbox( $mydirname, $whr_cat4post, $cid );

// ���p�\�� OS/�\�t�g���̃��X�g���擾
$submit_download = new submit_download( $mydirname ) ;
$select_platform = $submit_download->Select_Platform() ;

// ���C�Z���X�̃��X�g���擾
$select_license = $submit_download->Select_License() ;

// �X�N���[���V���b�g�摜�̎擾
$canuseshots = $submit_download->can_useshots() ;
$usealbum = $submit_download->can_albumselect() ;
if( ! empty( $canuseshots ) ){
	$shots_dir = d3download_shots_dir( $mydirname, $cid );
	$img_ar = $submit_download->shots_img_ar( $cid, $shots_dir );
	if( empty( $usealbum ) ) $shots_help = sprintf( _MD_D3DOWNLOADS_SUBMIT_LOGOURL_DESC , $shots_dir );
}

$defalthp = XOOPS_URL.'/' ;
$defaltsitename = $xoopsConfig['sitename'] ;

// �J�e�S�����̓��e�t�H�[��������������Ύ擾
$message = d3download_submit_message( $mydirname , $cid );

// ���ꃊ���N�̍ēo�^�������邩�ǂ���
$check_url = ! empty( $xoopsModuleConfig['check_url']) ? 1 : 0 ;

// maxfilesize(�e���v���[�g�ւ̃A�T�C���p)
$upload_max_filesize = d3download_get_maxsize( $mydirname );
$max_submit_size = sprintf( _MD_D3DOWNLOADS_SUBMIT_MAXFILESIZE , number_format( $upload_max_filesize ) );
$submit_extension = d3download_get_allowed_extension( $mydirname );

// ���`�F�b�N�� error �̏ꍇ�̓A�b�v���[�h�t�H�[����I���ł��Ȃ��悤�ɂ���
$config_error = d3download_upload_config_check( $mydirname );

// set content4assign as initial data
if( empty( $ispreview ) && empty( $iserror ) ) $download4assign = array(
	'cid' => $cid ,
	'created_time' => time() ,
	'category' => $category ,
	'description' => '' ,
	'visible' => '1' ,
	'cancomment' => '1' ,
	'candelete' => '0' ,
	'html' => '0' ,
	'smiley' => '1' ,
	'br' => '1' ,
	'xcode' => '1' ,
	'filters' => $submit_download->get_MyFilter() ,
) ;

// LiveValidation�ɂ��Validation���A�T�C��
require_once dirname( dirname(__FILE__) ).'/include/upload_submit_rules.inc.php' ;
$liveValidator="";
$liveform = new My_MassValidatePHP( 'makedownloadform', $_POST );

$liveformrules = $formRules['makedownloadform'] ;
if( ! empty( $canupload ) && empty( $config_error ) ) $liveformrules = array_merge( $liveformrules , $formRules['fileupload'] ) ;
if( ! empty( $select_license ) ) $liveformrules = array_merge( $liveformrules , $formRules['license'] ) ;

$liveform->addRules( $liveformrules );
$liveValidator = $liveform ->generateAll();
$xoopsTpl->assign( 'liveValidator', $liveValidator );

// TRANSACTION PART
if( isset( $_POST['makedownload_post'] ) || isset( $_POST['makedownload_preview'] ) ) {
	if ( ! $xoopsGTicket->check( true , 'd3downloads' ) ) {
		redirect_header( XOOPS_URL."/modules/$mydirname/" , 3 , $xoopsGTicket->getErrors() );
	}
	$params_array = array( 'auto_approved' , 'check_url' , 'canupload' , 'category' , 'usealbum' , 'upload_max_filesize' ) ;
	foreach( $params_array as $key ) { $params[$key] = $$key ; }
	$submit_result = d3download_submit_execution( $mydirname, 'submit', $params ) ;
	$download4assign = $submit_result['download4assign'] ;
	$iserror = $submit_result['iserror'] ;
	$error_message = $submit_result['error_message'] ;
	if( isset( $_POST['makedownload_preview'] ) ){
		 $ispreview = true ;
		 $preview_title = $submit_result['preview_title'] ;
		 $preview_body = $submit_result['preview_body'] ;
	}
}

// WYSIWYG
$wysiwygs = array( 'name' => 'desc' , 'value' => $download4assign['description'] ) ;
include dirname( dirname(__FILE__) ).'/include/wysiwyg_editors.inc.php' ;

// livevalidation.js �� livevalidation.css �� xoops_module_header �ɃA�T�C��
$xoops_module_header = d3download_dbmoduleheader( $mydirname );
$livevalidation_header = d3download_dbmoduleheader_for_livevalidation( $mydirname );
$xoopsTpl->assign('xoops_module_header', $xoops_module_header . "\n" .$livevalidation_header. "\n" . $wysiwyg_header. "\n" . $xoopsTpl->get_template_vars('xoops_module_header'));

// assign
$xoopsTpl->assign( array(
	'mydirname' => $mydirname ,
	'mod_url' => XOOPS_URL.'/modules/'.$mydirname ,
	'page' => 'submit' ,
	'download' => $download4assign ,
	'canuseshots' => $canuseshots ,
	'select_platform' => $select_platform ,
	'select_license' => $select_license ,
	'downimg' => $img_ar ,
	'shots_help' => $shots_help ,
	'preview_title' => $preview_title ,
	'preview_body' => $preview_body ,
	'iserror' => $iserror ,
	'error_message' => $error_message ,
	'formtitle' => $formtitle ,
	'auto_approved' => $auto_approved ,
	'xoopshp' => $defalthp ,
	'defaltsitename' => $defaltsitename ,
	'message' => $message ,
	'check_url' => $check_url ,
	'canhtml' => $canhtml ,
	'canupload' => $canupload ,
	'upload_max_filesize' => $upload_max_filesize ,
	'max_submit_size' => $max_submit_size ,
	'submit_extension' => $submit_extension ,
	'config_error' => $config_error ,
	'body_wysiwyg' => $wysiwyg_body ,
	'xoops_isuser' => $xoops_isuser ,
	'xoops_userid' => $xoops_userid ,
	'xoops_uname' => $xoops_uname ,
	'module_admin' => $module_admin ,
	'xoops_config' => $xoopsConfig ,
	'mod_config' => $xoopsModuleConfig ,
	'xoops_pagetitle' => $formtitle,
	'xoops_breadcrumbs' => $breadcrumbs ,
	'gticket_hidden' => $xoopsGTicket->getTicketHtml( __LINE__ , 1800 , 'd3downloads') ,
) ) ;
// DISPLAY STAGE

include XOOPS_ROOT_PATH.'/footer.php';
