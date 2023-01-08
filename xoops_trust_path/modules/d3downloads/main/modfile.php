<?php

include XOOPS_ROOT_PATH."/header.php";

require_once dirname( dirname(__FILE__) ).'/class/gtickets.php' ;
require_once dirname( dirname(__FILE__) ).'/class/user_access.php' ;
require_once dirname( dirname(__FILE__) ).'/class/post_check.php' ;
require_once dirname( dirname(__FILE__) ).'/class/submit_download.php' ;
require_once dirname( dirname(__FILE__) ).'/class/history_download.php' ;
require_once dirname( dirname(__FILE__) ).'/include/transact_functions.php' ;
require_once dirname( dirname(__FILE__) ).'/include/common_functions.php' ;
include_once dirname( dirname(__FILE__) ).'/include/upload_functions.php' ;

global $xoopsUser , $xoopsModuleConfig ;

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

$ispreview = $iserror = $can_edit = $auto_approved = $canhtml = $canupload = $candelete = $config_error = 0 ;
$permissions = $downdata = $category = $select_platform = $select_license = $img_ar = $history4assign = $liveformErrors = $copy_select = array() ;
$shots_help =  $preview_title = $preview_body = $error_message =  '' ;

if( ! empty( $_GET['cid'] ) ) $cid = intval( $_GET['cid'] ) ;
elseif( ! empty( $_POST['cid'] ) ) $cid = intval( $_POST['cid'] ) ;

// Registration requires CID specification
if( empty( $cid ) ){
	redirect_header(XOOPS_URL.'/modules/'.$mydirname.'/index.php',3, _MD_D3DOWNLOADS_NO_CID );
	exit();
}

// Check for edit permissions (except administrator)
$user_access = new user_access( $mydirname ) ;
$whr_cat4edit = "cid IN (".implode(",", $user_access->can_edit() ).")" ;
$permissions = $user_access->permissions_of_current_user( $cid ) ;
$can_edit = $permissions['can_edit'] ;
if( empty( $can_edit ) ) {
	redirect_header(XOOPS_URL.'/modules/'.$mydirname.'/',3, _MD_D3DOWNLOADS_NOEDITTPERM );
	exit();
}

// Automatic approval checks (except for administrators)
$auto_approved = $permissions['edit_approved'] ;

// Check HTML permissions (disable HTML for non-registered users)
$canhtml = $permissions['can_html'] ;

// Check upload permissions
$canupload = $permissions['can_upload'] ;

// Check delete permissions (except administrator)
$candelete = $permissions['can_delete'] ;

// Separate processing for admin and non-admin templates
if( $module_admin ){
	$xoopsOption['template_main'] = $mydirname.'_admin_submit.html' ;
} else {
	$xoopsOption['template_main'] = $mydirname.'_main_submit.html' ;
}

// Get non-admin submission form description
$message = d3download_submit_message( $mydirname, $cid ) ;
$formtitle = _MD_D3DOWNLOADS_SUBMIT_EDIT ;

// GET LID FROM $_GET
$id = isset( $_GET['lid'] ) ? intval( $_GET['lid'] ) : 0 ;

// Get only editable category list
if( $module_admin ) $category = d3download_categories_selbox( $mydirname, $whr_cat4edit );
else  $category = d3download_categories_selbox( $mydirname, $whr_cat4edit, $cid );

// Get a list of available OS/software, etc.
$submit_download = new submit_download( $mydirname ) ;
$select_platform = $submit_download->Select_Platform() ;

// Get a list of licenses
$select_license = $submit_download->Select_License() ;

// Get screenshot image
$canuseshots = $submit_download->can_useshots() ;
$usealbum = $submit_download->can_albumselect() ;
if( ! empty( $canuseshots ) ){
	$shots_dir = d3download_shots_dir( $mydirname, $cid );
	$img_ar = $submit_download->shots_img_ar( $cid, $shots_dir );
	if( empty( $usealbum ) ) $shots_help = sprintf( _MD_D3DOWNLOADS_SUBMIT_LOGOURL_DESC , $shots_dir );
}

