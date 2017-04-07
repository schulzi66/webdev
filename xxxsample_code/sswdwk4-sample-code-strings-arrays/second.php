
<!DOCTYPE html>
<html>

<head>
<TITLE>Using Echo</TITLE>
</head>

<body>
<!-- Script 1.2 - second.php -->
<p> This is standard HTML. </p>
<?php
$name = "Fred";
$age = 34;
echo 'This was generated using PHP!';
echo "<br>";
echo "My friend's name is $name " . "and his age is " . $age;

?>
</body>

</html>