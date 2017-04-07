<?php
	session_start();
	$sNumber = $_SESSION['sNumber'];
	
?>


<html>
	<head><title>Search!</title></head>
	
	<body>
		<h1>Hi <?php echo $_SESSION['sNumber']; ?>! Search for contact details!</h1>
		
		
		<form action="search.php" method="post">
			Enter student number <input type="text" name="search_snumber">
			<br><br>
			<input type="submit" value="Search!">
		</form>
		
		
		<?php
			// IN the case where information is posted to this, display results (if any)
		
		
			// Retrieve the current NOK details for this sNumber.
	
	
	// Setup connection to DB
	if(isset($_POST['search_snumber'])){
	
	
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
	
	$sql = "SELECT * FROM contact WHERE sNo = '" . $_POST['search_snumber'] . "'";
	
	$results = mysql_query($sql);
	
	// CHeck to see if query ran succcessfull!
	if(!$results){
		echo 'Error retrieving current contact details from DB';
		die();
	}
	
	// Assuming everything has gone well at this point! Let's retrieve the information from the result set of this query
	
	
	echo "<table width='100%' border='1'>";
	$count = 0;
	
	while($row = mysql_fetch_array($results)){
		echo '<tr>';
		echo '<td>' . $row['nok'] . '</td>';
		echo '<td>' . $row['details'] . '</td>';
		echo '</tr>';
		$count = $count+1;
	}
	echo '<tr><td colspan="2">Number of results! '. $count . '</td></tr>';
	echo '</table>';
	}

		?>
	</body>
</html>