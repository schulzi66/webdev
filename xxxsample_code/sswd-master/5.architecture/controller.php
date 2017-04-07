<?php
include('db/config.php');

$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$text = $_REQUEST['text'];

$sql = "UPDATE pages1 SET
		title = \"".$title."\",
		text = \"".$text."\"
		WHERE id = ".$id;

$conn->query($sql);

header('Location: index.php');