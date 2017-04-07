<?php
session_start();

include('inc/header.php');
include('inc/nav.php');
include('inc/products.php');
include('inc/shopping.php');
?>


<main>
	<h1>Griffith Supermarket</h1>

	<table>
		<caption>Products</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Price</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			<?php
			foreach ($products as $item) {
				echo '<tr>';
				echo '<td>'.$item['id'].'</td>';
				echo '<td>'.$item['title'].'</td>';
				echo '<td>'.$item['price'].'</td>';
				echo '<td><a href="controller.php?id='.$item['id'].'">Add</a></td>';
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
	

	<?php if (count($shopping)>0) { ?>
		<hr/>
		<table>
			<caption>My Shopping</caption>
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Sub Total</th>
				</tr>
			</thead>

			<tbody>
				<?php
				function getProduct($id) {
					global $products;

					foreach ($products as $p) {
						if ($p['id']==$id)
							return $p;
					}
				}

				foreach ($shopping as $id => $quantity) {
					$p = getProduct($id);
					$s = $quantity*$p['price'];

					echo '<tr>';
					echo '<td>'.$id.'</td>';
					echo '<td>'.$p['title'].'</td>';
					echo '<td>'.$p['price'].'</td>';
					echo '<td>'.$quantity.'</td>';
					echo '<td>'.$s.'</td>';
					echo '</tr>';
				}
				
				echo "<br>";
				var_dump($_SESSION);
				?>
			</tbody>
		</table>
	<?php } ?>
</main>	




<?php
include('inc/footer.php');
?>