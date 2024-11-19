<?php
require_once "../model/connect_database.php";
$error_element_user = "";
$error_element_user_detail = "";
$error_element_order_detail = "";
if (isset($_POST['filter'])) {
	$QUERY_GET_DATA_ORDER_DETAIL = "SELECT order_detail.ID as ID,
	order_detail.product_ID as product_ID,
	order_detail.note as note,
	order_detail.quantity as quantity,
	order_detail.user_detail_ID as user_detail_ID,
	order_detail.status as status,
	users.account as account_user from order_detail 
	join user_detail on order_detail.user_detail_ID = user_detail.ID 
	join users on user_detail.user_ID = users.ID";
	$account = $_POST['search_account'];
	$select_box = $_POST['select_box'];
	if (!empty($account)) {
		$SQL_user_ID = "SELECT ID FROM users WHERE account = '$account'";
		$is_user_ID = $connect->query($SQL_user_ID);
		if (mysqli_num_rows($is_user_ID) > 0) {
			$user_ID = mysqli_fetch_assoc($is_user_ID)['ID'];
			$SQL_user_detail_ID = "SELECT ID FROM user_detail WHERE user_ID = $user_ID";
			$is_user_detail_ID = $connect->query($SQL_user_detail_ID);
			if (mysqli_num_rows($is_user_detail_ID) > 0) {
				$user_detail_ID = mysqli_fetch_assoc($is_user_detail_ID)['ID'];
				$SQL_order_detail_ID = "SELECT * FROM order_detail WHERE user_detail_ID = $user_detail_ID";
				$is_order_detail_ID = $connect->query($SQL_order_detail_ID);
				if (mysqli_num_rows($is_order_detail_ID) > 0) {
					$QUERY_GET_DATA_ORDER_DETAIL .= " WHERE order_detail.user_detail_ID = $user_detail_ID";
				} else {
					$error_element_order_detail = "This account has not purchases yet!";
				}
			} else {
				$error_element_user_detail = "The user has not provided detailed information!";
			}
		} else {
			$error_element_user = "The account doesn't exist!";
		}
	};

	if (!empty($select_box)) {
		if (!strpos($QUERY_GET_DATA_ORDER_DETAIL, 'WHERE') == false) {
			$QUERY_GET_DATA_ORDER_DETAIL .= " AND order_detail.status = '$select_box'";
		} else {
			$QUERY_GET_DATA_ORDER_DETAIL .= " WHERE order_detail.status = '$select_box'";
		}
	}
	$GET_DATA_ORDER_DETAIL = $connect->query($QUERY_GET_DATA_ORDER_DETAIL);
} else {
	$QUERY_GET_DATA_ORDER_DETAIL = "SELECT order_detail.ID as ID,
	order_detail.product_ID as product_ID,
	order_detail.note as note,
	order_detail.quantity as quantity,
	order_detail.user_detail_ID as user_detail_ID,
	order_detail.status as status,
	users.account as account_user from order_detail 
	join user_detail on order_detail.user_detail_ID = user_detail.ID 
	join users on user_detail.user_ID = users.ID";
	$GET_DATA_ORDER_DETAIL = $connect->query($QUERY_GET_DATA_ORDER_DETAIL);
}
?>
<style>
	header .nav_admin{
		font-size: 1.5rem;
	}
</style>
<?php
	includeCss("../asset/css/adminstrators_order_manager.css");
?>
		<h1>Quản lý đơn hàng của khách hàng</h1>
		<div class="wrapper_search">
			<form action="../controller/index.php?role=admin&route=adminstrators_order_manager" method="post">
				<input type="text" name="search_account" placeholder="Search account and enter right here">
				<div class="wrapper_option">
					<select class="select-box" name="select_box" id="">
						<option value=""></option>
						<option value="Chờ xử lý">Chờ xử lý</option>
						<option value="Chờ lấy hàng">Chờ lấy hàng</option>
						<option value="Đang đi lấy">Đang đi lấy</option>
						<option value="Đang giao hàng">Đang giao hàng</option>
						<option value="Đã huỷ đơn hàng">Đã huỷ đơn hàng</option>
					</select>
					<div class="icon-container">
						<i class="fa-solid fa-caret-down"></i>
					</div>
				</div>
				<input type="submit" name="filter" value="filter" hidden>
			</form>
		</div>
		<div class="wrapper">
			<div class="wrapper_show">
				<p>ID</p>
				<p>Product ID</p>
				<p>Note</p>
				<p>Quantity</p>
				<p>User detail ID</p>
				<p>Status</p>
				<p>Account</p>
			</div>
			<div class="container">
				<?php
				if ($error_element_user) {
				?>
					<h1 class="error_element_user"><?php echo $error_element_user; ?></h1>
				<?php

				} else if ($error_element_user_detail) {

				?>
					<h1 class="error_element_user_detail"><?php echo $error_element_user_detail; ?></h1>
				<?php
				} else if ($error_element_order_detail) {

				?>
					<h1 class="error_element_order_detail"><?php echo $error_element_order_detail; ?></h1>
					<?php
				} else if (mysqli_num_rows($GET_DATA_ORDER_DETAIL) > 0) {
					for ($i = 0; $i < mysqli_num_rows($GET_DATA_ORDER_DETAIL); $i++) {
						$row = mysqli_fetch_assoc($GET_DATA_ORDER_DETAIL);
						$ID = $row['ID'];
						$product_ID = $row['product_ID'];
						$note = $row['note'];
						$quantity = $row['quantity'];
						$user_detail_ID = $row['user_detail_ID'];
						$status = $row['status'];
						$account_user = $row['account_user'];
					?>
						<div class="wrapper_render">
							<p><?php echo $ID; ?></p>
							<p><?php echo $product_ID; ?></p>
							<p><?php echo $note; ?></p>
							<p>SL: <?php echo $quantity; ?></p>
							<p><?php echo $user_detail_ID; ?></p>
							<p><?php echo $status; ?></p>
							<p><?php echo $account_user; ?></p>
							<a href="../controller/index.php?role=admin&route=administrators_update_order&ID=<?php echo $ID; ?>">Cập nhật</a>
							<a href="../model/admin/order/handle_send_email_order_detail.php?ID=<?php echo $ID; ?>">Send</a>
						</div>
				<?php }
				} ?>
			</div>
		</div>
	</main>
</body>

</html>