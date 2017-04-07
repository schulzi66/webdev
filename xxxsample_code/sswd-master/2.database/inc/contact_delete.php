<?php
$id = $_GET["delete"];

$conn->query("DELETE FROM contacts WHERE id = ".$id);

header('Location: contact.php') ;
?>
