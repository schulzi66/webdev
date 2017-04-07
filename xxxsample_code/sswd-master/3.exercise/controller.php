<?php
session_start();

include('db/config.php');

if (isset($_GET['username'])) {
	$username = $_GET['username'];
	$password = $_GET['password'];

	$sql = "SELECT * 
			FROM users 
			WHERE username = '$username'
			AND password = '$password'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$_SESSION['username'] = $username;   

		//echo "success"; 		
		header('Location: account.php');
	}
	else {
		//echo "not";
		header('Location: login.php');
	}
}

if ($_GET["logout"]) {
    session_destroy();
    header("Location: login.php");
}
