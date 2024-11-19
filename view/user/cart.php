<?php
if (!isset($_SESSION['account'])) {
	header('location: ../controller/index.php');
}
if(isset($_GET['dont_have_cart'])){
	echo "<script>alert('Bạn phải chọn sản phẩm thì mới có thể mua hàng!')</script>";
}
includeCss("../asset/css/loader.css");
includeCss("../asset/css/cart.css");
?>
	<main class="cart_AZT">
		<h1>GIỎ HÀNG</h1>
		<div class="layout">
		<form action="../model/user/handle_update_cart.php" method="post">
			<div class="col_1">
				<div class="total_product">
					<div class="input-box">
						<input id="total" type="checkbox">
						<label for="total">Tất cả</label>
					</div>
					<p class="price">Đơn giá</p>
					<p class="quantity">Số lượng</p>
					<p class="total_money">Thành tiền</p>
					<p class="trash"><i class=' bx bx-trash'></i></p>
				</div>
				<div class="your_cart">
					<div class="show_product">
						
						<?php
					    $user_account = $_SESSION['account'];
						// Lấy ra tên tài khoản của người dùng khi đăng nhập
						$get_information_cart__and_products = "SELECT carts.ID as cart_ID,products.ID as product_ID,carts.quantity,products.product_name,products.image,products.price FROM carts INNER JOIN products ON carts.product_ID = products.id WHERE carts.user_ID = (SELECT ID FROM users WHERE account = '$user_account');";
						// Đầu tiên trong bảng giỏ hàng chúng ta phải biết rằng những sản phẩm trong giỏ hàng nó biết nó thuộc về người nào
						// Sau khi lọc xong chúng ta sẽ nối bảng sản phẩm để lấy ra ảnh, tên hoặc mô tả
						$get_datas = $connect->query($get_information_cart__and_products);
						if(mysqli_num_rows($get_datas) > 0){
							for($i = 0;$i< mysqli_num_rows($get_datas);$i++){
								$row = mysqli_fetch_array($get_datas);
								$cart_ID = $row['cart_ID'];
								$product_ID = $row['product_ID'];
								$quantity = $row['quantity'];
								$product_name = $row['product_name'];
								$image = $row['image'];
								$price = $row['price'];													
						?>
						
						<div class="cart_component">
							<div class="wrapper_content">
								<input name="checkbox_array[]" type="checkbox" value="<?php echo $product_ID?>">
								<div class="wrapper_image">
									<img src="../asset/image_products/<?php echo $image;?>" alt="">
								</div>
								<div class="content">
									<p class="genuine"><span><i class="fa-solid fa-circle-check"></i></span>Chính hãng</p>
									<a class="content_product_detail" href=""><?php echo $product_name;?></a>
									<p class="delivery_to--future"><span><i class="fa-solid fa-car-side"></i></span>Giao thứ 4, 27/03</p>
								</div>
							</div>
							<p class="price"><?php echo number_format($price);?></p>
							
							<input hidden type="text" name="product_ID[]" value="<?php echo $product_ID?>">
							<div class="wrapper_quantity">
								<div class="quantity">
									<span class="minus"><i class="fa-solid fa-minus"></i></span>
									<input name="quantity[]" type="text" value="<?php echo $quantity?>">
									<span class="plus"><i class="fa-solid fa-plus"></i></span>
								</div>

							</div>
							<p class="ammount"><?php echo number_format(($price * $quantity));?></p>
							
							<a style="text-decoration: none;" href="../model/user/handle_delete_cart.php?product_ID=<?php echo $product_ID?>" class="trash"><i class='bx bx-trash'></i></a>
						</div>
						<?php }}?>
								<input style="color:white;background-color: rgb(228,104,73);border: none;outline: none;border-radius: 4px;padding:14px 10px;font-size: 1.6rem;cursor: pointer;" type="submit" name="checkbox_array" value="Cập nhật sản phẩm">
						
						

					</div>
					<div class="line"></div>
					<div class="economical">
						<p>Shop Khuyến Mãi<span>Vui lòng chọn sản phẩm trước</span></p>
					</div>
				</div>
			</div>
			<div class="col_2">
				<div class="col_2_delivery--to">
					<div class="delivery_to">
						<p class="title">Giao tới</p>
						<p class="change">Thay đổi</p>
					</div>
					<div class="name-phone">
						<p class="name">Nguyễn Lâm Hoàng</p>
						<p class="phone">0708063423</p>
					</div>
					<p class="address"><span>Nhà</span>H01/03, kiệt 45 lê tấn trung, Phường Thọ Quang, Quận Sơn Trà, Đà Nẵng</p>
				</div>
				<div class="col_2_sales">
					<div class="saler">
						<p>SHOES STORE khuyến mãi</p>
						<p>Có thể chọn 2<span><i class='bx bx-error-circle'></i></span></p>
					</div>
					<p class="ticket"><span><i class="fa-solid fa-ticket"></i></span>Chọn hoặc nhập Khuyến mãi khác</p>
				</div>
				<div class="col_2_total">
					<div class="your_order">
						<div class="order">
							<p>Đơn hàng</p>
							<p>Thay đổi</p>
						</div>
						<div class="total_product">
							<p>1 sản phẩm.</p>
							<p>Xem thông tin<span><i class="fa-solid fa-chevron-down"></i></span></p>
						</div>
						<div class="line"></div>
						<div class="show_detail">
							<div class="summary provisional">
								<p>Tạm tính</p>
								<p>1.500.000đ</p>
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
								<div class="first_col">
									<p>Tổng tiền</p>
									<?php
										$sql = "SELECT * FROM carts INNER JOIN products ON products.ID = carts.product_ID WHERE carts.user_ID = (SELECT ID FROM users WHERE account = '$user_account')";
										$get_total = $connect->query($sql);
										if(mysqli_num_rows($get_total) > 0){
											$accumlator = 0;
											for($i = 0;$i < mysqli_num_rows($get_total);$i++){
												$row = mysqli_fetch_array($get_total);
												$total_quantity = $row['quantity'];
												$price = $row['price'];
												$accumlator += $total_quantity * $price;
											};
											
										
									?>
									<p class="price"><?php echo number_format($accumlator);?></p>
									<?php }else{?>
										<p class="price">0</p>
										<?php }?>
								</div>
								<div class="second_col">
									<p class="include_VAT">(Đã bao gồm VAT nếu có)</p>
								</div>
							</div>
							<input style="color:white;background-color: rgb(228,104,73);border: none;outline: none;border-radius: 4px;width:100%;height:45px;font-size: 1.6rem;cursor: pointer;margin-top:15px;" type="submit" name="pay_method" value="Mua hàng">
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
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
		includeJavascript("../asset/javascript/cart.js");
	?>
	
