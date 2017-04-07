<?php
	// Lets take the data posted to this page, and enter it in the database
	
	// Setup connection to DB
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpassword = "SQLroot";
	$dbschema = "contacts";
	
	$connection = mysql_connect($dbhost, $dbuser, $dbpassword);
	
	if(!$connection){
		echo 'Error connecting to the database!';
		die();
	}
	
	// Else, assume it works
	
	// Select a schema to work with!
	$db = mysql_select_db($dbschema, $connection);
	
	// Lets construct the SQL to insert the data posted to this page
	// into the database
	$sql = "INSERT INTO user VALUES ('" . $_POST['sNumber'] . "', '" . $_POST['name'] . "', '" . $_POST['password'] . "')";
	
	$results = mysql_query($sql);
	
	// CHeck to see if query ran succcessfull!
	if(!$results){
		echo 'Problem registering user in database!';
		die();
	}
	
	// Assuming everything has gone well at this point! Let's
	// store the sNumber in a session
	session_start();
	$_SESSION['sNumber'] = $_POST['sNumber'];
	/*var_dump($_SESSION);
	echo "<br>";
	var_dump($_COOKIE);
	echo "<br>"; */
?>


<html>
	<head><title>Enter your Next of Kin details</title></head>
	
	<body>
		<h1>Hi <?php echo $_SESSION['sNumber']; ?>! Enter your emergency contact details</h1>
		
		
		<form action="home.php" method="post">
			Next Of Kin Name <input type="text" name="nok_name">
			<br>
			Nok Contact Details <input type="text" name="nok_details"><br>
			<input type="submit" name="Submit!">
		</form>
	</body>
</html>