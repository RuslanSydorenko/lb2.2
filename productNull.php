<?php
	require "connect.php";
	// Количество товаров = 0
	$product = $collection->find(['quantity'=>['$eq'=>0]]);
	echo '<table border = "1">';
	echo '<tr>
			<th>Type</th>
			<th>Name</th>
			<th>Price</th>
			<th>Vendor</th>
		</tr>';
	foreach($product as $val) {
		echo '<tr>
			<td>'.$val['type'].'</td>
			<td>'.$val['name'].'</td>
			<td>'.$val['price'].'</td>
			<td>'.$val['vendor'].'</td>
		</tr>';
	}
	echo '</table><br>';
?>