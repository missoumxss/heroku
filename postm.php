
<!DOCTYPE html>
<html>
  <body>
    <script>
      if (window.opener) {
        window.opener.postMessage(<?php echo "'" . $_GET["msg"]; . "," . $_GET["orig"]; . "'"; ?>);
      }
      window.close();
    </script>
  </body>
</html>
