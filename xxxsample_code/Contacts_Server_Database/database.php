<?php include "includes/part_header.php"; ?>

<h1>database.php</h1>

<?php
include "includes/database_config.php";

if (isset($_REQUEST['name']) && strlen($_REQUEST['name'])>0) 
	include "includes/database_save_contact.php";

include "includes/database_display_contacts.php";

include "includes/database_close.php";
?>

<form action="database.php" method="post" class="clearfix">

	<label for="name">Name</label>
	<input type="text" id="name" name="name"/>
	
	<label for="address">Address</label>
	<input type="text" id="address" name="address"/>
	
	<label for="mobile">Mobile</label>
	<input type="text" id="mobile" name="mobile"/>
		
	<input type="submit" value="Save Contact"/>
</form>

<?php include "includes/part_footer.php"; ?>