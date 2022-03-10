<?php

global $xoopsUser ;

include XOOPS_ROOT_PATH.'/header.php';

include_once dirname(__FILE__, 2) .'/class/mydownload.php' ;
include_once dirname(__FILE__, 2) .'/class/user_access.php' ;
require_once dirname(__FILE__, 2) .'/include/common_functions.php' ;

$user_access = new user_access( $mydirname ) ;

$download4assign = $category = $all = array() ;

// Preparation for acquiring categories that can be viewed and posted
$whr_cat = "cid IN (".implode(",", $user_access->can_read() ).")" ;
$whr_cat4read = "d.".$whr_cat ;

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

// DELETE NULLBYTE
$_GET = d3download_delete_nullbyte( $_GET );
$orderby = d3download_selected_order( $mydirname ) ;
$xoopsTpl->assign('lang_cursortedby', sprintf( _MD_D3DOWNLOADS_CURSORTBY, d3download_convertorderbytrans( $orderby ) ) );

$mydownload = new MyDownload( $mydirname );

// Processing when CID is obtained
$cid = ( ! empty( $_GET['cid'] ) ) ? intval( $_GET['cid'] ) : 0 ;
$select_intree = d3download_select_intree();
$intree =  ( ! empty( $_GET['intree'] ) ) ? 1 : 0 ;

$xoopsTpl->assign( 'select_id', $cid ) ; 
$xoopsTpl->assign( 'category_id', $cid );
$xoopsTpl->assign( 'select_intree' , $select_intree ) ; 
$xoopsTpl->assign( 'intree', $intree );

// Get the number of registrations
$total =  $mydownload->Total_Num( $whr_cat, $cid, 0, 0, $intree ) ;
$total_num = ( ! empty( $cid ) ) ? sprintf( _MD_D3DOWNLOADS_CATEGORY_NUM , $total ) : sprintf( _MD_D3DOWNLOADS_TOTAL_NUM , $total ) ;

// Assign a non-public number of cases
if( $module_admin ){
	$invisible_num = $mydownload->Invisible_Num( $cid, $intree ) ;
	$xoopsTpl->assign( 'invisible_num' , $invisible_num['num']  ) ;
	$xoopsTpl->assign( 'invisible_link' , $invisible_num['link']  ) ;
}

// Assign page title
$pagetitle4assign = _MD_D3DOWNLOADS_FILELIST_MAIN ;
if( ! empty( $cid ) ){
	include_once dirname( dirname(__FILE__) ).'/class/mycategory.php' ;
	$mycategory = new MyCategory( $mydirname, 'Show', $cid, $whr_cat ) ;
	$pagetitle4assign .= ' - '.$mycategory->return_title() ;
}

// Processing the breadcrumb section
$bc[0] = d3download_breadcrumbs( $mydirname ) ;
$breadcrumbs_tree = d3download_breadcrumbs_tree( $mydirname, $cid, $whr_cat, "index.php?page=filelist" ) ;
$bc[] = ( empty( $breadcrumbs_tree ) ) ? array( 'name' => _MD_D3DOWNLOADS_FILELIST_MAIN ) : array( 'url' => 'index.php?page=filelist' , 'name' => _MD_D3DOWNLOADS_FILELIST_MAIN ) ;
$breadcrumbs = array_merge( $bc, $breadcrumbs_tree ) ;

// Page navigation processing
$perpage4assign = d3download_items_perpage();
$select_perpage = d3download_select_perpage( $mydirname ) ;
$current_start = isset( $_GET['start'] ) ? intval( $_GET['start'] ) : 0 ;

require_once dirname(__FILE__, 2) .'/class/my_pagenav.php' ;

$orderby4pagenav = d3download_convertorderbyout( $orderby );
$pagenavarg = "page=filelist&amp;cid=".$cid."&amp;orderby=".$orderby4pagenav."&amp;perpage=".$select_perpage."&amp;intree=".$intree ;
$pagenav = new My_PageNav( $total, $select_perpage, $current_start, 'start', $pagenavarg ) ;
$pagenav4assign = $pagenav->renderNav( 5 ) ;
$orderbyarg = "index.php?page=filelist&amp;cid=".$cid."&amp;perpage=".$select_perpage."&amp;intree=".$intree ;
$xoopsTpl->assign( 'perpage' , $perpage4assign ) ; 
$xoopsTpl->assign( 'select_perpage' , $select_perpage ) ; 
$xoopsTpl->assign( 'pagenav' , $pagenav4assign ) ; 
$xoopsTpl->assign( 'argument' , $orderbyarg ) ; 
$xoopsTpl->assign( 'orderby' , $orderby4pagenav ) ; 

$xoopsOption['template_main'] = $mydirname.'_main_filelist.html' ;

// Assign number of registrations
$xoopsTpl->assign( 'download_total_num' , $total_num  ) ;

// Get a list of browsable categories for the SELECT box
$all = array( 0 => 'ALL' ) ;
$category = d3download_makecache_for_selbox( $mydirname, $whr_cat, 0, 1 ) ;
$category4assin = $all + $category ;

// Retrieve registration data available for viewing
$download4assign = $mydownload->get_downdata_for_filelist( $cid, $whr_cat4read, $orderby, $select_perpage, $current_start, $intree ) ;

$mod_url = XOOPS_URL.'/modules/'.$mydirname ;
$lang_directcatsel = _MD_D3DOWNLOADS_SEL_CATEGORY ;

$xoops_module_header = d3download_dbmoduleheader( $mydirname );
$xoopsTpl->assign( 'xoops_module_header', $xoops_module_header . "\n" . $xoopsTpl->get_template_vars('xoops_module_header' ) ) ;

// RENDER
$xoopsTpl->assign( array(
	'mydirname' => $mydirname ,
	'mod_url' => $mod_url ,
	'page' => 'filelist' ,
	'filelist' => $download4assign ,
	'config_d3comment' => $mydownload->config_d3comment() ,
	'category' => $category4assin ,
	'lang_directcatsel' => $lang_directcatsel ,
	'xoops_isuser' => $xoops_isuser ,
	'xoops_userid' => $xoops_userid ,
	'xoops_uname' => $xoops_uname ,
	'module_admin' => $module_admin ,
	'xoops_config' => $xoopsConfig ,
	'mod_config' => $xoopsModuleConfig ,
	'xoops_pagetitle' => $pagetitle4assign ,
	'xoops_breadcrumbs' => $breadcrumbs ,
) ) ;
// display
include XOOPS_ROOT_PATH.'/footer.php';
