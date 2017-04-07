<?php

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$star = $_POST["star"];

$sql = "INSERT INTO comments (created_at, name, email, message, star)
		VALUES (NOW(), '$name', '$email', '$message', '$star')";
$conn->query($sql);



header("Location: ./index.php");


?> 