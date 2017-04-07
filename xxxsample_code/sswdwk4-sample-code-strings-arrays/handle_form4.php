<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type"
	content="text/html; charset=utf-8" />
	<title>Form Feedback</title>
 </head>
 <body>
 <?php  #  Script 2.5 - handle_form.php #4

 // Perform some basic form validation:
if (!empty($_POST['name']) &&
     !empty($_POST['comments']) &&
	 !empty($_POST['email'])) {
         echo "<p>Thank you, <b>{$_POST['name']}</b>, for the following comments:<br />
           <tt>{$_POST['comments']}</tt></p>
           <p>We will reply to you at <i>{$_POST['email']}</i>.</p>\n";

 } else { // Missing form value.
 echo '<p class="error">Please go back and fill out the form again.</p>';
}
?>
</body>
</html>