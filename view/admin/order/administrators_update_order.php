<?php
$ID = $_GET['ID'];
require_once "../model/connect_database.php";
$SQL = "SELECT * FROM order_detail WHERE ID = $ID";
$get_data = mysqli_fetch_assoc($connect->query($SQL));
$ID = $get_data['ID'];
$product_ID = $get_data['product_ID'];
$quantity = $get_data['quantity'];
$user_detail_ID = $get_data['user_detail_ID'];
$note = $get_data['note'];
$status = $get_data['status'];
?>
<style>
	header{
		display: none;
	}
</style>
<?php
	includeCss("../asset/css/administrators_update_order.css");
?>
		<div class="wrapper">
			<a href="../controller/index.php?role=admin&route=adminstrators_order_manager">Quay lại</a>
			<h1>Update order</h1>
			<form action="../model/admin/order/handle_update_order_detail.php" method="post">
				<input name="ID" value="<?php echo $ID;?>" type="text" hidden>
				<div class="input-box">
					<label for="">Product ID</label>
					<input name="product_ID" value="<?php echo $product_ID; ?>" type="text" disabled>
				</div>
				<div class="input-box">
					<label for="">Quantity</label>
					<input name="quantity" value="<?php echo $quantity; ?>" type="text" disabled>
				</div>
				<div class="input-box">
					<label for="">User detail ID</label>
					<input name="user_detail_ID" value="<?php echo $user_detail_ID; ?>" type="text" disabled>
				</div>
				<div class="input-box">
					<label for="">Note</label>
					<textarea name="note" id="" cols="54" rows="6" disabled><?php echo $note ?></textarea>
				</div>
				<div class="status">
					<label for="">Status</label>
					<div class="wrapper_select">
						<select name="status" id="">
							<option value="Chờ xử lý" <?php if ($status == "Chờ xử lý") echo " selected"; ?>>Chờ xử lý</option>
							<option value="Chờ lấy hàng" <?php if ($status == "Chờ lấy hàng") echo " selected"; ?>>Chờ lấy hàng</option>
							<option value="Đang đi lấy" <?php if ($status == "Đang đi lấy") echo " selected"; ?>>Đang đi lấy</option>
							<option value="Đang giao hàng" <?php if ($status == "Đang giao hàng") echo " selected"; ?>>Đang giao hàng</option>
							
						</select>
						<div class="icon-select">
							<i class="fa-solid fa-caret-down"></i>
						</div>
					</div>
				</div>
				<input class="submit" type="submit" name="submit" value="Submit">
			</form>
		</div>
	