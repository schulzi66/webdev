<?php
session_start();

include("inc/head.php");
include("inc/header.php");

if (isset($_SESSION['username'])) 
{
	header('Location: admin.php');
}
?>








<form action="controller.php" method="post">


    <label>Username</label><br/>
    <input type="text" name="username" value="admin"/><br/>
	
    <label>Password</label><br/>
    <input type="password" name="password" value="password"/><br/>
	
    <input type="submit" value="Login"/>
	
	
</form>





<?php
include("inc/footer.php");
?>
