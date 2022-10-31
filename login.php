<?php 

session_start();
if (isset($_SESSION['username'])) {
	header("location: index.php");
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
		Username: <br>
		<input type="text" name="username"> <br>
		Password: <br>
		<input type="password" name="password"> <br>
		<input type="submit" name="login" value="login">
	</form>
</body>
</html>

<?php 

require 'config/config.php';

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = base64_encode($_POST['password']);

	$validate = $conn->query("SELECT * FROM users WHERE username = '$username'");

$count = $validate->num_rows;
$data = $validate->fetch_assoc();

if ($count == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $data['id'];
    header("Location: index.php");
}
}


 ?>