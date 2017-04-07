<?php
session_start();

if (isset($_SESSION['user'])) 
	include('inc/header_user.php');
else
	include('inc/header_public.php');

?>

<h1>This is the index.php page.</h1>

<?php
if (isset($_SESSION['user'])) {
	echo '<a href="controller.php?logout=yes">Logout</a>';
}
?>