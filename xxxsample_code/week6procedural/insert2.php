<?php
$servername = "localhost";
$username = "root";
$password = "SQLroot";
$dbname = "esme1";

$conn = mysqli_connect($servername, $username, $password, $dbname)
        OR die("MySQL connection failed: " . 
		         mysqli_connect_error());

$sql = "INSERT INTO person 
          VALUES ('Paul', 'Crabtree', 35)
		  ";
$result = mysqli_query($conn, $sql);	

$sql = "INSERT INTO person 
		   VALUES ('Paula', 'Winters', 20) 
		  ";
$result = mysqli_query($conn, $sql);	
?>