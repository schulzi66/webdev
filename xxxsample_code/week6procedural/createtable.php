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

$sql = "CREATE TABLE person (
          FirstName varchar(30),
		  LastName varchar(30),
		  age int
		  )";

$result = mysqli_query($conn, $sql);
?>