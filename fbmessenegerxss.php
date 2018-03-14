<?php 
header('Content-type: application/octet-stream');
header('X-content-type-options: nosniff');
?>
this page's content type is application/octet-stream and has X-content-type-options: nosniff implemented, hencethis content shoulnt be rendered!!
<html><script>alert('it should be downloadable instead ')</script></html>
