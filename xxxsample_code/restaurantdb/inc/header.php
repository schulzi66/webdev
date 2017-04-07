<?php
include("head.php");
include("./db/config.php");
?>




<header>
	
	<h1>The Apple Tree</h1>
	<div class="hour">
	<div id="clockdiv"></div>
	<script>
		function clock()
		{
		Today = new Date();
		Today.setHours(Today.getHours()+2);
		Heure=Today.toGMTString();
		Heure=Heure.substr(16,9);
		document.getElementById("clockdiv").innerHTML=Heure;
		}
		
		setInterval("clock()",1000);
	</script>
	</div>
	
	<nav>
		<ul>
		
			<li><a href="index.php">home</a></li>
			<li><a href="menu.php">menu</a></li>
			<li><a href="contact.php">contact</a></li>
			
		
			<?php 
			$sql = "SELECT * FROM pages WHERE id > 3";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc())
			{					
			?>
		
			<li><a href="new_page.php?id=<?php echo $row['id']; ?>"><?php echo $row['page']; ?></a></li>
			
			<?php 
			}
			?>
			
		</ul>		
	</nav>

</header>

<body>