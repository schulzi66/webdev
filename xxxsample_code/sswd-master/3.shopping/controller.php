<?php
session_start();

include('inc/products.php');
include('inc/shopping.php');

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	
	if (array_key_exists($id, $shopping)) {
		$count = $shopping[$id];
		$shopping[$id] = ++$count;
	}
	else 
		$shopping[$id] = 1;

	$_SESSION['shopping'] = $shopping;
}

elseif (isset($_GET['empty'])) {
	unset($_SESSION['shopping']);
}

header('Location: index.php');
?>
	


