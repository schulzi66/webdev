<?php
$fullname = $_GET["fullname"];
$email = $_GET["email"];

$sql = "INSERT INTO student (fullname, email)
		VALUES ('$fullname', '$email')";

$result = mysqli_query($conn, $sql);	
//$conn->query($sql);  //OO approach
echo $sql;

header('Location: student.php') ;
?>
