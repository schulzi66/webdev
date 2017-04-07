<?php
$id = $_GET["delete"];

$conn->query("DELETE FROM students WHERE id = ".$id);

header('Location: students.php') ;
?>
