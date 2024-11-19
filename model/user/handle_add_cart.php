<?php
    require_once "../connect_database.php";
	$user_account = $_GET['user_account'];
	$product_ID = $_GET['product_ID'];
	$sql_user = "SELECT ID FROM users WHERE account = '$user_account'";
	$get_user_ID = $connect->query($sql_user);
	$user_ID = mysqli_fetch_array($get_user_ID)['ID'];

	$sql = "SELECT * FROM carts WHERE product_ID = '$product_ID' AND user_ID = $user_ID";
	$get_dulicate = $connect->query($sql);
	if(mysqli_num_rows($get_dulicate) > 0){
		$row = mysqli_fetch_array($get_dulicate);
		$quantity = $row['quantity'];
		$action = "UPDATE carts SET quantity = ($quantity + 1) WHERE product_ID = '$product_ID' AND user_ID = $user_ID;";
		$connect->query($action);
		header('location: ../../controller/index.php?role=user&route=cart');
	}else{
		$sql = "INSERT INTO carts(user_ID,product_ID,quantity)
		VALUES('$user_ID','$product_ID','1');
		";
		$connect->query($sql);
		header('location: ../../controller/index.php?role=user&route=cart');
	}
?>