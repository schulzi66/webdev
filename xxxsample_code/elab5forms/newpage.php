<html>
<head>
<title>Grab form values</title>
</head>
<body>
		Welcome <?php echo $_POST["name"];?>.<br/>
		You are <?php echo $_POST["age"];?> years old <br/>
		Your password is <?php echo $_POST["pw"];?> !! <br/>
		
		You are <?php echo $_POST["gender"];?> <br/>
		 <?php // var_dump($_POST); //?> 
</body>
</html>