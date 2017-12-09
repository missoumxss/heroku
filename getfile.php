<?php
$host = "https://explorer.earthengine.google.com/";
$path = "/getProject";
$data = "state=aaaaxxxx";
$data = urlencode($data);

header("POST $path HTTP/1.1\\r\
" );
header("location: https://explorer.earthengine.google.com\\r\
");
header("Host: $host\\r\
" );
header("Content-type: application/x-www-form-urlencoded\\r\
" );
header("Content-length: " . strlen($data) . "\\r\
" );
header("Connection: close\\r\
\\r\
" );
header($data);
?>
