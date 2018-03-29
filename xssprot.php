<?php
header('X-XSS-Protection: 1')
?>

<html>
<head>
<base href="/xxx/">

<head>
<body>
<a href="java%0ascript:alert(1)">xss</a>

<body>
</html>
