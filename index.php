<?php
	require "connect.php";
	session_start();

	// Записываем данные в переменные через глобальный массив SESSION
	$json = json_encode($_SESSION['price']); // Данные БД в JSON фонрмате
	$min = $_SESSION['minprice']; // Минимальная стоимость
	$max = $_SESSION['maxprice']; // Максимальная стоимость
	// Удаляем данные с глобального массив SESSION 
	unset($_SESSION['price']);
	unset($_SESSION['minprice']);
	unset($_SESSION['maxprice']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lb_2_Rus</title>
</head>
<body>
	<div>
		<form action="vendor.php" method="post">
			<input type="submit" name="btn" value="Перелік виробників, з якими працює магазин" style="margin: 10px;">
		</form>
		<form action="productNull.php" method="post">
			<input type="submit" name="btn" value="Товари, відсутні на складі" style="margin: 10px;">
		</form>
		<form action="price.php" method="post">
			<p>Min price:</p>
			<input type="number" min = "0" name="minprice" value="0" id="minprice">
			<p>Мax price:</p>
			<input type="number" min = "0" name="maxprice" value="3000" id="maxprice">
			<input type="submit" name="btn" value="Submit" style="margin: 0 10px;">
			<input type="button" name="btn" value="Local Storage" id="LS">
		</form>
	</div>
	<script type="text/javascript">
		// Передаем минимальную и максимальную стоимость
		let min = '<?php echo $min;?>';
		let max = '<?php echo $max;?>';
		// Использование JS LocalStorage
		let json = JSON.parse('<?php echo $json;?>'); // Передаем в переменную БД из JSON в массив
		let elMin = document.getElementById('minprice');
		let elMax = document.getElementById('maxprice');
		let ls = document.getElementById('LS');

		// Записываем в LocalStorage объект с ключем из конкатенации min и max 
		localStorage.setItem((String(min) + String(max)), JSON.stringify(json));

		ls.addEventListener("click", function() {
			// Формируем ключ из полей мин. и макс. стоимости
			let key = String(elMin.value) + String(elMax.value);
			if (!localStorage.getItem(key)) {
				alert("Дані відсутні!");
			} else {
				let mes = "";
				if (localStorage.getItem(key) == "[]") mes = "Товар відсутній!";
				// Массив с данными о товаре
				let arr = JSON.parse(localStorage.getItem(key));
				for (var i = 0; i < arr.length; i++) {
					// Дописываем в переменную каждый рядок и выводим в alert
					mes +=  'Type: ' + arr[i]['type'] + "\n" + 
							'Name: ' + arr[i]['name'] + "\n" + 
							'Price: ' + arr[i]['price'] + "\n" + 
							'Vendor: ' + arr[i]['vendor'] + "\n\n";
				}
				alert(mes);
			}
			for(let i=0; i<localStorage.length; i++) {
				let key = localStorage.key(i);
				console.log(`${key}: ${localStorage.getItem(key)}`);
			}
			//localStorage.clear();
		});
	</script>
</body>
</html>