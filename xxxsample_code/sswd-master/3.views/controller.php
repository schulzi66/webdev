<?php
session_start();

if (isset($_GET['username'])) {
	$username = $_GET['username'];
	$password = $_GET['password'];
	
	if ($username=="admin" && $password=="password") 
		$_SESSION['user'] = 'admin';
 		
	header('Location: index.php');
}

if ($_GET["logout"]) {
    session_destroy();
    header("Location: login.php");
}
