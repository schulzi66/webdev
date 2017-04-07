<?php
session_start();
include("inc/head.php");
include("inc/header.php");
include("db/config.php");



if (isset($_SESSION['username'])) {
	
	$add=$_GET['add'];
	
	
	if ($add == 'meal') {

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
					
					<form action="controller.php?add=meal" method="post">';


		echo '			<label>Type</label>
						<input type="text" name="type"/>
							
						</br> </br> </br>
							
						<label>Title</label>
						<input type="text" name="title"/>
						
						</br> </br> </br>
							
						<label>Price</label>
						<input type="number" name="price"/>
							
						</br> </br> </br>
							
						<label>Picture</label>
						<select name="picture">';
						
						$sql = "SELECT name FROM images";
						$result = $conn->query($sql);
						while ($row = $result->fetch_assoc())
						{
		                      echo '				<option>'.$row["name"].'</option>';
						}
		
		                echo '			</select>
							
						</br> </br> </br>

						<label>Description</label>
						<textarea name="description" style="width:100%"></textarea>
						<br/><br/>

						<input type="submit" value="Create"/>
					</form>
				</main>';

	}

	

	if ($add == 'page') {

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
					
					<form action="controller.php?add=page" method="post">';


		echo '			<label>page</label>
						<input type="text" name="page"/>
							
						</br> </br> </br>
							
						<label>Title</label>
						<input type="text" name="title"/>
						
						</br> </br> </br>
							

						<label>text</label>
						<textarea name="text" style="width:100%"></textarea>
						<br/><br/>

						<input type="submit" value="Create"/>
					</form>
				</main>';



















	}























}

include("inc/footer.php");
?>