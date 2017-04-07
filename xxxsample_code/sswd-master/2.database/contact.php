<?php
include('db/config.php');
include('inc/header.php');
include('inc/nav.php');
?>	

	
<main>
	<form action="contact.php">
		<?php
		$name = "";
		$message = "";
		if (isset($_GET['id'])) {
		 	echo '<input type="hidden" name="update" value="'.$_GET['id'].'"/>';

		 	$sql = "SELECT * FROM contacts WHERE id = ".$_GET['id'];
			$result = $conn->query($sql);

    		while($row = $result->fetch_assoc()) {
    			$name = $row["name"];
    			$gender = $row["gender"];
    			$message = $row["message"];       
    		}
    	}
		?>

		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="<?php echo $name; ?>" />

		<label for="gender">Gender</label>
	    <select name="gender" id="gender">
	        <option value="male">Male</option>
	        <option value="female">Female</option>
	    </select>

	    <label for="message">Message</label>
	    <textarea name="message" id="message"><?php echo $message; ?></textarea>

	    <input type="submit" value="Save"/>
	</form>
	<hr/>

	<?php
	// test if a contact must be updated
    if (isset($_GET["update"])) {		        
        include('inc/contact_update.php');		        	        
    }  

    // test if a contact must be deleted
    else if (isset($_GET["delete"])) {		        
        include('inc/contact_delete.php');		        	        
    } 

    // test if a contact must be created
    else if (isset($_GET["name"])) {		        
        include('inc/contact_create.php');		        	        
    }

    // always display the results from the database
    include('inc/contact_read.php');
	?> 
</main>	


<?php
include('inc/footer.php');
?>				

