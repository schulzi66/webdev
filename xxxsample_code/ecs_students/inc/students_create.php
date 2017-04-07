<?php
$name = $_GET["name"];
$email = $_GET["email"];

$sql = "INSERT INTO students ( name, email)
		VALUES ( '$name', '$email')";

$conn->query($sql);

header('Location: students.php') ;
?>
