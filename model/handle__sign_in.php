<?php
session_start();
require_once "./connect_database.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$account = $_POST['account_name__sign_in'];
	$password = $_POST['password__sign_in'];
	
	$query = "SELECT * FROM users WHERE account = '$account'";
	$get_data_account = $connect->query($query);
	if(mysqli_num_rows($get_data_account) > 0){
		$query = "SELECT * FROM users WHERE user_password = '$password'";
	    $get_data_password = $connect->query($query);
		if(mysqli_num_rows($get_data_password) > 0){
			$row = mysqli_fetch_array($get_data_account);
			$account = $row['account'];
			$role = $row['role'];
			if($role === "admin"){
				sleep(1);
				$_SESSION['account'] = $account;
				header('location: ../controller/index.php?role=admin');
			}else{
				sleep(1);
				$_SESSION['account'] = $account;
				header('location: ../controller/index.php?role=user');
			}
		}else{
		header('location: ../controller/index.php?error_password=error_password');
		}
	}else{
		header('location: ../controller/index.php?error_not_found=not_found');
	}
}



?>