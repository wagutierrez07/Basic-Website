<?php 

 session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index</title>
</head>
<body>




</body>
</html>

<?php 

if (isset($_SESSION['email'])) {
	echo "welcome " . $_SESSION['email'];
}
else{
	echo "<a href='login.php'>log</a> or <a href='register.php'>register</a>";
}

 ?>
