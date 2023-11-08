<?php

define('STATUS_SUCCESS','success');
define('STATUS_FAIL','fail');
define('STATUS_REJECT','success');
$weburl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "http" : "http");
$weburl .= "://".$_SERVER['HTTP_HOST'];
$weburl .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('WEB_URL',$weburl.'');

?>