<?php
$servername = "localhost";
$username = "root";
$password = "SQLroot";
$dbname = "esme1";

$conn = mysqli_connect($servername, $username, $password)
        OR die("MySQL connection failed: " . 
		         mysqli_connect_error());
				 
$sql = "DROP DATABASE $dbname";

if (($result = mysqli_query($conn, $sql)) === TRUE) { 
    echo "Database $dbname successfully dropped <br />";
	}
	else {
	   echo 'Database deletion failed: ' . mysqli_error($conn) . '<br />';
	   die();
     };


?>