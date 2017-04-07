<?php
$id = $_GET["update"];
$fullname = $_GET["fullname"];
$email = $_GET["email"];

$sql = "UPDATE student SET 
		fullname = '$fullname', 
		email = '$email'
		WHERE id = ".$id;

// echo $sql;
// exit();

$result = mysqli_query($conn, $sql);	//Procedural approach
//$conn->query($sql);  //OO approach

header('Location: student.php') ;
?>
