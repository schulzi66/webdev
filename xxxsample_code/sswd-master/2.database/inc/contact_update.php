<?php
$id = $_GET["update"];
$name = $_GET["name"];
$gender = $_GET["gender"];
$message = $_GET["message"];

$sql = "UPDATE contacts SET 
		name = '$name', 
		gender = '$gender', 
		message = '$message'
		WHERE id = ".$id;

// echo $sql;
// exit();

$conn->query($sql);

header('Location: contact.php') ;
?>
