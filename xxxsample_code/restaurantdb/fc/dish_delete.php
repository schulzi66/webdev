<?php


$sql = "DELETE FROM dish WHERE id = ".$id;
$conn->query($sql);
	
//echo $sql;
//exit();

header("Location: ./admin.php");

?>