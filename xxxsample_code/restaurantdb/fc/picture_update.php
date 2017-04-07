<?php


$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$page = $_REQUEST['page'];
$description = $_REQUEST['description'];

$sql = "UPDATE images SET
		name = \"".$name."\",
		page = \"".$page."\",
		description = \"".$description."\"			
		WHERE id = ".$id;
$conn->query($sql);

header("Location: ./admin.php");


?>