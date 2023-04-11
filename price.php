<?php
	require 'connect.php';
	session_start();


	$min = $_POST['minprice'];
	$max = $_POST['maxprice'];

	// Поиск товаров стоимостью ОТ minPrice ДО maxPrice
	// Условие (price >= min AND price <= max
	$res = $collection->find(['$and'=>[['price'=>['$gte'=>(int)$min]],
		['price'=>['$lte'=>(int)$max]]]]);
	$res = iterator_to_array($res);

	// Передаем значение через глобальный массив SESSION
	$_SESSION['price'] = $res;
	$_SESSION['minprice'] = $min;
	$_SESSION['maxprice'] = $max;

	// Формируем таблицу
	echo '<table border = "1">';
	echo '<captoin><b>Min Price: '.$min.'; Max Price: '.$max.'</b></caption>';
	echo '<tr>
		<th>Type</th>
		<th>Name</th>
		<th>Price</th>
		<th>Vendor</th>
		<th>Quantity</th>
	</tr>';
	for($i = 0; $i < count($res); $i++) {
		echo '<tr>
			<td>'.$res[$i]['type'].'</td>
			<td>'.$res[$i]['name'].'</td>
			<td>'.$res[$i]['price'].'</td>
			<td>'.$res[$i]['vendor'].'</td>
			<td>'.$res[$i]['quantity'].'</td>
		</tr>';
	}
	echo '</table>';

	//header('Location: index.php');
?>