<?php

include XOOPS_ROOT_PATH.'/header.php';

$xoopsOption['template_main'] = $mydirname.'_main_singlefile.html' ;

global $xoopsUser ;

include_once dirname(dirname(__FILE__)).'/class/mydownload.php' ;
include_once dirname(dirname(__FILE__)).'/class/user_access.php' ;
require_once dirname(dirname(__FILE__)).'/include/common_functions.php' ;

$user_access = new user_access( $mydirname ) ;

$download4assign = $category4assin = array();

// Preparation for acquiring categories that can be viewed and posted
$whr_cat = "cid IN (".implode(",", $user_access->can_read() ).")" ;
$whr_cat4read = "d.".$whr_cat ;
$whr_cat4post = "cid IN (".implode(",", $user_access->can_post() ).")" ;

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

// Get category number
$cid = isset( $_GET['cid'] ) ? intval( $_GET['cid'] ) : 0 ;
$lid = isset( $_GET['lid'] ) ? intval( $_GET['lid'] ) : 0 ;

// Redirect if no applicable download information is available
$mydownload = new MyDownload( $mydirname, $whr_cat4read, $lid ) ;
if( ! $mydownload->return_lid() ) {
	d3download_delete_cache_of_categories( $mydirname ) ;
	redirect_header(  XOOPS_URL.'/modules/'.$mydirname.'/',3, _MD_D3DOWNLOADS_NOMATCH ) ;
	exit() ;
}

// For compatibility with mydownloads, access without specifying a category number
if( empty( $cid ) ) $cid = $mydownload->return_cid();

// Redirect for unbrowsable categories
$canread = $user_access->user_access_for_cat( $cid, $whr_cat );
if( empty( $canread ) ) {
	redirect_header( XOOPS_URL.'/modules/'.$mydirname.'/',3, _MD_D3DOWNLOADS_NOREADLINKPERM );
	exit();
}

// Get and assign the number of registrations for browsable links only
$total = $mydownload->Total_Num( $whr_cat, $cid );
$total_num = sprintf( _MD_D3DOWNLOADS_CATEGORY_NUM , $total );
$xoopsTpl->assign( 'download_total_num' , $total_num ) ;

// Get registration data
$download4assign = $mydownload->get_downdata_for_singleview( $whr_cat4read, $lid, $cid, 1 );

$mod_url = XOOPS_URL.'/modules/'.$mydirname ;

// Get a list of browsable categories for the SELECT box
$category4assin = d3download_makecache_for_selbox( $mydirname, $whr_cat, 0, 1 );

$lang_directcatsel = _MD_D3DOWNLOADS_SEL_CATEGORY;
$d3comment_dirname = $xoopsModuleConfig['comment_dirname'] ? $xoopsModuleConfig['comment_dirname']  : "";
$d3comment_forum_id = $xoopsModuleConfig['comment_forum_id'] ? $xoopsModuleConfig['comment_forum_id']  : "";
$comment_view = $xoopsModuleConfig['comment_view'] ? $xoopsModuleConfig['comment_view']  : "";

// Whether to use screenshot images
$canuseshots = ! empty( $xoopsModuleConfig['useshots'] ) ? 1 : 0 ;
$xoops_module_header = d3download_dbmoduleheader( $mydirname );
$xoopsTpl->assign('xoops_module_header', $xoops_module_header . "\n" . $xoopsTpl->get_template_vars('xoops_module_header'));

// Assign breadcrumb section
$bc[0] = d3download_breadcrumbs( $mydirname ) ;
$breadcrumbs = array_merge( $bc ,d3download_breadcrumbs_tree( $mydirname, $cid, $whr_cat, '', 1 ) ) ;
$title4assign = $mydownload->return_title('Show') ;
$breadcrumbs[] = array( 'name' => $title4assign ) ;

// RENDER
$xoopsTpl->assign( array(
	'mydirname' => $mydirname ,
	'mod_url' => $mod_url ,
	'page' => 'singlefile' ,
	'mytrustdirpath' => 'd3downloads' ,
	'file' => $download4assign ,
	'category' => $category4assin ,
	'lang_directcatsel' => $lang_directcatsel ,
	'xoops_isuser' => $xoops_isuser ,
	'xoops_userid' => $xoops_userid ,
	'xoops_uname' => $xoops_uname ,
	'module_admin' => $module_admin ,
	'xoops_config' => $xoopsConfig ,
	'mod_config' => $xoopsModuleConfig ,
	'd3comment_dirname' => $d3comment_dirname ,
	'd3comment_forum_id' => $d3comment_forum_id ,
	'comment_view' => $comment_view ,
	'canuseshots' => $canuseshots ,
	'xoops_pagetitle' => $title4assign ,
	'xoops_breadcrumbs' => $breadcrumbs ,
) ) ;
include XOOPS_ROOT_PATH.'/footer.php';
