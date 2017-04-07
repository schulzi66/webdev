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

$sql = "CREATE TABLE students (
          FirstName varchar(30),
		  LastName varchar(30),
		  age int
		  )";
		  
if (($result = mysqli_query($conn, $sql)) === TRUE) { 
    echo "Table successfully created <br />";
	}
	else {
	   echo 'Table creation failed: ' . mysqli_error($conn). '<br />';
     };

?>