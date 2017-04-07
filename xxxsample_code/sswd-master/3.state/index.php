<?php
session_start();

if (isset($_GET['session'])) {
	session_destroy();
	session_start();
}

include('db/config.php');
include('inc/header.php');
include('inc/nav.php');
?>	

	
<main>
	<h1>Voting</h1>

	<?php
	$vote = "";
	$name = "";


	// get or saving the name of the user
	if (isset($_GET['name'])) 
		$_SESSION['name'] = $_GET['name'];
	else
	    {
	    if (isset($_SESSION['name'])) {
		    $name = $_SESSION['name'];
			}
		}


	// recording the users vote
	if (isset($_GET['vote'])) {
		$vote = $_GET['vote'];

		$sql = "INSERT INTO votes (created_at, name, vote) VALUES (NOW(), '$name', '$vote')";

		$conn->query($sql);
	}
	?>

	<form action="index.php">
		<input type="submit" name="vote" value="Red" class="red"/>
		<input type="submit" name="vote" value="Blue" class="blue"/>

		<?php if (isset($_SESSION['name'])) { ?>

			<h2>Name: <?php echo $_SESSION['name']; ?></h2>
			<p>Session ID: <?php echo session_id(); ?></p>
			<p>IP Address: <?php echo gethostbyname(getenv('SERVER_NAME')); ?></p>

		<?php }	else { ?>
			
			<label for="name">Please enter your name:</label>
			<input type="text" name="name" value="" id="name"/>

		<?php }	?>
	</form>


	
	<?php
	// displays the stats
	function getCount($sql) {
		global $conn;
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) 
    		return $row["ccc"];    			
	}
	?>

	<dl>
		<dd>Total Red</dd><dt><?php echo getCount('SELECT COUNT(*) AS ccc FROM votes WHERE vote = "Red"'); ?></dt>
		<dd>Total Blue</dd><dt><?php echo getCount('SELECT COUNT(*) AS ccc FROM votes WHERE vote = "Blue"'); ?></dt>
		<dd>My Red</dd><dt><?php echo getCount('SELECT COUNT(*) AS ccc FROM votes WHERE vote = "Red" AND name = "'.$name.'"'); ?></dt>
		<dd>My Blue</dd><dt><?php echo getCount('SELECT COUNT(*) AS ccc FROM votes WHERE vote = "Blue" AND name = "'.$name.'"'); ?></dt>
	</dl>
</main>	


<?php

include('inc/footer.php');

?>				