// GET DOWNLOADDATA
$mod_url = XOOPS_URL.'/modules/'.$mydirname ;
$downdata = $submit_download->get_downdata_for_submit( $id, $category ) ;

// Redirect if DOWNLOADDATA cannot be obtained
if( empty( $downdata ) ) {
	redirect_header( XOOPS_URL."/modules/$mydirname/" , 2 , _MD_D3DOWNLOADS_NOMATCH ) ;
	exit();
}

$lid = $downdata['lid']; ;
$cid4assign = $downdata['cid'];
$submitter = $downdata['submitter'];
$postname = $downdata['postname'];
$title4assign = $downdata['title'];
$hits = $downdata['hits'];
$totalrating = $downdata['totalrating'];
$totalvotes =  $downdata['totalvotes'] ;
$comments = $downdata['comments'] ;
if( empty( $downdata['downdata']['homepagetitle'] ) && $downdata['downdata']['homepage'] == XOOPS_URL.'/' ) {
	global $xoopsConfig ;
	$defaltsitename = $xoopsConfig['sitename'] ;
} else {
	$defaltsitename = '' ;
}

if( empty( $ispreview ) && empty( $iserror ) ) $download4assign = $downdata['downdata'] ;

// Check if the submitter is the person himself/herself with the obtained LID
if( $module_admin ) $canedit = 1 ;
elseif( ! empty( $can_edit ) && $submitter == $xoops_userid &&  $xoops_isuser ) $canedit = 1 ;
else $canedit = 0 ;

if( empty( $canedit ) ) {
	redirect_header(XOOPS_URL.'/modules/'.$mydirname.'/',3, _MD_D3DOWNLOADS_NOEDITTPERM );
	exit();
}

// Processing the breadcrumb section
$whr_cat = "cid IN (".implode(",", $user_access->can_read() ).")" ;
$bc[0] = d3download_breadcrumbs( $mydirname ) ;
$breadcrumbs = array_merge( $bc ,d3download_breadcrumbs_tree( $mydirname, $cid4assign, $whr_cat, '', 1 ) ) ;
$breadcrumbs[] = array( 'name' => $formtitle.':'.$title4assign ) ;

// Get HISTORY DATA for admin submission form
$history = new history_download( $mydirname ) ;
$history4assign = $history->get_history_list( $lid );

// Whether to allow re-registration of the same link
$check_url = ! empty( $xoopsModuleConfig['check_url'] ) ? 1 : 0 ;

// maxfilesize (for assignment to templates)
$upload_max_filesize = d3download_get_maxsize( $mydirname );
$max_submit_size = sprintf( _MD_D3DOWNLOADS_SUBMIT_MAXFILESIZE , number_format( $upload_max_filesize ) ) ;
$submit_extension = d3download_get_allowed_extension( $mydirname );

// Check the environment and disable the upload form if it is an error
$config_error = d3download_upload_config_check( $mydirname );

// Assign Validation by LiveValidation
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
		redirect_header(XOOPS_URL.'/modules/'.$mydirname.'/admin/index.php',3,$xoopsGTicket->getErrors());
	}
	$params_array = array( 'auto_approved' , 'check_url' , 'canupload' , 'category' , 'usealbum' , 'upload_max_filesize' , 'downdata' ) ;
	foreach( $params_array as $key ) { $params[$key] = $$key ; }
	$submit_result = d3download_submit_execution( $mydirname, 'modfile', $params ) ;
	$download4assign = $submit_result['download4assign'] ;
	$iserror = $submit_result['iserror'] ;
	$error_message = $submit_result['error_message'] ;
	if( isset( $_POST['makedownload_preview'] ) ){
		 $ispreview = true ;
		 $preview_title = $submit_result['preview_title'] ;
		 $preview_body = $submit_result['preview_body'] ;
	}
}

