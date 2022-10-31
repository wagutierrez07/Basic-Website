<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
</head>
<body>

<form method="post" action="">
	user: <br>
	<input type="text" name="username"><br>
	email: <br>
	<input type="email" name="email"><br>
	password: <br>
	<input type="password" name="password"><br>
	<input type="submit" name="register" value="register">
</form>

</body>
</html>

<?php 

if (isset($_POST['register'])) {
	require 'config/config.php';
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=base64_encode($_POST['password']);

	$validate = $conn->query("SELECT * FROM users WHERE email = '$email'");
	$count=$validate->num_rows;

	if ($count > 0) {
		echo "usuario actualmente existe";
	}

	else{

	$regis=$conn->query("INSERT INTO users (username, email, password, fecha) VALUES ('$username', '$email', '$password', now())");

	if ($regis) {
		echo "registro con exito, ya se puede <a href='login.php'>registrar</a> ";
	}

	}

}

 ?>