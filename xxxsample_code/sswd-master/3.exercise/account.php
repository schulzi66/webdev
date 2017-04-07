<?php
session_start();

//var_dump($_SESSION);
//echo "<br>";
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}
?>

<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
<p>This is the account page.</p>
<a href="controller.php?logout=now">Logout</a>