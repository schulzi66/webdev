<?php
session_start();
include("inc/head.php");
include("inc/header.php");
include("db/config.php");
?>

	
<div class="para">
	
<?php	
	
	
$sql = "SELECT * FROM pages WHERE page='home'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo '<h1>'.$row["title"].'</h1>';
		echo $row["text"];
	}
}
	
	
if (isset($_SESSION['username'])) {
	echo '<p><a href="edit.php?page=home">Edit this page</a></p>';
}
	
?>
	

</div>


<?php
$sql = "SELECT * FROM images WHERE page='home'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo '</br> </br>';
	echo '<image src="images/'.$row["name"].'">';
	echo '<p>'.$row["description"].'</p>';
}
?>


</br> </br>

<div class="comments">
	

<?php	

$sql = "SELECT name, DATE_FORMAT(created_at, '%d/%m/%Y %Hh%imin%ss') AS date, message, show_comment, star FROM comments ORDER BY ID DESC";
$result = $conn->query($sql);
	
	

if ($result->num_rows > 0) 
{
?>

	<div class="tableau">
		<table >
			<tr>
				<td >
					Name
				</td>
				<td>
					Date
				</td>
				<td>
					Message
				</td>
				<td>
					Stars
				</td>
			</tr>
			
<?php
	
	
		while($row = $result->fetch_assoc()) 
		{
			if($row['show_comment']==1)
			{
				echo '<tr>';
				echo '<td><strong>'.$row["name"].'</strong></td>';
				echo '<td>('.$row["date"].') : </td>';
				echo '<td>'.$row["message"].'</td>';
				$star = $row["star"];
				echo '<td>';
				while ($star > 0)
				{
					echo '<image src="graphics/star.jpg" alt="star">';
					$star = $star - 1;
				}
				echo '</td>';
				echo '</tr>';
			}
		}
		echo '</table>';
	echo '</div>';
} 

	
?>
	
</div>


<?php
include("inc/footer.php");
?>
