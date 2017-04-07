<?php
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo '<table>';
    echo '<caption>Students</caption>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>&nbsp;</th>';
    echo '<th>&nbsp;</th>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
    	echo '<td>'.$row["id"].'</td>';
        echo '<td>'.$row["name"].'</td>';
    	echo '<td>'.$row["email"].'</td>';
        echo '<td><a href="students.php?delete='.$row["id"].'">Delete</a></td>';
        echo '<td><a href="students.php?id='.$row["id"].'">Update</a></td>';
    	echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "<h2>0 Results</h2>";
}
?> 