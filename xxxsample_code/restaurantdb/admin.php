<?php
session_start();
include("inc/head.php");
include("inc/header.php");
include("db/config.php");


if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

echo '</br><a href="add.php?add=meal">Add a dish</a></br>';
echo '</br><a href="add.php?add=page">Add a page</a></br>';

?>
</br></br></br>
<form action="fc/picture_add.php" method="post" enctype="multipart/form-data">
	<p>
		Upload a picture :<br /><br/>
		<input type="file" name="mypicture" /><br /></br>
		<input type="submit" value="Upload" />
	</p>
</form>
</br></br></br>
<?php
	
/* ******** COMMENTS ******** */
	
	
echo '<p>List of all the comments</p>';
	
	
$sql = "SELECT * FROM comments ORDER BY ID DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>

<div class="tableau">
    <table >
        <tr>
            <td>
                ID
            </td>
            <td >
                Name
            </td>
            <td>
				Email
			</td>
			<td>
				Message
			</td>
			<td>
				Stars
			</td>
			<td>
				Show Comment ?
			</td>
			<td>
				Yes
			</td>
			<td>
				No
			</td>
		</tr>
		
<?php
	
	
	while($row = $result->fetch_assoc()) {
		
		
		echo '<tr>';
		echo '<td>'.$row["id"].'</td>';
		echo '<td>'.$row["name"].'</td>';
		echo '<td>'.$row["email"].'</td>';
		echo '<td>'.$row["message"].'</td>';
		echo '<td>'.$row["star"].' star(s)</td>';
		echo '<td>'.$row["show_comment"].'</td>';
		echo '<td><a href="controller.php?comment-show='.$row["id"].'">Show</a></td>';
		echo '<td><a href="controller.php?comment-hide='.$row["id"].'">Hide</a></td>';
		echo '</tr>';
		
	}
	echo '</table>';
	echo '</div></br>';
} 
	
else {
	echo "No comment";
}




/* ******** MENU ******** */




echo '<p>List of all the dishes</p>';


$sql = "SELECT * FROM dish";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
?>

<div class="tableau">
    <table >
        <tr>
            <td>
                ID
            </td>
            <td >
                Type
            </td>
            <td>
				Title
			</td>
			<td>
				Price
			</td>
			<td>
				Picture
			</td>
			<td>
				Description
			</td>
			<td>
				Show Meal ?
			</td>
			<td>
				Yes
			</td>
			<td>
				No
			</td>
			<td>
				Delete Meal
			</td>
			<td>
				Update Meal
			</td>
		</tr>
		
<?php
	
	
	while($row = $result->fetch_assoc()) {
		
		echo '<tr>';
		echo '<td>'.$row["id"].'</td>';
		echo '<td>'.$row["type"].'</td>';
		echo '<td>'.$row["title"].'</td>';
		echo '<td>'.$row["price"].'€</td>';
		echo '<td>'.$row["picture"].'</td>';
		echo '<td>'.$row["description"].'</td>';
		echo '<td>'.$row["show_meal"].'</td>';
		echo '<td><a href="controller.php?dish-show='.$row["id"].'">Show</a></td>';
		echo '<td><a href="controller.php?dish-hide='.$row["id"].'">Hide</a></td>';
		echo '<td><a href="controller.php?dish-delete='.$row["id"].'">Delete</a></td>';
		echo '<td><a href="edit.php?update='.$row["id"].'">Update</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</div></br>';
} 
	
else {
	echo "No meal";
}



/* ******** PAGES ******** */


echo '<p>List of all the pages</p>';


$sql = "SELECT * FROM pages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
?>

<div class="tableau">
    <table >
        <tr>
            <td>
                ID
            </td>
            <td >
                Page
            </td>
            <td>
				Title
			</td>
			<td>
				Text
			</td>
			<td>
				Delete Page
			</td>
		</tr>
		
<?php
	
	
	while($row = $result->fetch_assoc()) {
		
		echo '<tr>';
		echo '<td>'.$row["id"].'</td>';
		echo '<td>'.$row["page"].'</td>';
		echo '<td>'.$row["title"].'</td>';
		echo '<td>'.$row["text"].'</td>';
		echo '<td><a href="controller.php?page-delete='.$row["id"].'">Delete</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</div></br>';
} 



/* ******** IMAGES ******** */





echo '<p>List of all the pictures</p>';


$sql = "SELECT * FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
?>

<div class="tableau">
    <table >
        <tr>
            <td>
                ID
            </td>
            <td >
                Name
            </td>
            <td>
				Page
			</td>
			<td>
				Description
			</td>
			<td>
				Update picture
			</td>
			<td>
				Delete picture
			</td>
		</tr>
		
<?php
	
	
	while($row = $result->fetch_assoc()) {
		
		echo '<tr>';
		echo '<td>'.$row["id"].'</td>';
		echo '<td>'.$row["name"].'</td>';
		echo '<td>'.$row["page"].'</td>';
		echo '<td>'.$row["description"].'</td>';
		echo '<td><a href="edit.php?picture-update='.$row["id"].'">Update</a></td>';
		echo '<td><a href="controller.php?picture-delete='.$row["id"].'">Delete</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</div></br>';
} 








include("inc/footer.php");
?>