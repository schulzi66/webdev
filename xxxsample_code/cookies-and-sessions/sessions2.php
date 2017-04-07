<?php
session_start();
//var_dump($_SESSION);
//var_dump($_POST);
//echo "<br>";
if(!isset($_SESSION['strColourBg'])) 
   $_SESSION['strColourBg'] = "red" ;
else 
   echo "Currently Bg set to " . $_SESSION['strColourBg'] . "<br>";
   
if(!isset($_SESSION['strColourFg'])) 
   $_SESSION['strColourFg'] = "yellow";
else 
   echo "Currently Fg set to " . $_SESSION['strColourFg'];

if(isset($_POST["submit"]) ) {
   $strColourBg = $_POST["strNewBg"];
   $strColourFg = $_POST["strNewFg"];
   $_SESSION['strColourBg'] = $strColourBg;
   $_SESSION['strColourFg'] = $strColourFg;
   echo " <br>New Settings ";
}
else {
   $strColourBg = $_SESSION['strColourBg'];
   $strColourFg = $_SESSION['strColourFg'];
   echo " <br>Keep old settings ";
}
?>
<head> 
<style type="text/css">
   body {background-color: <?php echo $strColourBg ?>}
   p {color: <?php echo $strColourFg?>}
   h2 {color: <?php echo $strColourFg?>}
</style>
</head>

<body>
<h2>h2 colour</h2>
<form action = '<?php echo $_SERVER["PHP_SELF"] ?>' method='post'>
  <label for= "strNewBg"> Background colour: </label>
    <select name='strNewBg' id='strNewBg'>
        <option>red</option> ... <option>grey</option>
    </select>
  <label for="strNewFg"> Text colour: </label>
    <select name='strNewFg' id='strNewFg'>
        <option>yellow</option> ... <option>grey</option>
    </select>
  <input type='submit' name='submit'/>
</form>
</body>

<?php
/*foreach ($_SESSION as $key=>$val) {
	      print $key . "=>" . $val . "<br/>";
		  } */
		  
?>