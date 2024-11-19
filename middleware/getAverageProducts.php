<?php
	require_once "../model/connect_database.php";
	$query = "SELECT categories.name_category, ROUND(AVG(products.price),0) as price FROM products INNER JOIN categories ON categories.ID = products.category_ID GROUP BY category_ID";
	$array = [];
	$getAvg = $connect->query($query);
	for($i = 0;$i< mysqli_num_rows($getAvg);$i++){
		$array[] = mysqli_fetch_assoc($getAvg); 
	};
	header('Content-Type: application/json');
	echo json_encode($array);
	$connect->close();
?>