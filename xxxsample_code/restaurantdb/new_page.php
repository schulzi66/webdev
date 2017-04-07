<?php
session_start();
include("inc/head.php");
include("inc/header.php");
include("db/config.php");

$id=$_GET["id"];



$sql = "SELECT * FROM pages WHERE id='$id'";
$result = $conn->query($sql);
//$page=$row["page"];

	if ($result->num_rows > 0) {
		$page=$row["page"];
		while($row = $result->fetch_assoc()) {
			echo '<h1>'.$row["title"].'</h1>';
			echo $row["text"];
		}
	}
	
	
	
//$sql = "SELECT page FROM pages WHERE id='$id'";
//$result = $conn->query($sql);


if (isset($_SESSION['username'])) 
{
	$sql = "SELECT page FROM pages WHERE id='$id'";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		echo '<p><a href="edit.php?page='.$row["page"].'">Edit this page</a></p>';
		$page=$row["page"];
	}
}

else{
	$sql = "SELECT page FROM pages WHERE id='$id'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$page=$row["page"];
	}
	
}
$sql = "SELECT * FROM images WHERE page='$page'";
$result = $conn->query($sql);
//echo $sql;
//exit();

while($row = $result->fetch_assoc()) {
	echo '</br> </br>';
	echo '<image src="images/'.$row["name"].'"></br>';
	echo '<p>'.$row["description"].'</p>';
}



include("inc/footer.php");
?> 