<?php
	require_once "../model/connect_database.php";
	$array = [];
	$queryGetMaxMinProducts = "SELECT categories.name_category as name,
	max(products.price) as max,
	min(products.price) as min FROM products
	INNER JOIN categories ON categories.ID = products.category_ID
	GROUP BY products.category_ID";
	$getMaxMinProducts = $connect->query($queryGetMaxMinProducts);
	for($i = 0;$i< mysqli_num_rows($getMaxMinProducts);$i++){
		$array[] = mysqli_fetch_assoc($getMaxMinProducts);
	};
	header('Content-Type: application/json');
	echo json_encode($array);
?>