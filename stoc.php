<?php

	$id = $_POST["id"];
	$distance = $_POST["distance"];

	require("function.php");

	$beforedist = getdist($id);
	$totaldist = $beforedist + $distance;

	$res = updatedist($id,$totaldist,$beforedist);

 	echo $res;

?>

Hv6NwhYT
