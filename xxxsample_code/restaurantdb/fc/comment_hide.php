<?php


$sql = "UPDATE comments SET 
		show_comment = 0
		WHERE id = " .$id;
$conn->query($sql);
	
//echo $sql;
//exit();

header("Location: ./admin.php");

?>