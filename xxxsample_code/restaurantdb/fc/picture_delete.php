<?php


$sql = "DELETE FROM images WHERE id = ".$id;
$conn->query($sql);
	
//echo $sql;
//exit();

header("Location: ./admin.php");

?>