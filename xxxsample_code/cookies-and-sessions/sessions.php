<?php
	// 1. Again, like cookies, if you are to start a session, do it before anything is outputted from the
	// web resourece
	
	session_start();
/*	$_SESSION['sname']="mysession";
	var_dump($_SESSION); */
	
	echo "<br>";
	
	if(!isset($_SESSION["hitcounts"])){
		$_SESSION["hitcounts"] = 1;
	 }
	 
	$currentHitCount = $_SESSION["hitcounts"];
		
	$currentHitCount++;
	$_SESSION["hitcounts"] = $currentHitCount;
	
?>


<html>
	<head><title>Count the number of times this page is requested per user!</title></head>
	
	
	<body>
		The amount of times you requested this page is = <?php echo $_SESSION["hitcounts"]; ?>
	</body>
</html>

<?php
// Unset (or reset) the session if the page has been requested more than 10 times.
	
	if($_SESSION["hitcounts"] >9){
		unset($_SESSION["hitcounts"]); 
	} 
	
/*	echo "<br>";
	var_dump($_SESSION);  */
?>