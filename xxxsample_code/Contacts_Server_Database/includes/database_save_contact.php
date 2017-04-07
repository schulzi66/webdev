<?php 
$name = $_REQUEST['name'];
$address = $_REQUEST['address'];
$mobile = $_REQUEST['mobile'];

$sql = "INSERT INTO contacts (name, address, mobile) VALUES ('".$name."', '".$address."', '".$mobile."')";
mysql_query($sql);
?>