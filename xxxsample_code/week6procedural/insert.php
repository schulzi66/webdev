<?php
$servername = "localhost";
$username = "root";
$password = "SQLroot";
$dbname = "esme1";

$conn = mysqli_connect($servername, $username, $password, $dbname)
        OR die("MySQL connection failed: " . 
		         mysqli_connect_error());

$sql = "INSERT INTO person 
          VALUES ('Sally', 'Lane', 28),
		         ('Kevin', 'Whelen', 32)
		  ";
$result = mysqli_query($conn, $sql);					  

$sql = "INSERT INTO person 
          VALUES ('Alannah', 'Cleary', 27)
		  ";
$result = mysqli_query($conn, $sql);	

$sql = "INSERT INTO person 
          VALUES ('Paul', 'Crabtree', 35)
		  ";
$result = mysqli_query($conn, $sql);	

?>