<?php
if (!isset($_SESSION['account'])) {
	header('location: ../controller/index.php');
}
if(isset($_GET['order_cancel_success'])){
	echo "<script>alert('Đơn hàng huỷ thành công!')</script>";
}
if(isset($_GET['order_cancelled'])){
	echo "<script>alert('Đơn hàng đã bị huỷ rồi!')</script>";
}
if(isset($_GET['can_not_cancel_an_order'])){
	echo "<script>alert('Không thể huỷ đơn hàng vì đang được vận chuyển hoặc đang xử lý')</script>";
}
includeCss("../asset/css/order.css");
?>

	<main>
		
		<?php

		$account = $_SESSION['account'];
		$SQL_USER_ID = "SELECT * FROM users WHERE account = '$account'";
		$user_ID = mysqli_fetch_assoc($connect->query($SQL_USER_ID))['ID'];
		$SQL_USER_DETAIL = "SELECT * FROM user_detail WHERE user_ID = $user_ID";
		$query_user_detail = $connect->query($SQL_USER_DETAIL);
		if (mysqli_num_rows($query_user_detail) > 0) {

		?>
			<div class="your_order">
				<h1 class="title">Đơn hàng của bạn</h1>

				<?php
				$row_user_detail = mysqli_fetch_assoc($query_user_detail);
				$user_detail = $row_user_detail['ID'];
				$SQL_ORDER_DETAIL = "SELECT * FROM order_detail WHERE user_detail_ID = $user_detail";
				$get_data_order_detail = $connect->query($SQL_ORDER_DETAIL);
				if (mysqli_num_rows($get_data_order_detail) > 0) {
					for ($i = 0; $i < mysqli_num_rows($get_data_order_detail); $i++) {
						$row = mysqli_fetch_assoc($get_data_order_detail);
						$ID = $row['ID'];
						$product_ID = $row['product_ID'];
						$note = $row['note'];
						$quantity = $row['quantity'];
						$user_detail_ID = $row['user_detail_ID'];
						$status = $row['status'];

						$SQL_PRODUCT_ID = "SELECT * FROM products INNER JOIN categories ON categories.ID = products.category_ID WHERE products.ID = '$product_ID'";
						$row_product = mysqli_fetch_assoc($connect->query($SQL_PRODUCT_ID));
						$product_ID = $row_product['ID'];
						$product_name = $row_product['product_name'];
						$image = $row_product['image'];
						$price = $row_product['price'];
						$name_category = $row_product['name_category'];

				?>
						<div class="wrapper_content">
							<div class="component_render">
								<p class="status"><?php echo $status ?></p>
								<div class="wrapper_data">
									<div class="wrapper_image">
										<img src="../asset/image_products/<?php echo $image; ?>" alt="">
									</div>
									<div class="content">
										<p class="title"><?php echo $product_name; ?></p>
										<p class="category">Danh mục: <?php echo $name_category ?></p>
										<p class="quantity">Số lượng: <?php echo $quantity ?></p>
									</div>
									<div class="price"><?php echo number_format($price); ?> vnd</div>
								</div>
								<div class="line"></div>
								<p class="money_to_pay">Số tiền phải trả: <span><?php echo number_format($price); ?> vnd</span></p>
								<div class="warpper_button">
									<a href="../controller/index.php?role=user&route=delete_order&ID=<?php echo $ID;?>">Huỷ đơn hàng</a>
								</div>
							</div>
						</div>
						<?php }?>
						</div>
						<?php
						} else {
						?>
				 
		<div class="your_order">
			<h1 class="title">Bạn chưa đặt đơn hàng nào</h1>
		</div>
	<?php }
			} else { ?>
	<main class="main_wrapper_address">
		<main class="wrapper_address">
			<h1>Trước khi đặt hàng chúng tôi phát hiện bạn chưa điền đủ thông tin, vui lòng nhập thông tin ở dưới để xác nhận rằng đơn hàng sẽ giao tới đúng chỗ</h1>
			<form class="infor-address" action="../model/user/handle_add_user_detail.php" method="post">
				<div class="input-box">
					<label for="username">Username: </label>
					<input name="username" id="username" type="text">
					<p class="error_message"></p>
				</div>
				<div class="input-box">
					<label for="address">Address: </label>
					<input name="address" id="address" type="text">
					<p class="error_message"></p>
				</div>
				<div class="input-box">
					<label for="number_phone">Number phone: </label>
					<input name="number_phone" id="number_phone" type="text">
					<p class="error_message"></p>
				</div>
				<input type="submit" name="submit_user_detail" value="submit">
			</form>
		</main>
	</main>
<?php } ?>
</main>
