<?php
$servername = "localhost";
$username = "root";
$password = "SQLroot";
$dbname = "esme1";

$conn = mysqli_connect($servername, $username, $password)
        OR die("MySQL connection failed: " . 
		         mysqli_connect_error());
				 
$sql = "CREATE DATABASE $dbname";

$result = mysqli_query($conn, $sql);

if ($result) {
     echo "Database $dbname successfully created <br />";
} else {echo "Database $dbname creation failed: " . mysqli_error($conn) . "<br />";
       die();
	}

$sql = "USE $dbname";
$result = mysqli_query($conn, $sql);


?>