<?php
$servername = "localhost";
$username = "root";
$password = "SQLroot";
$dbname = "esme1";

$conn = mysqli_connect($servername, $username, $password, $dbname)
        OR die("MySQL connection failed: " . 
		         mysqli_connect_error());

$sql = "UPDATE person 
           SET Age = 36 
		   WHERE FirstName = 'Paul' AND
		   LastName = 'Crabtree'
		  ";
		  
$result = mysqli_query($conn, $sql);	

?>