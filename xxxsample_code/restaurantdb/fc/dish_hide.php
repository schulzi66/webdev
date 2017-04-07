<?php
	
$sql = "UPDATE dish SET 
		show_meal = 0
		WHERE id = " .$id;
		
$conn->query($sql);

//echo $sql;
//exit();

header("Location: ./admin.php");



?>