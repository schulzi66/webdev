<?php
include('db/config.php');

if ($_GET['action']=="add") {
	if ($_GET['username']!="" && $_GET['message']!="") {
		$username = $_GET['username'];
		$message = $_GET['message'];

		$sql = "INSERT INTO chatting (created_at, username, message)
				VALUES (NOW(), '$username', '$message')";

		$conn->query($sql);		
	}
}

elseif ($_GET['action']=="all") {

	$sql = "SELECT * FROM chatting ORDER BY created_at DESC";

	$result = $conn->query($sql);

 	while($row = $result->fetch_assoc()) {
    	echo '<tr>';
    	echo '<td>'.$row["id"].'</td>';
        echo '<td>'.$row["created_at"].'</td>';
    	echo '<td>'.$row["username"].'</td>';
    	echo '<td>'.$row["message"].'</td>';
        echo '</tr>';
    }
}


elseif ($_GET['action']=="wipe") {
	$username = $_GET['username'];

	$sql = "DELETE FROM chatting WHERE username = '".$username."'";

	$result = $conn->query($sql);
}
?>
	

