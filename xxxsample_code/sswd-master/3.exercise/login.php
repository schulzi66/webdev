<?php
session_start();

if (isset($_SESSION['username'])) {
	header('Location: account.php');
}
?>

<form action="controller.php" method="get">
    <label>Username</label><br/>
    <input type="text" name="username"/><br/>
    <label>Password</label><br/>
    <input type="password" name="password"/><br/>
    <input type="submit" value="Login"/>
</form>