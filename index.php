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
<?php 

if (isset($_SESSION['username'])) {
	echo "welcome " . $_SESSION['username'];
	echo "<br>";
	echo "<a href='logout.php'>salir</a> ";
}
else{
	echo "<a href='login.php'>log</a> or <a href='register.php'>register</a>";
}

 ?>

 <br> <br>

 <form action="" method="post">
 	<textarea rows="8" cols="50" placeholder="escriba texto" name="comment"></textarea>
 	<br>
 	<input type="submit" name="share" value="share">
 </form>

<?php 

if (isset($_POST['share'])) {
	require 'config/config.php';

	$share = $_POST['comment'];

	$regis = $conn->query("INSERT INTO posts (post, username, fecha) VALUES ('$share', '".$_SESSION['id']."', now())");

}

 ?>
<?php 

require 'config/config.php';

$comments = $conn->query("SELECT * FROM posts");

while ($row = $comments->fetch_assoc()) {
	echo $row['comment'] . "<br> <br>";
}

 ?>
</body>
</html>

