<?php
	session_start();
	$sNumber = $_SESSION['sNumber'];
	//echo $sNumber;
	
	// Retrieve the current NOK details for this sNumber.
	
	
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
	
	// Lets construct the SQL to select the information from the DB for this student number
	
	$sql = "SELECT * FROM contact WHERE sNo = '" . $sNumber . "'";
	
	$results = mysql_query($sql);
	
	// CHeck to see if query ran succcessfull!
	if(!$results){
		echo 'Error retrieving current contact details from DB';
		die();
	}
	
	// Assuming everything has gone well at this point! Let's retrieve the information from the result set of this query
	$nok_name = "";
	$nok_details  = "";
	while($row = mysql_fetch_array($results)){
		$nok_name = $row['nok'];
		$nok_details = $row['details'];
	}
?>


<html>
	<head><title>Re Enter your NOK details</title></head>
	
	<body>
		<h1>Hi <?php echo $_SESSION['sNumber']; ?>! Re Enter your emergency contact details</h1>
		
		
		<form action="home.php" method="post">
			NOK Name <input type="text" name="new_nok_name" value = "<?php
					echo $nok_name;
			?>">
			<br>
			Nok Contact Details <input type="text" name="new_nok_details" value="<?php
					echo $nok_details;
			?>"><br>
			<input type="submit" name="Update!">
		</form>
	</body>
</html>