<?php
$servername = "localhost";
$username = "root";
$password = "SQLroot";
$dbname = "esme1";

$conn = mysqli_connect($servername, $username, $password)
        OR die("MySQL connection failed: " . 
		         mysqli_connect_error());

$sql = "USE $dbname";
$result = mysqli_query($conn, $sql);

?>