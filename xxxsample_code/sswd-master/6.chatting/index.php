<?php
include('inc/header.php');
include('inc/nav.php');
?>

<main>
	<h1>Chatting</h1>
	
	<form action="contact.php">
		<label for="username">Name</label>
		<input type="text" id="username" value="" />

	    <label for="message">Message</label>
	    <input type="text" id="message"/>

	    <button type="button" id="save">Save</button>
	    <button type="button" id="wipe">Wipe</button>
	</form>

	<table>
		<caption>Contacts</caption>
    	<thead>
		    <tr>
			    <th>ID</th>
			    <th>Created</th>
			    <th>Username</th>
			    <th>Message</th>
			</tr>
	    </thead>
    	<tbody>
    	</tbody>
	</table>
</main>

<?php
include('inc/footer.php');
?>