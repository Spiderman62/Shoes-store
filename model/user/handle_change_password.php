<?php
session_start();
require_once "../connect_database.php";
$account = $_SESSION['account'];
if (isset($_POST['submit'])) {
	$currentPassword = $_POST['currentPassword'];
	$newPassword = $_POST['newPassword'];
	$query_current_password = "SELECT * FROM users WHERE user_password = '$currentPassword' AND account = '$account'";
	$get_current_password = $connect->query($query_current_password);
	$ID = mysqli_fetch_assoc($get_current_password)['ID'];
	if(mysqli_num_rows($get_current_password) > 0){
		$query_update = "UPDATE users SET user_password = '$newPassword' WHERE ID = '$ID'";
		$connect->query($query_update);
		header('location: ../../controller/index.php?role=user&route=change_password_user&type=success');
	}else{
		header('location: ../../controller/index.php?role=user&route=change_password_user&type=not_found');
	};
};
?>