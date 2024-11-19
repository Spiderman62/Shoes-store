<?php
	require_once "../connect_database.php";
	session_start();
	$account = $_SESSION['account'];
	$account_detail = "SELECT * FROM users WHERE account = '$account'";
	$user_ID = $connect->query($account_detail);
	if(mysqli_num_rows($user_ID) > 0){
		$row = mysqli_fetch_array($user_ID);
		$get_user_ID = $row['ID'];
		$product_ID = $_GET['product_ID'];
		$sql = "DELETE FROM carts WHERE product_ID = '$product_ID' AND user_ID = '$get_user_ID'";
		$connect->query($sql);
		header('location: ../../controller/index.php?role=user&route=cart');
	}
?>