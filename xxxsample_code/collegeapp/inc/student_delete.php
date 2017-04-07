<?php
$id = $_GET["delete"];

$result = mysqli_query($conn, "DELETE FROM student WHERE id = ".$id);	
//$conn->query("DELETE FROM student WHERE id = ".$id);  //OO approach

header('Location: student.php') ;
?>
