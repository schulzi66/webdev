<?php


$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
$title = $_REQUEST['title'];
$price = $_REQUEST['price'];
$picture = $_REQUEST['picture'];
$description = $_REQUEST['description'];

$sql = "UPDATE dish SET
		type = \"".$type."\",
		title = \"".$title."\",
		price = \"".$price."\",
		picture = \"".$picture."\",
		description = \"".$description."\"			
		WHERE id = ".$id;
$conn->query($sql);

header("Location: ./admin.php");


?>