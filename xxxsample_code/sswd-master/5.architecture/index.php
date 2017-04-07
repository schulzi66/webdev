<?php
include('db/config.php');

$page = "home";
if (isset($_GET['page']))
	$page = $_GET['page'];


include('inc/header.php');
include('inc/nav.php');

echo '<main>';
$sql = "SELECT * FROM pages1 WHERE page='$page'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	echo '<h1>'.$row["title"].'</h1>';
        echo $row["text"];
        echo '<p><a href="edit.php?page='.$row["page"].'">Edit this page</a></p>';
    }
}
else
	echo "<h1>Page not found, $page</h1>";
echo '</main>';

include('inc/footer.php');