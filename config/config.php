<?php 

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "vf";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_errno) {
	die("Unsuccessful Connection");
}

 ?>