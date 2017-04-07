<?php
include('db/config.php');
include('inc/header.php');
include('inc/nav.php');
?>	

	
<main>
	<form action="student.php" method="get">
		<?php
		$fullname = "";
		$email = "";
		if (isset($_GET['id'])) {
		 	echo '<input type="hidden" name="update" value="'.$_GET["id"].'"/>';

		 	$sql = "SELECT * FROM student WHERE id = ".$_GET["id"];
			$result = mysqli_query($conn, $sql);	

			while($row = mysqli_fetch_array($result)) {
    			$fullname = $row["fullname"];
    			$email = $row["email"];      
    		}
    	}
		?>

		<label for="fullname">Full Name</label>
		<input type="text" name="fullname" id="fullname" value="<?php echo $fullname; ?>" />

	    <label for="email">Email</label>
		<input type="text" name="email" id="email" value="<?php echo $email; ?>" />
	
	    <input type="submit" value="Save"/>
	</form>
	<hr/>

	<?php
	
	// test if a student must be updated
    if (isset($_GET["update"])) {		        
        include('inc/student_update.php');		        	        
    }  

    // test if a student must be deleted
    else if (isset($_GET["delete"])) {		        
        include('inc/student_delete.php');		        	        
    } 

    // test if a student must be created
    else if (isset($_GET["fullname"])) {	
        include('inc/student_create.php');		
    }

    // always display the results from the database
    include('inc/student_read.php');
	
	?> 
</main>	


<?php
include('inc/footer.php');
?>				

