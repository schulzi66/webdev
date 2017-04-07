<?php

$type = $_POST['type'];
$title = $_POST['title'];
$price = $_POST['price'];
$picture = $_POST['picture'];
$description = $_POST['description'];

$sql = "INSERT INTO dish (type, title, price, picture, description)
VALUES ('$type', '$title', '$price', '$picture', '$description')";

$conn->query($sql);

header("Location: ./admin.php");



?>