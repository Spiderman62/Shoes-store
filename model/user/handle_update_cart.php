<?php
require_once "../connect_database.php";

	if (isset($_POST['pay_method'])) {
		if(isset($_POST['checkbox_array'])){
			$checkbox_array = $_POST['checkbox_array'];
			session_start();
			$_SESSION['checkbox_array'] = $checkbox_array;
			header('location: ../../controller/index.php?role=user&route=pay_method');
		}else{
			
			header('location: ../../controller/index.php?role=user&route=cart&dont_have_cart=true');
		}
	} else if (isset($_POST['checkbox_array'])) {
		$quantity = $_POST['quantity'];
		$product_ID = $_POST['product_ID'];
		for ($i = 0; $i < count($product_ID); $i++) {
			$get_quantity = $quantity[$i];
			$get_product_ID = $product_ID[$i];
			$sql = "UPDATE carts SET quantity = '$get_quantity' WHERE product_ID = '$get_product_ID'";
			$connect->query($sql);
			header('location: ../../controller/index.php?role=user&route=cart');
		}
	}

