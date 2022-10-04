<div style="width: 100%; float: left; margin-bottom: 30px;">
	<div style="width: 30%; float: left;"><?php 	echo "welcome " . $_SESSION['username']; ?></div>
	<div style="width: 20%; float: left;"><a href="index.php">home</a></div>
	<div style="width: 20%; float: left;"><a href="profile.php?id=<?php echo $_SESSION['id']; ?>">perfil</a></div>
	<div style="width: 20%; float: left;">buscar</div>
	<div style="width: 10%; float: left;"><a href='logout.php'>salir</a></div>
</div>