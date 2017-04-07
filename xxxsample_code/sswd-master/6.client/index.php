<?php
include('inc/header.php');
include('inc/nav.php');
?>

<main>
	<h1>Title</h1>
	<button type="button">Toggle</button>

	<figure>
		<img src="./graphics/france.jpg"/>
		<figcaption>FRANCE - WALES</figcaption>
	</figure>
	
	

	<?php for ($i=0; $i <10 ; $i++) { ?>
		<section id="<?php echo "anchor".$i; ?>">
			<h2>Anchor #<?php echo $i; ?></h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at ante viverra, commodo arcu nec, ultricies lacus. Donec et accumsan magna. Aliquam placerat mauris nec velit aliquet, non tempor risus mattis. Cras egestas vestibulum luctus. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque in vulputate tortor. Proin convallis, mi nec faucibus ullamcorper, velit enim gravida ex, vel gravida ex elit nec leo. </p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at ante viverra, commodo arcu nec, ultricies lacus. Donec et accumsan magna. Aliquam placerat mauris nec velit aliquet, non tempor risus mattis. Cras egestas vestibulum luctus. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque in vulputate tortor. Proin convallis, mi nec faucibus ullamcorper, velit enim gravida ex, vel gravida ex elit nec leo. </p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at ante viverra, commodo arcu nec, ultricies lacus. Donec et accumsan magna. Aliquam placerat mauris nec velit aliquet, non tempor risus mattis. Cras egestas vestibulum luctus. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque in vulputate tortor. Proin convallis, mi nec faucibus ullamcorper, velit enim gravida ex, vel gravida ex elit nec leo. </p>
		</section>
	<?php } ?>
</main>

<?php
include('inc/footer.php');
?>