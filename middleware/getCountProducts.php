<?php
	require_once "../model/connect_database.php";
	$query = "SELECT * FROM products ORDER BY views DESC LIMIT 10";
	$array = [];
	$getTop10 = $connect->query($query);
	for($i = 0;$i< mysqli_num_rows($getTop10);$i++){
		$array[] = mysqli_fetch_assoc($getTop10); 
	};
	header('Content-Type: application/json');
	echo json_encode($array);
	$connect->close();
?>