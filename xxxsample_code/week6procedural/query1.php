<?php
$servername = "localhost";
$username = "root";
$password = "SQLroot";
$dbname = "esme1";

$conn = mysqli_connect($servername, $username, $password, $dbname)
        OR die("MySQL connection failed: " . 
		         mysqli_connect_error());

$sql = "SELECT * 
         FROM person
		  ";
		  
$result = mysqli_query($conn, $sql);	

if ($result) {
    echo "<h4>Employee Names and Ages</h4>";
    while($row = mysqli_fetch_array($result)) {
	     echo $row["FirstName"]. " " . $row["LastName"] . " " . $row["age"];
		 echo "<br/>";
	}
} else {
     echo mysqli_error($conn);
	 }

?>