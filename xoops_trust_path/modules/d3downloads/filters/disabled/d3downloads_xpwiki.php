<?php

define( '_MD_D3DOWNLOADS_FILTERS_XPWIKI_TITLE','xpWiki renderer' );

if ( ! function_exists('d3downloads_xpwiki') ) {
	function d3downloads_xpwiki( $text, $html, $smiley, $xcode, $image, $br )
	{
		if ( ! class_exists( 'd3downloadsTextSanitizer' ) ) {
			require_once dirname( dirname( dirname(__FILE__) ) ).'/class/d3downloads.textsanitizer.php' ;
		}
		$myts =& d3downloadsTextSanitizer::sGetInstance() ;
		if ( ! class_exists( 'XpWiki' ) ) {
			@ include_once XOOPS_TRUST_PATH.'/modules/xpwiki/include.php' ;
		}
		if( ! class_exists( 'XpWiki' ) ) die( 'xpWiki is not installed correctly' ) ;

		// Get instance. option is xpWiki module's directory name.
        // argument is the name of the directory where xpWiki is installed.
		$wiki =& XpWiki::getSingleton( 'xpwiki' );

        // You can change the configuration values that determine the behavior of xpWiki.
		// $wiki->setIniConst( '[KEY]' , '[VALUE]' ); // $wiki->root->[KEY] = [VALUE];
		// $wiki->setIniRoot( '[KEY]' , '[VALUE]' );  // $wiki->cont->[KEY] = [VALUE];

        // ex, enable line breaks
		$wiki->setIniRoot( 'line_break' , 1 );
        // ex. rendering cache.
		$wiki->setIniRoot( 'render_use_cache' , 1 );
        // ex. render cache expires until a new page is created
		$wiki->setIniRoot( 'render_cache_min' , 0 ); // Cache validity time (min)
        // ex. target attribute '_blank' for external link
		$wiki->setIniRoot( 'link_target' , '_blank' );
	
		if ($html != 1) {
            // Second argument is the DIV class name to apply xpWiki's CSS
            // usually the name of the directory where it was installed.
            // If CSS is not applied, a blank '' is OK.
			$text = $wiki->transform( $text , 'xpwiki' ) ;
		} else {
			$text = $myts->codePreConv( $text, $xcode ) ;
 			$text = $myts->makeClickable( $text );
			if( $smiley != 0 ) $text = $myts->smiley( $text ) ;
		}
		if( $xcode != 0 ) $text = $myts->xoopsCodeDecode( $text, $image ) ;
		if( $html && $br != 0) $text = $myts->nl2Br( $text ) ;
		if( $html ) $text = $myts->codeConv( $text, $xcode, $image ) ;
		$text = $myts->postCodeDecode( $text , $image ) ;
		return $text;
	}
}
