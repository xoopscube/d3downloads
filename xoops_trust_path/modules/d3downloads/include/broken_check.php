<?php

require_once dirname(__FILE__, 2) .'/class/broken_download.php' ;

$broken_report = new broken_report( $mydirname ) ;
$broken_report->broken_check_by_cron() ;
