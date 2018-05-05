<?php

$ipaddress = $_SERVER['REMOTE_ADDR']; 
$referrer = $_SERVER['HTTP_REFERER']; 
$datetime = date('Y-m-d H:i:s');
$useragent = $_SERVER['HTTP_USER_AGENT']; 
$remotehost = @getHostByAddr($ipaddress);


file_put_contents('log.txt',print_r("$ipaddress . | . $referrer . | . $datetime . | . $useragent . | . $remotehost . \n;",true));


?> 
