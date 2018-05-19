<?php
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=xss.html');
?>
<html><script>alert(0)</script></html>

