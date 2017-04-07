<?php
$servername = "localhost";
$username = "root";
$password = "SQLroot";
$dbname = "esme1";

$conn = mysqli_connect($servername, $username, $password, $dbname)
        OR die("MySQL connection failed: " . 
		         mysqli_connect_error());

$sql = "DELETE FROM person 
		   WHERE FirstName = 'Sally' AND
		   LastName = 'Lane'
		  ";
		  
$result = mysqli_query($conn, $sql);			

?>