// Check delete permissions and delete related data at the same time
if( isset( $_POST['makedownloadform_delete'] ) && ! empty( $candelete ) ) {
	if ( ! $xoopsGTicket->check( true , 'd3downloads' ) ) {
		redirect_header(XOOPS_URL.'/modules/'.$mydirname.'/admin/index.php',3,$xoopsGTicket->getErrors());
	}
	$delete_lid = isset( $_POST['lid'] ) ? intval( @$_POST['lid'] ) : "" ;

	require_once dirname(__FILE__, 2) .'/class/submit_validate.php' ;

	$submit_validate = new Submit_Validate( $mydirname, 'delete' ) ;
	if( ! $module_admin ) $submit_validate->Validate_for_delete( $cid, $delete_lid ) ;
    // Reflected in the number of posts if "Reflect posts in user's post count" is enabled
	d3download_delete_lid( $mydirname ,$lid );
	redirect_header( XOOPS_URL."/modules/$mydirname/index.php" , 2 , _MD_D3DOWNLOADS_DELETED ) ;
	exit();
}

// Get file corruption report DATA (for administrator)
$broken_data = d3download_get_broken_data( $mydirname, $lid ) ;
$totalbroken = $broken_data['totalbroken'] ;
$total_broken4assign = $broken_data['total_broken4assign'] ;
$broken = $broken_data['broken'] ;

// Obtaining VOTE DATA (for administrators)
$total_vote4assign = sprintf( _MD_D3DOWNLOADS_TOTAL_VOTE , $totalvotes );
$user_vote_data = d3download_get_user_vote( $mydirname, $lid ) ;
$user_vote4assign = $user_vote_data['user_totalvote'] ;
$user_vote = $user_vote_data['user_vote'] ;
$guest_vote_data = d3download_get_guest_vote( $mydirname, $lid ) ;
$guest_vote4assign = $guest_vote_data['guest_totalvote'] ;
$guest_vote = $guest_vote_data['guest_vote'] ;

// WYSIWYG
$wysiwygs = array( 'name' => 'desc' , 'value' => $download4assign['description'] ) ;
include dirname(__FILE__, 2) .'/include/wysiwyg_editors.inc.php' ;

// COPY
include_once dirname(__FILE__, 2) .'/class/file_manager.php' ;
$file_manager = new file_manager( $mydirname ) ;
$copy_select = $file_manager->get_copy_target_modules() ;

// Assign livevalidation.js and livevalidation.css to xoops_module_header
$xoops_module_header = d3download_dbmoduleheader( $mydirname );
$livevalidation_header = d3download_dbmoduleheader_for_livevalidation( $mydirname );
$xoopsTpl->assign('xoops_module_header', $xoops_module_header . "\n" .$livevalidation_header. "\n" . $wysiwyg_header. "\n" . $xoopsTpl->get_template_vars('xoops_module_header'));

// RENDER
$xoopsTpl->assign( array(
	'mydirname' => $mydirname ,
	'mod_url' => $mod_url ,
	'page' => 'modfile' ,
	'select_platform' => $select_platform ,
	'select_license' => $select_license ,
	'download' => $download4assign ,
	'canuseshots' => $canuseshots ,
	'downimg' => $img_ar ,
	'shots_help' => $shots_help ,
	'candelete' => $candelete ,
	'preview_title' => $preview_title ,
	'preview_body' => $preview_body ,
	'iserror' => $iserror ,
	'error_message' => $error_message ,
	'formtitle' => $formtitle ,
	'auto_approved' => $auto_approved ,
	'defaltsitename' => $defaltsitename ,
	'message' => $message ,
	'check_url' => $check_url ,
	'history' => $history4assign ,
	'hits' => $hits ,
	'rating' => $totalrating ,
	'totalbroken' => $total_broken4assign ,
	'broken' => $broken ,
	'brokensum' => $totalbroken ,
	'totalvotes' => $total_vote4assign ,
	'user_totalvote' => $user_vote4assign ,
	'guest_totalvote' => $guest_vote4assign ,
	'user_vote' => $user_vote ,
	'guest_vote' => $guest_vote ,
	'comments' => $comments ,
	'canhtml' => $canhtml ,
	'canupload' => $canupload ,
	'upload_max_filesize' => $upload_max_filesize ,
	'max_submit_size' => $max_submit_size ,
	'submit_extension' => $submit_extension ,
	'config_error' => $config_error ,
	'body_wysiwyg' => $wysiwyg_body ,
	'copy_select' => $copy_select ,
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

include XOOPS_ROOT_PATH.'/footer.php';
