<?php     
$labels = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
$series = array();
for ($i=0; $i<5; $i++)
	$series[] = rand(1,100);

header('Content-Type: application/json');
echo json_encode(array('labels' => $labels, 'series' => array($series)));
?>
