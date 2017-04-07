<?php


$page = $_POST['page'];
$title = $_POST['title'];
$text = $_POST['text'];

$sql = "INSERT INTO pages (page, title, text)
VALUES ('$page', '$title', '$text')";

$conn->query($sql);

header("Location: ./admin.php");


?>