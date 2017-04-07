<?php
include('db/config.php');
include('inc/students_header.php');

?>	

	
<main>
	<form action="students.php">
		<?php
		$name = "";
		$email = "";
		if (isset($_GET['id'])) {
		 	echo '<input type="hidden" name="update" value="'.$_GET['id'].'"/>';

		 	$sql = "SELECT * FROM students WHERE id = ".$_GET['id'];
			$result = $conn->query($sql);

    		while($row = $result->fetch_assoc()) {
    			$name = $row["name"];
    			$email = $row["email"];       
    		}
    	}
		?>

		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="<?php echo $name; ?>" />

		
	    <label for="email">Email</label>
		<input type="text" name="email" id="email" value="<?php echo $email; ?>" />
	    

	    <input type="submit" value="Save"/>
	</form>
	<hr/>

	<?php
	// test if a contact must be updated
    if (isset($_GET["update"])) {		        
        include('inc/students_update.php');		        	        
    }  

    // test if a contact must be deleted
    else if (isset($_GET["delete"])) {		        
        include('inc/students_delete.php');		        	        
    } 

    // test if a contact must be created
    else if (isset($_GET["name"])) {		        
        include('inc/students_create.php');		        	        
    }

    // always display the results from the database
    include('inc/students_read.php');
	?> 
</main>	


<?php
include('inc/students_footer.php');
?>				

