<?php 

session_start();
if (!isset($_SESSION['username'])) {
	header("Location: index.php");
}
		require 'config/config.php';

		$validate=$conn->query("SELECT * FROM users WHERE id = '".$_GET['id']."'");
		$row=$validate->fetch_assoc();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> <?php echo $row['username']; ?>  - beifuc</title>
</head>
<body>


	<?php if (isset($_GET['id'])) {	

		require 'config/config.php';

		$validate=$conn->query("SELECT * FROM users WHERE id = '".$_GET['id']."'");
		$row=$validate->fetch_assoc();
	 ?>
	 <?php include 'config/navbar.php'; ?>
	 <img src="<?php echo $row['imagen']; ?> " width="100"> <br> <br>
	<!--  formulario exclusivo para un solo usuario en particular -->

	<?php 

	if ($_GET['id'] == $_SESSION['id']) {
		?>


	 <form method="post" enctype="multipart/form-data" action=""> 
	 	<input type="file" name="imagen">
	 	<input type="submit" name="upload" value="upload">
	 </form><br> <br>
	<?php }

	 ?>
	 <?php
	 if (isset($_POST['upload'])) {
	 	$ruta="pfp/";
	 	$archivo=$ruta.basename($_FILES['imagen']['name']);
	 	$route = $ruta.$_GET['id'].".jpg";
	 	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta.$_GET['id'].".jpg")) {
	 		require 'config/config.php';
	 		$regis=$conn->query("UPDATE users SET imagen = '$route' WHERE id = '".$_GET['id']."'");
	 		header("Location: profile.php?id=".$_GET['id']."");
	 	}

	 } 

	 ?>

	 Perfil de <?php echo $row['username']; ?> <br> <br>
	 Fecha de login: <?php echo $row['fecha']; ?> <br> <br>

<br> <br><br> <br>

<?php 

require 'config/config.php';

$comments = $conn->query("SELECT * FROM posts WHERE username = '".$_GET['id']."' ORDER BY id DESC");
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


	<?php } ?>


</body>
</html>