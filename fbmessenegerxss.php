<?php 
header('Content-type: application/octet-stream');
header('X-content-type-options: nosniff');
header('Content-location: evil.Com');


?>
<html><script>alert('it should be downloadable instead ')</script>
this page's content type is application/octet-stream and has X-content-type-options: nosniff implemented, hence this content shouln't be rendered!!
</html>
