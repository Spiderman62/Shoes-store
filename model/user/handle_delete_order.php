<?php
require_once "../connect_database.php";
$ID = $_GET['ID'];
$SQL = "SELECT * FROM order_detail WHERE ID = $ID";
$get_data = $connect->query($SQL);
$row = mysqli_fetch_assoc($get_data);
$status = $row['status'];

if ($status == "Chờ xử lý") {
	$SQL_CANCEL_ORDER = "UPDATE order_detail SET status = 'Đã huỷ đơn hàng' WHERE ID = $ID";
	$connect->query($SQL_CANCEL_ORDER);
	header('location: ../../controller/index.php?role=user&route=order&order_cancel_success=order_cancel_success');

}else if($status == "Đã huỷ đơn hàng"){
	
	header('location: ../../controller/index.php?role=user&route=order&order_cancelled=order_cancelled');
}else {
	
	header('location: ../../controller/index.php?role=user&route=order&can_not_cancel_an_order=can_not_cancel_an_order');
}
?>