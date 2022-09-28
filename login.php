<?php 
session_start();
if (isset($_SESSION['email'])) {
	header("Location: index.php");
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
<form method="post" action="">
	email: <br>
	<input type="email" name="email"><br>
	password: <br>
	<input type="password" name="password"><br>
	<input type="submit" name="login" value="login">
</form>
</body>
</html>
<?php 
require 'config/config.php';
if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];
}

$validate = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
$count = $validate->num_rows;

if ($count == 1) {
    $_SESSION['email'] = $email;
    header("Location: index.php");
}

 ?>