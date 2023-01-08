<?php

error_reporting(0);

require_once dirname(__FILE__, 2) .'/include/make_rss.inc.php';

d3download_common_make_feed( $mydirname, 'atom' );
