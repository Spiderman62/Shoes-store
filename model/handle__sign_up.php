<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "./connect_database.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$account = $_POST['account_name__sign_up'];
	$query = "SELECT account FROM users WHERE account = '$account'";
	$account_unique = $connect->query($query);
	if (mysqli_num_rows($account_unique) > 0) {
		header('location: ../controller/index.php?account_exist=account_exist');
	} else {
		$user_email = $_POST['email__sign_up'];
		$query = "SELECT user_email FROM users WHERE user_email = '$user_email'";
		$email_unique = $connect->query($query);
		if (mysqli_num_rows($email_unique) > 0) {
			header('location: ../controller/index.php?email_exist=email_exist');
		} else {
			$account = $_POST['account_name__sign_up'];
			$user_name = $_POST['username__sign_up'];
			$user_email = $_POST['email__sign_up'];
			$user_password  = $_POST['password__sign_up'];
			$role__sign_up = "user";
			$status__sign_up = 1;
			$date = date('Y-m-d H:i:s');
			$image = $_FILES['image'];
			$image_name = $image['name'];
			$tmp_image = $image['tmp_name'];
			move_uploaded_file($tmp_image, "../asset/tmp_image" . "/$image_name");
			$query = "INSERT INTO users(account,user_name,user_email,user_password,role,status,create_date,image)
			VALUES('$account','$user_name','$user_email','$user_password','$role__sign_up','$status__sign_up','$date','$image_name');
			";
			$connect->query($query);

			sleep(1);

			header('location: ../controller/index.php');
		}
	}
}
