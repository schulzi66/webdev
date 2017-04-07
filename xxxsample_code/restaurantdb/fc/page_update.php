<?php


$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$text = $_REQUEST['text'];
$page = $_REQUEST['page'];

$sql = "UPDATE pages SET
		title = \"".$title."\",
		text = \"".$text."\"
		WHERE id = ".$id;
$conn->query($sql);



header("Location: ./index.php");



?>