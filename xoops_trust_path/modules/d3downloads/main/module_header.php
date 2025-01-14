<?php

error_reporting(0) ;

include_once dirname(__FILE__, 2) .'/include/module_header.php' ;

$template = $file_path = $type = '' ;

$request   = d3download_get_module_header_request( $mydirname ) ;
$type      = $request['type'] ;
$template  = $request['template'] ;
$file_path = $request['file_path'] ;

if ( empty( $template ) && ( empty( $file_path ) || ! is_file( $file_path ) ) ) exit ;

// send header
// TODO test file extension
if( ! headers_sent() ) d3download_send_header( $type, $file_path ) ;
if ( empty( $template ) ) {
	readfile( $file_path ) ;
	exit ;
}

$theme = $xoopsConfig['theme_set'] ;

// UA
// TODO update user agent
if( stristr( $_SERVER['HTTP_USER_AGENT'] , 'Opera' ) ) {
	$ua_type = 'Opera' ;
} else if( stristr( $_SERVER['HTTP_USER_AGENT'] , 'MSIE' ) ) {
	$ua_type = 'IE' ;
} else {
	$ua_type = 'NN' ;
}

require_once XOOPS_ROOT_PATH.'/class/template.php' ;
$tpl = new XoopsTpl() ;
$tpl->assign( array(
	'mydirname'      => $mydirname ,
	'mod_url'        => XOOPS_URL.'/modules/'.$mydirname ,
	'xoops_config'   => $xoopsConfig ,
	'xoops_theme'    => $theme ,
	'xoops_imageurl' => XOOPS_THEME_URL.'/'.$theme.'/' ,
	'xoops_themecss' => xoops_getcss($theme) ,
	'ua_type'        => $ua_type ,
) ) ;
if ( ! empty( $template ) ) $tpl->display( 'db:'.$template ) ;
exit ;
