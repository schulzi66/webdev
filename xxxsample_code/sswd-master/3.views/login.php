<?php
session_start();

if (isset($_SESSION['user'])) {
	header('Location: index.php');
}
?>

<form action="controller.php">
    <label>Username</label><br/>
    <input type="text" name="username"/><br/>
    <label>Password</label><br/>
    <input type="password" name="password"/><br/>
    <input type="submit" value="Login"/>
</form>