<?php
session_start();
include("inc/head.php");
include("inc/header.php");
include("db/config.php");
$page = "menu";



$sql = "SELECT * FROM images WHERE page='menu'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo '</br> </br>';
	echo '<image src="images/'.$row["name"].'"></br>';
	echo '<p>'.$row["description"].'</p>';
}






$sql = "SELECT * FROM pages WHERE page='menu'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo '<h1>'.$row["title"].'</h1>';
			echo $row["text"];
		}
	}
	
	
	if (isset($_SESSION['username'])) 
{
	echo '<p><a href="edit.php?page=menu">Edit this page</a></p>';
	
}

?>













<ol class="tree">
	<li>
		<label class="menu_entrees" for="folder1">Starters</label> <input type="checkbox" id="folder1" /> 
		<ol>
			<li>
				
				<?php 
				$sql = "SELECT * FROM dish WHERE type= 'starter'";
				$result = $conn->query($sql);
				while ($row = $result->fetch_assoc())
				{	
					if($row['show_meal']==1) 
					{
				?>
			
			
				<label for="<?php echo $row['id']; ?>"><?php echo $row['title']; ?>    <strong><?php echo $row['price']; ?>€</strong></label> <input type="checkbox" id="<?php echo $row['id']; ?>" /> 
				<ol>
					<li>
						<article>
							<image src="images/<?php echo $row['picture']; ?>" alt="<?php echo $row['id']; ?>"/>
						</article>
		
						<aside>
							<?php echo nl2br($row['description']); ?>
						</aside>
					</li>
				</ol>
				
				<?php 
					}
				}
				?>
				
			</li>
		</ol>
		
		<label class="menu_mains" for="folder2">Mains</label> <input type="checkbox" id="folder2" />
		<ol>
			<li>
			
				<?php 
				$sql = "SELECT * FROM dish WHERE type= 'main'";
				$result = $conn->query($sql);
				while ($row = $result->fetch_assoc())
				{		
					if($row['show_meal']==1) 
					{
				?>
				
			
				<label for="<?php echo $row['id']; ?>"><?php echo $row['title']; ?>    <strong><?php echo $row['price']; ?>€</strong></label> <input type="checkbox" id="<?php echo $row['id']; ?>" /> 
				<ol>
					<li>
						<article>
							<image src="images/<?php echo $row['picture']; ?>" alt="<?php echo $row['id']; ?>"/>
						</article>
		
						<aside>
							<?php echo nl2br($row['description']); ?>
						</aside>
					</li>
				</ol>
				
				<?php 
					}
				}
				?>
				
			</li>
		</ol>
		
		<label class="menu_deserts" for="folder3">Desserts</label> <input type="checkbox" id="folder3" />
		<ol>
			<li>
			
				<?php 
				$sql = "SELECT * FROM dish WHERE type= 'dessert'";
				$result = $conn->query($sql);
				while ($row = $result->fetch_assoc())
				{		
					if($row['show_meal']==1) 
					{
				?>
				
			
				<label for="<?php echo $row['id']; ?>"><?php echo $row['title']; ?>    <strong><?php echo $row['price']; ?>€</strong></label> <input type="checkbox" id="<?php echo $row['id']; ?>" /> 
				<ol>
					<li>
						<article>
							<image src="images/<?php echo $row['picture']; ?>" alt="<?php echo $row['id']; ?>"/>
						</article>
		
						<aside>
							<?php echo nl2br($row['description']); ?>
						</aside>
					</li>
				</ol>
				
				<?php 
					}
				}
				?>
				
			</li>
		</ol>
		
		<label class="menu_cocktails" for="folder4">Appetizers</label> <input type="checkbox" id="folder4" />
		<ol>
			<li>
			
				<?php 
				$sql = "SELECT * FROM dish WHERE type= 'appetizer'";
				$result = $conn->query($sql);
				while ($row = $result->fetch_assoc())
				{		
					if($row['show_meal']==1) 
					{
				?>
				
			
				<label for="<?php echo $row['id']; ?>"><?php echo $row['title']; ?>    <strong><?php echo $row['price']; ?>€</strong></label> <input type="checkbox" id="<?php echo $row['id']; ?>" /> 
				<ol>
					<li>
						<article>
							<image src="images/<?php echo $row['picture']; ?>" alt="<?php echo $row['id']; ?>"/>
						</article>
		
						<aside>
							<?php echo nl2br($row['description']); ?>
						</aside>
					</li>
				</ol>
				
				<?php 
					}
				}
				?>
				
			</li>
		</ol>		
	</li>
</ol>
	
	
<?php





include("inc/footer.php");
?>
