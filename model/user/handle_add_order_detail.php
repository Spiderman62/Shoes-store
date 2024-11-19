<?php 
	require_once "../connect_database.php";
	session_start();
	$account = $_SESSION['account'];
	$SQL_user_ID = "SELECT * FROM users WHERE account = '$account'";
	$user_ID = mysqli_fetch_assoc($connect->query($SQL_user_ID))['ID'];
	$SQL_user_detail_ID = "SELECT * FROM user_detail WHERE user_ID = $user_ID";
	$user_detail_ID = mysqli_fetch_assoc($connect->query($SQL_user_detail_ID))['ID'];
	if(isset($_POST['btn_area_buy'])){
		$product_ID_array = $_POST['product_ID_buy'];
		$note_array = $_POST['note'];
		$quantity_array = $_POST['quantity'];
		for($i = 0;$i < count($product_ID_array);$i++){
			$product_ID = $product_ID_array[$i];
			$note = $note_array[$i];
			$quantity = $quantity_array[$i];
			$SQL = "INSERT INTO order_detail(product_ID,note,quantity,user_detail_ID,status)
			VALUES('$product_ID','$note','$quantity','$user_detail_ID','Chờ xử lý');
			";
			$connect->query($SQL);
			
			header('location: ../../controller/index.php?role=user&route=order');
		};
		
	}

?>