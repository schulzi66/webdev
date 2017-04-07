<?php
$dbhost = 'localhost';
$dbname = 'griffith_hdcs_sewa';
$dbuser = 'root';
$dbpass = 'SQLroot';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

mysql_select_db($dbname, $conn);
?>
