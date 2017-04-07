<?php
include('db/config.php');

$page = "home";
if (isset($_GET['page']))
	$page = $_GET['page'];


include('inc/header.php');
include('inc/nav.php');

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
			<form action="controller.php" method="post">';

				$sql = "SELECT * FROM pages1 WHERE page='".$page."'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();

echo '			<input type="hidden" name="id" value="'.$row['id'].'"/>

				<label>Page Title</label>
				<input type="text" name="title" value="'.$row['title'].'"/>

				<label>Page Text</label>
				<textarea name="text" style="width:100%">'.$row['text'].'</textarea>
				<br/><br/>

				<input type="submit" value="Update"/>
			</form>
		</main>';

include('inc/footer.php');