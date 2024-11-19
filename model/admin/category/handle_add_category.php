<?php
require_once "../../connect_database.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');
	$name_category = $_POST['name_category'];
	$user_ID = $_POST['select'];
	$date = date('Y-m-d H:i:s');
	$sql = "INSERT INTO categories(name_category,create_date,user_ID)
	VALUES('$name_category','$date','$user_ID')
	";
	$connect->query($sql);
	header('location: ../../../controller/index.php?role=admin&route=administrators_category_manager');
?>