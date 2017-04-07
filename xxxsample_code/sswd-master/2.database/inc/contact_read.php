<?php
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo '<table>';
    echo '<caption>Contacts</caption>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Created</th>';
    echo '<th>Name</th>';
    echo '<th>Gender</th>';
    echo '<th>Message</th>';
    echo '<th>&nbsp;</th>';
    echo '<th>&nbsp;</th>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
    	echo '<td>'.$row["id"].'</td>';
        echo '<td>'.$row["created_at"].'</td>';
    	echo '<td>'.$row["name"].'</td>';
    	echo '<td>'.$row["gender"].'</td>';
    	echo '<td>'.$row["message"].'</td>';
        echo '<td><a href="contact.php?delete='.$row["id"].'">Delete</a></td>';
        echo '<td><a href="contact.php?id='.$row["id"].'">Update</a></td>';
    	echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "<h2>0 Results</h2>";
}
?> 