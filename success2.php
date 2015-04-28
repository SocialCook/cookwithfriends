<!DOCTYPE html>
<html>
<head>
	<title>Success</title>
	<link rel="icon" href="favicon.ico">
</head>
<body>
<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	session_start();
	$_SESSION['token'] = $_GET['token'];
	echo "<script>window.location.href = 'dashboard/index.php'</script>";
}
?>

</body>
</html>