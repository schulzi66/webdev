<?php
/**
 * @module : PHP Certification
 * @author : Kamil Piecuch
 * @studentID : 2864100
 * @email : kamil.piecuch@yahoo.com
 *
 */

$msg = "";

if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $initials = $_POST["initials"];
    $surname = $_POST["surname"];
} else {
    $firstname = "";
    $initials = "";
    $surname = "";
}

function validate($firstname, $initials, $surname){
    global $msg;
    if(strlen($firstname) < 3 || !ctype_upper(substr($firstname,0, 1))){
        $msg .= "Entered name is incorrect (A valid first name starts with an upper case letter, and is at least 3 characters long).<br>";
    }

    if(strlen($initials) > 1 || empty($initials)){
        $msg .= "Entered initial is incorrect (A valid middle name is only one character long, but can be any character).<br>";
    }

    if(strlen($surname) < 4 || !ctype_upper(substr($surname,0, 1))){
        $msg .= "Entered surname is incorrect (A valid surname starts with an upper case letter, and is at least 4 characters long).<br>";
    }

    return $msg;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form validation</title>
</head>
<style>
    body {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<body>
<h1>Form validation</h1>
<form action="" method="post">
    <label>Enter first name</label>
    &nbsp;
    <input type="text" name="firstname">
    <br>
    <br>
    <label>Enter initial of the middle name</label>
    &nbsp;
    <input type="text" name="initials" size="4">
    <br>
    <br>
    <label>Enter surname</label>
    &nbsp;
    <input type="text" name="surname">
    <br>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if(isset($_POST["submit"])){
    validate($firstname, $initials, $surname);
    if(empty($msg)){
        echo "<p style='color:green;'>Details you have entered were validated successfully</p>";
    } elseif (!empty($msg)){
        echo "<p style='color:red;'>".$msg."</p>";
    }
}
?>
</body>

</html>