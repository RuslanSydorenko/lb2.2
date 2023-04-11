<?php
	require "connect.php";
	// Поиск всех возможных уникальных производителей
	$vendors = $collection->distinct('vendor');  	
	echo '<table border = "1">';
	foreach($vendors as $ven) {
		echo '<tr><td>'.$ven.'</td></tr>';
	}
	echo '</table><br>';	
?>