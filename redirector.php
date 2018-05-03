<?php
header('Content-type: application/pdf');
?>

<?php

$url = $_GET['x'];
header("Location: $url");
?> 
