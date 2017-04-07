<?php
session_start();
include("db/config.php");




if (isset($_POST["username"])) {
    // initialize the username and password values

	$username=$_POST['username'];
	$password=$_POST['password'];
	
    // query the database

	$sql="SELECT *
		FROM users
		WHERE username='$username'
		AND password='$password'";
		
	//echo $sql;
	$result=$conn->query($sql);
	
	
    if ($result->num_rows > 0) {
        // save username to the users session
		
		$_SESSION['username']=$username;

        header("Location: admin.php");
    }
	
    else{
		echo "wrong password";
        //header("Location: login.php");
	}
	
}






if (isset($_GET['update'])) {
	$update=$_GET['update'];
	
	if ($update == 'page') 
	{
		include('fc/page_update.php');
	}

	if ($update == 'dish')
	{
		include('fc/dish_update.php');
	}

	if ($update == 'picture')
	{
		include('fc/picture_update.php');
	}

}


if (isset($_GET['add'])) {
	$add=$_GET['add'];
	
	if ($add == 'comment')
	{
		include ('fc/comment_add.php');		
	}
	
	if ($add == 'meal')
	{
		include ('fc/dish_add.php');
	}
	
	if ($add == 'page')
	{
		include ('fc/page_add.php');
	}

}


if (isset($_GET['dish-delete'])) {
	$id=$_GET['dish-delete'];
	
	include ('fc/dish_delete.php');

}
	
	
if (isset($_GET['page-delete'])) {
	$id=$_GET['page-delete'];
	
	if ($id > 3) {
		include ('fc/page_delete.php');
	}
}
	
	
if (isset($_GET['dish-show'])) {
	$id=$_GET['dish-show'];
	
	include('fc/dish_show.php');

}
	
	
if (isset($_GET["dish-hide"])) {
	$id = $_GET["dish-hide"];
	
	include('fc/dish_hide.php');
	
}
	
	
if (isset($_GET['comment-show'])) {
	$id=$_GET['comment-show'];
	
	include('fc/comment_show.php');

}
	
	
if (isset($_GET["comment-hide"])) {
	$id = $_GET["comment-hide"];
	
	include('fc/comment_hide.php');
	
}


if (isset($_GET["picture-delete"])) {
	$id = $_GET["picture-delete"];
	
	include('fc/picture_delete.php');
	
}








if ($_GET["logout"]) {
	session_destroy();
	header("Location: index.php");
}

?>