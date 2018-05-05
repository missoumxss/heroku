<?php
// Getting the information 
$ipaddress = $_SERVER['REMOTE_ADDR']; 
$page = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";  
$page .= iif(!empty($_SERVER['QUERY_STRING']), "?{$_SERVER['QUERY_STRING']}", ""); 
$referrer = $_SERVER['HTTP_REFERER']; 
$datetime = mktime(); 
$useragent = $_SERVER['HTTP_USER_AGENT']; 
$remotehost = @getHostByAddr($ipaddress);


file_put_contents("log.txt",print_r($ipaddress . '|' . $referrer . '|' . $datetime . '|' . $useragent . '|' . $remotehost . '|' . $page . "\n"; ,true));
?> 
