<?php 
$query  = "SELECT * FROM contacts";
$result = mysql_query($query);

if (mysql_num_rows($result)==0) {
	echo "<h2>No Data Found</h2>";
}
else {
	echo '<table border="1">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Address</th>
				<th>Mobile</th>
			</tr>';

	while($row = mysql_fetch_array($result)) {
		echo '<tr>';
		echo '<td>'.$row['id'].'</td>';
		echo '<td>'.$row['name'].'</td>';
		echo '<td>'.$row['address'].'</td>';
		echo '<td>'.$row['mobile'].'</td>';
		echo '</tr>';
	}
	echo '</table>';
}
?>