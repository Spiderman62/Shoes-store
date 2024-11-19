<?php
	require_once "../model/connect_database.php";
	$query = "SELECT order_detail.status as status,count(status) as quantity FROM order_detail GROUP BY status";
	$array = [];
	$getStatus = $connect->query($query);
	for($i = 0;$i< mysqli_num_rows($getStatus);$i++){
		$array[] = mysqli_fetch_assoc($getStatus); 
	};
	header('Content-Type: application/json');
	echo json_encode($array);
	$connect->close();
?>