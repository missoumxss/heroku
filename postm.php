
<!DOCTYPE html>
<html>
  <body>
    <script>
      if (window.opener) {
        window.opener.postMessage('<?php echo $_GET["msg"];?>');
      }
      window.close();
    </script>
  </body>
</html>
