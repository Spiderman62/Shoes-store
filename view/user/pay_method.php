<?php
// session_start();
// if (!isset($_SESSION['account'])) {
// 	header('location: ../frontend/index.php?page_layout=sign_in__sign_up&remove_home=remove_home');
// }
includeCss("../asset/css/pay_method.css");
includeCss("../asset/css/loader.css");
?>

	<main>

		

		<?php
		$account = $_SESSION['account'];
		$sql_userID = "SELECT * FROM users WHERE account = '$account'";
		$querySQL = $connect->query($sql_userID);
		$user_ID = mysqli_fetch_array($querySQL)['ID'];
		$query_user_detail = "SELECT * FROM user_detail WHERE user_ID = '$user_ID'";
		$get_user_detail = $connect->query($query_user_detail);
		if(mysqli_num_rows($get_user_detail) > 0){
			$row = mysqli_fetch_assoc($get_user_detail);
			$ID = $row['ID'];
			$username = $row['username'];
			$address = $row['address'];
			$number_phone = $row['number_phone'];
		?>
		<form action="../model/user/handle_add_order_detail.php" method="post" class="pay_method">
			<div class="content">
				<div class="delivery_method">
					<h1>Chọn hình thức giao hàng</h1>
					<div class="economical_delivery">
						<input type="radio" checked>
						<label for="">Giao tiết kiệm</label>
						<div class="arrow"></div>
					</div>
					<?php
					$account = $_SESSION['account'];
					$sql_userID = "SELECT * FROM users WHERE account = '$account'";
					$querySQL = $connect->query($sql_userID);
					$user_ID = mysqli_fetch_array($querySQL)['ID'];

					$checkbox_array = $_SESSION['checkbox_array'];
					$accumlator = 0;
					for ($i = 0; $i < count($checkbox_array); $i++) {
						$product_ID = $checkbox_array[$i];
						$sql = "SELECT * FROM products INNER JOIN carts ON products.ID = carts.product_ID WHERE products.ID = '$product_ID' AND carts.user_ID = $user_ID";
						$get_data_product = $connect->query($sql);
						$row = mysqli_fetch_array($get_data_product);
						$ID = $row['ID'];
						$product_ID_buy = $row['product_ID'];
						$products_name = $row['product_name'];
						$image = $row['image'];
						$price = $row['price'];
						$quantity = $row['quantity'];
						$accumlator += $price * $quantity;
					?>
						<div class="component_render">
							<div class="wrapper_content">
								<div class="wrapper_image">
									<img src="../asset/image_products/<?php echo $image; ?>" alt="">
								</div>
								<div class="wrapper_title">
									<input type="text" name="product_ID_buy[]" value="<?php echo $product_ID_buy?>" hidden>
									<input type="text" name="quantity[]" value="<?php echo $quantity?>" hidden>
									<p class="icon"><span><i class="fa-solid fa-circle-check"></i></span>Chính hãng</p>
									<p class="title"><?php echo $products_name ?></p>
									<p class="deliver_to"><span><i class="fa-solid fa-box"></i></span>Giao tới thứ 4 - 09/04</p>
								</div>
							</div>
							<p class="price"><?php echo number_format($price) ?></p>
							<p class="quantity">SL: <?php echo $quantity; ?></p>
							<p class="ammount"><?php echo number_format($price * $quantity)?></p>

							<div class="note">
								<label for="">Ghi chú về sản phẩm trên: </label>
								<input name="note[]" type="text">
							</div>
						</div>
					<?php } ?>
					<div class="sale">
						<p>Shop khuyến mãi<span>Nhập hoặc chọn mãi<i class="fa-solid fa-chevron-right"></i></span></p>
					</div>
				</div>
				<!-- <div class="payment_method">
					<h1>Chọn hình thức thanh toán</h1>
					<div class="input-box">
						<input id="type_0" type="radio" name="radio" value="money" checked>
						<div class="wrapper_image">
							<img src="./asset/imgs/thanh_toan_tien_mat.png" alt="">
						</div>
						<label for="type_0">Thanh toán tiền mặt khi nhận hàng</label>
					</div>
					<div class="input-box">
						<input id="type_1" type="radio" name="radio" value="Viettel_moblie">
						<div class="wrapper_image">
							<img src="./asset/imgs/viettel_mobile.png" alt="">
						</div>
						<label for="type_1">Thanh toán bằng ví Viettel Money</label>
					</div>
					<div class="input-box">
						<input id="type_2" type="radio" name="radio" value="MoMo">
						<div class="wrapper_image">
							<img src="./asset/imgs/MoMo.jpg" alt="">
						</div>
						<label for="type_2">Thanh toán bằng ví MoMo</label>
					</div>
					<div class="input-box">
						<input id="type_3" type="radio" name="radio" value="Zalo_pay">
						<div class="wrapper_image">
							<img src="./asset//imgs/zalo_pay.png" alt="">
						</div>
						<label for="type_3">Thanh toán bằng ví ZaloPay</label>
					</div>
					<div class="input-box">
						<input id="type_4" type="radio" name="radio" value="VNPAY">
						<div class="wrapper_image">
							<img src="./asset/imgs/VN_pay.png" alt="">
						</div>
						<label for="type_4">Thanh toán bằng VNPAY</label>
					</div>
					<div class="input-box">
						<input id="type_5" type="radio" name="radio" value="VISA">
						<div class="wrapper_image">
							<img src="./asset/imgs/national_pay.png" alt="">
						</div>
						<label for="type_5">Thanh toán bằng thẻ quốc tế Visa, Master, JCB</label>
					</div>
					<button><span><i class="fa-solid fa-plus"></i></span> Thêm thẻ mới</button>
					<div class="input-box">
						<input id="type_6" type="radio" name="radio" value="VISA">
						<div class="wrapper_image">
							<img src="./asset/imgs/ATM_noi_dia.png" alt="">
						</div>
						<label for="type_6">Thẻ ATM nội địa/Internet Banking (Hỗ trợ Internet Banking)</label>
					</div>
				</div> -->
			</div>

			<aside>
				<div class="mb-15 delivery--to">
					<div class="delivery_to">
						<p class="title">Giao tới</p>
						<a href="../controller/index.php?role=user&route=update_user_detail&ID=<?php echo $user_ID;?>" class="change">Thay đổi</a>
					</div>
					<div class="name-phone">
						<p class="name"><?php echo $username?></p>
						<p class="phone"><?php echo $number_phone?></p>
					</div>
					<p class="address"><span>Nhà</span><?php echo $address;?></p>
				</div>
				<!-- <div class="mb-15 sales">
					<div class="saler">
						<p>SHOES STORE khuyến mãi</p>
						<p>Có thể chọn 2<span><i class='bx bx-error-circle'></i></span></p>
					</div>
					<p class="ticket"><span><i class="fa-solid fa-ticket"></i></span>Chọn hoặc nhập Khuyến mãi khác</p>
				</div>
				<div class="mb-15 apply_sale">
					<div class="try_now">
						<p>Thử ngay: Giảm giá cho đơn hàng bằng ASA</p>
					</div>
					<div class="apply_sale_content">
						<div class="wrapper_image">
							<img src="./asset/imgs/apply_sale_0.png" alt="">
						</div>
						<div class="content">
							<p>Chưa áp dụng giảm giá<span><i class="bx bx-error-circle"></i></span></p>
							<p>Vì chưa đạt đủ số lượng ASA</p>
						</div>
						<div class="swap">
							<span></span>
						</div>
					</div>
					<div class="line"></div>
					<div class="apply_sale_content">
						<div class="wrapper_image">
							<img src="./asset/imgs/apply_sale_1.png" alt="">
						</div>
						<div class="content">
							<p>Chưa áp dụng giảm giá</p>
							<p>Vì sở hữu chưa đủ tối thiểu 1000 Xu</p>
						</div>
						<div class="swap">
							<span></span>
						</div>
					</div>
				</div>
				<div class="mb-15 invoice">
					<div class="input-box">
						<input type="checkbox">
						<div class="content">
							<p>Yêu cầu hoá đơn</p>
							<p>Shoes store chỉ xuất hoá đơn điện tử</p>
						</div>
					</div>
				</div> -->
				<div class="mb-15 total">
					<div class="your_order">
						<!-- <div class="order">
							<p>Đơn hàng</p>
							<p>Thay đổi</p>
						</div>
						<div class="total_product">
							<p>1 sản phẩm.</p>
							<p>Xem thông tin<span><i class="fa-solid fa-chevron-down"></i></span></p>
						</div>
						<div class="line"></div> -->
						<div class="show_detail">
							<div class="summary provisional">
								<p>Tạm tính</p>
								<p><?php echo number_format($accumlator);?></p>
							</div>
							<div class="summary transfer">
								<p>Phí vận chuyển</p>
								<p>70.000đ</p>
							</div>
							<div class="summary economical">
								<p>Khuyến mãi vận chuyển</p>
								<p>-20.000đ</p>
							</div>
						</div>
						<div class="line"></div>
						<div class="area_buy">
							<div class="total_complete">
								<div class="col_1">
									<p>Tổng tiền</p>
								</div>
								<div class="col_2">
									<p class="price"><?php echo number_format($accumlator + 50000);?></p>
									<p class="include_VAT">(Giá này đã bao gồm thuế GTGT, phí đóng gói, phí vận chuyển và các chi phí phát sinh khác)</p>
								</div>
							</div>
							<button onclick="alert('Đặt hàng thành công!')" type="submit" name="btn_area_buy" value="AZT" class="btn_area_buy">Đặt hàng</button>
						</div>
					</div>
				</div>

			</aside>

		</form>
		<?php }else{?>
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
			<?php }?>
		
	</main>
	<div class="loader">
		<div class="loader-inner">
			<div class="loader-line-wrap">
				<div class="loader-line"></div>
			</div>
			<div class="loader-line-wrap">
				<div class="loader-line"></div>
			</div>
			<div class="loader-line-wrap">
				<div class="loader-line"></div>
			</div>
			<div class="loader-line-wrap">
				<div class="loader-line"></div>
			</div>
			<div class="loader-line-wrap">
				<div class="loader-line"></div>
			</div>
		</div>
	</div>
	<?php
		includeJavascript("../asset/javascript/pay_method.js");
	?>
