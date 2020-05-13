<?php
$url = $_GET['header'];
$input = $_GET['input'];
header($url);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo $input; ?>
</body>
</html>
