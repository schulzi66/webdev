<?php
$sql = "SELECT * FROM student";

$result = mysqli_query($conn, $sql);	//procedural approach
//$result = $conn->query($sql);  //OO approach

if ($result) {
    $num=mysqli_affected_rows($conn);
	if ($num>0) {
     //if ($result->num_rows > 0) { //OO approach
	   echo '<table>';
       echo '<caption>Contacts</caption>';
       echo '<thead>';
       echo '<tr>';
       echo '<th>ID</th>';
       echo '<th>Full Name</th>';
       echo '<th>Email</th>';
       echo '<th>&nbsp;</th>';
       echo '<th>&nbsp;</th>';
       echo '</thead>';
       echo '<tbody>';
	   while ($row=mysqli_fetch_array($result)) {
        // while($row = $result->fetch_assoc()) {  //OO approach
    	   echo '<tr>';
    	   echo '<td>'.$row["id"].'</td>';
    	   echo '<td>'.$row["fullname"].'</td>';
    	   echo '<td>'.$row["email"].'</td>';
           echo '<td><a href="student.php?delete='.$row["id"].'">Delete</a></td>';
           echo '<td><a href="student.php?id='.$row["id"].'">Update</a></td>';
    	   echo '</tr>';
       }
       echo '</tbody>';
       echo '</table>';
   } else {
    echo "<h2>0 Results</h2>";
  }
}
?> 