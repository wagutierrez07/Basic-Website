<?php 

session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi perfil</title>
</head>
<body>


	<?php if (isset($_GET['id'])) {	

		require 'config/config.php';

		$validate=$conn->query("SELECT * FROM users WHERE id = '".$_GET['id']."'");
		$row=$validate->fetch_assoc();
	 ?>

	 Perfil de <?php echo $row['username']; ?> <br>
	 Fecha de login: <?php echo $row['fecha']; ?> 

	<?php } ?>


</body>
</html>