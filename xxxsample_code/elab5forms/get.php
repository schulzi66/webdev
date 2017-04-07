<html>
<head>
<title>Grab form values</title>
</head>
<body>
    Welcome <?php echo $_GET["name"];?>.<br/>
    You are <?php echo $_GET["age"];?> years old <br/>
	<?php print_r($_GET); ?>
	<?php var_dump($_GET); ?>
</body>
</html>