<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";

$conn = mysqli_connect($servername, $username, $password, $dbname)
        OR die("MySQL connection failed: " . 
		         mysqli_connect_error());
?>
