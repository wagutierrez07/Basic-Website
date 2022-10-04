<?php 

 session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index - beifuc</title>
</head>
<body>
<?php 

if (isset($_SESSION['username'])) {

 ?>
<?php include 'config/navbar.php'; ?>

<!-- formulario solo para miembros -->
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

$comments = $conn->query("SELECT * FROM posts ORDER BY id DESC");
while ($row = $comments->fetch_assoc()) {

$users=$conn->query("SELECT username FROM users WHERE id = '".$row['username']."'");
$rowser=$users->fetch_assoc();

 ?>
 <br>
	<div>
		<a href="profile.php?id=<?php echo $row['username']; ?>"><?php echo $rowser['username']; ?></a>
		<div>
			<?php echo $row['post']; ?>
		</div>
		<br>
	</div>

	<?php } ?>

<?php }
else{
	echo "<a href='login.php'>log</a> or <a href='register.php'>register</a>";
} ?>
</body>
</html>

