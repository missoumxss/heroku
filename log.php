<?php
// Getting the information 
$ipaddress = $_SERVER['REMOTE_ADDR']; 
$page = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";  
$page .= iif(!empty($_SERVER['QUERY_STRING']), "?{$_SERVER['QUERY_STRING']}", ""); 
$referrer = $_SERVER['HTTP_REFERER']; 
$datetime = mktime(); 
$useragent = $_SERVER['HTTP_USER_AGENT']; 
$remotehost = @getHostByAddr($ipaddress);

// Create log line 
$logline = $ipaddress . '|' . $referrer . '|' . $datetime . '|' . $useragent . '|' . $remotehost . '|' . $page . "\n"; 

// Write to log file: 
$logfile = '/log.txt'; 

// Open the log file in "Append" mode 
if (!$handle = fopen($logfile, 'a+')) { 
    die("Failed to open log file"); 
} 

// Write $logline to our logfile. 
if (fwrite($handle, $logline) === FALSE) { 
    die("Failed to write to log file"); 
} 
   
fclose($handle);

?>
