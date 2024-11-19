<?php
	if(isset($_POST['submit_user_detail'])){
		session_start();
		require_once "../connect_database.php";
		$username = $_POST['username'];
		$address = $_POST['address'];
		$number_phone = $_POST['number_phone'];
		$account = $_SESSION['account'];
		$sql_userID = "SELECT * FROM users WHERE account = '$account'";
		$mysqli_user_ID = $connect->query($sql_userID);
		$user_ID = mysqli_fetch_assoc($mysqli_user_ID)['ID'];
		$sql_user_detail = "UPDATE user_detail SET username = '$username',address = '$address',number_phone = '$number_phone' WHERE user_ID = $user_ID";
		$connect->query($sql_user_detail);
		header('location: ../../controller/index.php?role=user&route=pay_method');
	}
?>