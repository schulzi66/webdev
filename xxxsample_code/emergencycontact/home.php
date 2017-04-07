<?php
	// Resume the session from the previous page
	session_start();
	
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
	
	
	// 1. Check to see if this page is being requested from signup.php, or, from edit.php
	
	$contactPerson = "";
	$contactDetails = "";
		
	if(isset($_POST['nok_name'])){
		// THen being called from signup.php
	
		// Lets take the data posted to this page (which is the NOK details), and enter it in the database
	
	
		// Lets construct the SQL to insert the data posted to this page
		// into the database
		$sql = "INSERT INTO contact VALUES ('" . $_SESSION['sNumber'] . "', '" . $_POST['nok_name'] . "', '" . $_POST['nok_details'] . "')";
		
		$results = mysql_query($sql);
		
		// CHeck to see if query ran succcessfull!
		if(!$results){
			echo 'Error registering contact details in the database!!';
			die();
		}
		
		
		$contactPerson = $_POST['nok_name'];
		$contactDetails = $_POST['nok_details'];
	}
	
	if(isset($_POST['new_nok_name'])){
		// Process information in the post array from edit.php
		
		// Lets construct the SQL to update the current NOK details
		// into the database
		$sql = "UPDATE contact SET nok = '" . $_POST['new_nok_name'] . "', details='" . $_POST['new_nok_details'] . "' WHERE sNo='" . $_SESSION['sNumber'] . "'";
		$results = mysql_query($sql);
		
		// CHeck to see if query ran succcessfull!
		if(!$results){
			echo 'Error updating contact details in the database!!';
			die();
		}
		
		
		$contactPerson = $_POST['new_nok_name'];
		$contactDetails = $_POST['new_nok_details'];
	}
	
?>


<html>
	<head><title>Your emergency contact details!</title></head>
	
	<body>
		<h1>Hi <?php echo $_SESSION['sNumber']; ?>! Here are your emergency contact details!</h1>
		
		<br><br><br>
		
		<h2>Your contact person</h2>
		<?php echo $contactPerson; ?>
	
		<br><br>
		<h2>Person's details</h2>
		<?php echo $contactDetails; ?>
		
		
		<br><br>
		<a href="edit.php">Edit your details!</a>
	</body>
</html>