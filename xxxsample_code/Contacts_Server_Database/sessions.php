<?php 
session_start();

$views = 0;
if (isset($_SESSION['views']))
	$views = $_SESSION['views'];

if ($views==0)
	echo "This page has not been viewed before.";
else 
	echo "This page has been viewed ".$_SESSION['views']." times.";

$_SESSION['views'] = ++$views;
?>