<?php
	require "vendor/autoload.php"; // Подключение драйвера
	$client = new MongoDB\Client(); // Инициализация БД 
	$collection = $client->dbforlab->product;
?>