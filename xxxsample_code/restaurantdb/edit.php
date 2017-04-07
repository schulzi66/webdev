<?php
session_start();
include("inc/head.php");
include("inc/header.php");
include('./db/config.php');

if (isset($_SESSION['username'])) {

	if (isset($_GET['update'])) {
		
		$meal = $_GET['update'];


		echo '	<script src="./js/tinymce.min.js"></script>
				<script type="text/javascript">
					tinymce.init({
						selector: "textarea",
						plugins: [
							"advlist autolink lists link image charmap print preview anchor",
							"searchreplace visualblocks code fullscreen",
							"insertdatetime media table contextmenu paste"
						],
						toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
					});
				</script>
			
				<main>			
					<form action="controller.php?update=dish" method="post">';

						$sql = "SELECT * FROM dish WHERE id='".$meal."'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();

		echo '			<input type="hidden" name="id" value="'.$row['id'].'"/>
						
						<label>Type</label>
						<input type="text" name="type" value="'.$row['type'].'"/>
						
						</br> </br> </br>
						
						<label>Title</label>
						<input type="text" name="title" value="'.$row['title'].'"/>
						
						</br> </br> </br>
						
						<label>Price</label>
						<input type="number" name="price" value="'.$row['price'].'"/>
						
						</br> </br> </br>

						<label>Description</label>
						<textarea name="description" style="width:100%">'.$row['description'].'</textarea>
						
						<br/> <br/> </br>

						<label>Picture</label>
						<select name="picture">';
						
						$sql = "SELECT name FROM images";
						$result = $conn->query($sql);
						while ($row = $result->fetch_assoc())
						{
		echo '				<option>'.$row["name"].'</option>';
						}
		
		echo '			</select>
						</br> </br>
						
						<input type="submit" value="Update"/>
					</form>
				</main>';
	}

	
	if (isset($_GET['page'])) {
		
		$page = $_GET['page'];


		echo '	<script src="./js/tinymce.min.js"></script>
				<script type="text/javascript">
					tinymce.init({
						selector: "textarea",
						plugins: [
							"advlist autolink lists link image charmap print preview anchor",
							"searchreplace visualblocks code fullscreen",
							"insertdatetime media table contextmenu paste"
						],
						toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
					});
				</script>
			
				<main>			
					<form action="controller.php?update=page" method="post">';

						$sql = "SELECT * FROM pages WHERE page='".$page."'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();

		echo '			<input type="hidden" name="id" value="'.$row['id'].'"/>
						<input type="hidden" name="page" value="'.$page.'"/>
						

						<label>Page Title</label>
						<input type="text" name="title" value="'.$row['title'].'"/>
						
						</br> </br> </br>

						<label>Page Text</label>
						<textarea name="text" style="width:100%">'.$row['text'].'</textarea>
						<br/><br/>

						<input type="submit" value="Update"/>
					</form>
				</main>';
	}
	
	if (isset($_GET['picture-update'])) {
	
		$id = $_GET['picture-update'];
	
		echo '	<script src="./js/tinymce.min.js"></script>
				<script type="text/javascript">
					tinymce.init({
						selector: "textarea",
						plugins: [
							"advlist autolink lists link image charmap print preview anchor",
							"searchreplace visualblocks code fullscreen",
							"insertdatetime media table contextmenu paste"
						],
						toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
					});
				</script>
			
				<main>			
					<form action="controller.php?update=picture" method="post">';

						$sql = "SELECT * FROM images WHERE id='".$id."'";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();

		echo '			<input type="hidden" name="id" value="'.$row['id'].'"/>
						<input type="hidden" name="name" value="'.$row['name'].'"/>
						
						<label>Name</label>
						<input type="text" name="show" value="'.$row['name'].'" disabled="disabled"/>
						
						</br> </br> </br>
						
						<label>Page</label>
						<input type="text" name="page" value="'.$row['page'].'"/>
						
						</br> </br> </br>

						<label>Description</label>
						<textarea name="description" style="width:100%">'.$row['description'].'</textarea>
						
						<br/> <br/> </br>
						
						<input type="submit" value="Update"/>
					</form>
				</main>';	
	
	

	}
	
}


include("inc/footer.php");
?>