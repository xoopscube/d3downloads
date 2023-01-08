<?php

if ( ! function_exists('b_sitemap_d3downloads') ) {
	function b_sitemap_d3downloads( $mydirname )
	{
		require_once dirname(__FILE__, 2) .'/class/user_access.php' ;
		include_once dirname(__FILE__, 2) .'/class/mycategory.php' ;

		$user_access = new user_access( $mydirname ) ;
		$mycategory = new MyCategory( $mydirname, 'Show' ) ;

		$whr = "cid IN ( ".implode( ",", $user_access->can_read() )." )" ;
		return $mycategory->sitemap( '', $whr, 1 ) ;
	}
}
