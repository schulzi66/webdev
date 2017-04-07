	</body>		
	
	<footer>			
		<p> Copyright © 2015  </p>
		
		
		<a href="./admin.php">Admin</a>
		
		
		
		<?php if (isset($_SESSION['username'])) { ?>
		<a href="./controller.php?logout=now">logout</a>
		<?php } ?>
	</footer>
	
</html>