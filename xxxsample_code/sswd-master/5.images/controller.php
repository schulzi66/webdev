<?php
move_uploaded_file($_FILES['image']['tmp_name'], "./images/".$_FILES['image']['name']);
header('Location: index.php');
?>