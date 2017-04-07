<?php

$sql = "DELETE FROM pages WHERE id = ".$id;
$conn->query($sql);
	
//echo $sql;
//exit();

header("Location: ./admin.php");
?>