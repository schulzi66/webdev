<?php
$id = $_GET["update"];
$name = $_GET["name"];
$email = $_GET["email"];

$sql = "UPDATE students SET 
		name = '$name', 
		email = '$email'
		WHERE id = ".$id;

// echo $sql;
// exit();

$conn->query($sql);

header('Location: students.php') ;
?>
