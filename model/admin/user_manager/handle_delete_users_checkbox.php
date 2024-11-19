<?php
require_once "../../connect_database.php";
if(isset($_POST['checkbox_array'])){
	$checkbox_array = $_POST['checkbox_array'];
	for ($i = 0; $i < count($checkbox_array); $i++) {
		$ID = $checkbox_array[$i];
		$delete_cart_user = "DELETE FROM carts WHERE user_ID = $ID";
		$connect->query($delete_cart_user);
		$delete_order_detail = "DELETE FROM order_detail where user_detail_ID = (select ID from user_detail where user_ID = $ID)";
		$connect->query($delete_order_detail);
		$delete_user_detail = "DELETE FROM user_detail WHERE user_ID = $ID";
		$connect->query($delete_user_detail);
		$delete_comment = "DELETE FROM comments WHERE user_ID = $ID";
		$connect->query($delete_comment);
		$sql = "DELETE FROM users WHERE ID = $ID";
		$connect->query($sql);
		// Lưu ý: Đa phần các dữ liệu nó sẽ lấy ID của users làm khoá ngoại thế nên
		// Khi xoá thì hệ quản trị cơ sở dữ liệu không cho phép xoá những dữ liệu kế thừa từ
		// Parent row, thế nên chúng ta phải xoá những dữ liệu bắt đầu từ children row foreign key
		// Sau đó thì parent row.
	}
	header('location: ../../../controller/index.php?role=admin&route=administrators');
}else{
	header('location: ../../../controller/index.php?role=admin&route=administrators');
}

