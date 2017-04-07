<?php
$name = $_GET["name"];
$gender = $_GET["gender"];
$message = $_GET["message"];

$sql = "INSERT INTO contacts (created_at, name, gender, message)
		VALUES (NOW(), '$name', '$gender', '$message')";

$conn->query($sql);

header('Location: contact.php') ;
?>
