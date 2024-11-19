<?php
// session_start();
// if (!isset($_SESSION['account'])) {
// 	header('location: ../frontend/index.php?page_layout=sign_in__sign_up&remove_home=remove_home');
// }
includeCss("../asset/css/product_detail.css");
includeCss("../asset/css/loader.css");
?>

<main>


	<?php
	require_once "../model/connect_database.php";
	$product_ID = $_GET['product_ID'];
	$sql_product = "SELECT * FROM products WHERE ID = '$product_ID'";
	$get_data_product = $connect->query($sql_product);
	$row = mysqli_fetch_array($get_data_product);
	$ID = $row['ID'];
	$product_name = $row['product_name'];
	$image = $row['image'];
	$price = $row['price'];
	$description = $row['description'];
	$views = $row['views'];
	/////////////////////////////////////////
	$query_increase = "UPDATE products SET views = ($views + 1) WHERE ID = '$product_ID'";
	$connect->query($query_increase);
	?>
	<div class="product_detail">
		<div class="show_product">
			<div class="wrapper_img">
				<img draggable="false" src="../asset/image_products/<?php echo $image; ?>" alt="">
			</div>
		</div>
		<div class="product__content">
			<div class="component_product__content">
				<div class="brand">
					<p><span><i class="fa-solid fa-circle-check"></i></span>Chính hãng</p>
					<p>Thương hiệu: <span>AZT</span></p>
				</div>
				<h1 class="title"><?php echo $product_name; ?></h1>
				<div class="wrapper_star">
					<span class="rate">5.0</span>
					<span class="wrapper_star_all">
						<span><i class="fa-solid fa-star"></i></span>
						<span><i class="fa-solid fa-star"></i></span>
						<span><i class="fa-solid fa-star"></i></span>
						<span><i class="fa-solid fa-star"></i></span>
						<span><i class="fa-solid fa-star"></i></span>
					</span>
					<span class="number">(50)</span>
					<div class="sold">Đã bán 8</div>
				</div>
				<p class="price"><?php echo number_format($price); ?> vnđ <span>-50%</span></p>
				<div class="economical">
					<div class="economail_sale">
						<p class="economical_span">Giá sau khuyến mãi: <span>400.000 vnđ</span></p>
						<span class="icon"><i class="fa-solid fa-chevron-down"></i></span>
					</div>
					<div class="discount">
						<p class="discount_span"><span><i class="fa-solid fa-check"></i></span>Giảm 20.000₫<span>từ coupon của nhà bán</span></p>
						<p>Khuyến mãi có thể hết sớm</p>
					</div>
				</div>
				<h1 class="size">Size</h1>
				<div class="wrapper_size">
					<div class="item active">36<span><i class="fa-solid fa-check"></i></span></div>
					<div class="item">37</div>
					<div class="item">38</div>
					<div class="item">39</div>
					<div class="item">40</div>
					<div class="item">41</div>
					<div class="item">42</div>
					<div class="item">43</div>
					<div class="item">44</div>
				</div>
				<h1 class="color">Màu</h1>
				<div class="more_show--product">
					<div class="item show_border">
						<div class="wrapper_image">
							<img src="../asset/imgs/Elo_Shoes.jpg" alt="">
						</div>
						<p>Đen-đỏ</p>
					</div>
					<div class="item">
						<div class="wrapper_image">
							<img src="../asset/imgs/purple_shoes_col.jpg" alt="">
						</div>
						<p>Tím</p>

					</div>
					<div class="item">
						<div class="wrapper_image">
							<img src="../asset/imgs/alttatic_shoes.jpg" alt="">
						</div>
						<p>Trắng-đen</p>
					</div>
					<div class="item">
						<div class="wrapper_image">
							<img src="../asset/imgs/boots.jpg" alt="">
						</div>
						<p>Đen</p>
					</div>

				</div>
			</div>
			<div class="component_information_transfer">
				<div class="transfer">
					<h1 class="title">Thông tin vận chuyển</h1>
					<div class="wrapper_delivery_to">
						<p>Giao đến Q. Sơn Trà, P. Thọ Quang, Đà Nẵng</p>
						<p>Đổi</p>
					</div>
				</div>
				<div class="transfer_detail">
					<p><span><i class="fa-solid fa-truck"></i></span>Giao Thứ Bảy</p>
					<p>Trước 19h, 30/03: <?php echo number_format($price); ?>₫<span>45.000₫</span></p>
				</div>
			</div>
			<div class="component_description">
				<h1>Thông tin về sản phẩm</h1>
				<p><?php echo $description ?></p>
			</div>
			<div class="component--comment-manager">
				<h1>Comments</h1>
				<div class="input-comment">
					<input class="input_comment" type="text" name="input_comment" placeholder="Press enter to submit">
				</div>
				<div class="add-comment-user">
					<!--  -->
					<?php
					$query_comment = "SELECT users.ID as user_ID ,comments.ID as ID, comments.comment as comment,comments.create_date as date,users.account as account,users.image as image FROM comments INNER JOIN users ON users.ID = comments.user_ID WHERE product_ID = '$product_ID'";
					$getComments = $connect->query($query_comment);
					if (mysqli_num_rows($getComments) > 0) {
						for ($i = 0; $i < mysqli_num_rows($getComments); $i++) {
							$row = mysqli_fetch_assoc($getComments);
							$user_ID = $row['user_ID'];
							$ID_comment = $row['ID'];
							$comment = $row['comment'];
							$date = $row['date'];
							$account = $row['account'];
							$image = $row['image'];
					?>
							<div class="personal-comment">
								<div class="wrapper_image">
									<img src="../asset/tmp_image/<?php echo $image; ?>" alt="">
								</div>
								<div class="wrapper-infor">
									<p class="name-account"><?php echo $account; ?></p>
									<p class="date">Đã bình luận vào ngày: <span><?php echo $date; ?></span></p>
								</div>
								<?php
								$user = $_SESSION['account'];
								$queryFindUser = "SELECT * FROM users WHERE account = '$user'";
								$findUser = mysqli_fetch_assoc($connect->query($queryFindUser))['ID'];
								if ($findUser === $user_ID) {

								?>
									<span data-id="<?php echo $ID_comment;?>" class="edit-comment"><i class="fa-solid fa-pen-to-square"></i></span>
									<a data-id="<?php echo $product_ID;?>" href="../model/user/handle_delete_comment.php?product_ID=<?php echo $product_ID; ?>&ID=<?php echo $ID_comment; ?>" class="delete-comment"><i class="fa-solid fa-xmark"></i></a>
								<?php } else { ?>

								<?php } ?>
								<p class="comment"><?php echo $comment ?></p>

							</div>
					<?php }
					} ?>
					<!--  -->
				</div>
			</div>
		</div>
		<div class="invoice">
			<div class="wrapper_company">
				<div class="wrapper_image">
					<img src="../asset/imgs/spider.jpg" alt="">
				</div>
				<div class="content">
					<p class="title">AZT SHOP</p>
					<div class="rate">4.3<span class="star"><i class="fa-solid fa-star"></i></span><span class="rate_person">(1.4k+ đánh giá)</span></div>
				</div>
			</div>
			<div class="line"></div>
			<div class="wrapper_type">
				<div class="wrapper_img">
					<img src="../asset/imgs/Elo_Shoes.jpg" alt="">
				</div>
				<div class="content">
					<span class="size">39</span>,
					<span class="color">Đen-đỏ</span>
				</div>
			</div>
			<!-- <div class="quantity">Số lượng</div>
				<div class="show_quantity">
					<div class="minus"><i class="fa-solid fa-minus"></i></div>
					<div class="show_number">1</div>
					<div class="plus"><i class="fa-solid fa-plus"></i></div>
				</div> -->
			<div style="margin-top: 70px;" class="total">
				<div class="title">Tạm tính</div>
				<div class="price"><?php echo number_format($price); ?> vnđ<span><i class='bx bx-info-circle'></i></span></div>
			</div>
			<a onclick="alert('Đã thêm vào giỏ hàng');" href="../model/user/handle_add_cart.php?user_account=<?php echo $_SESSION['account']; ?>&product_ID=<?php echo $ID; ?>" class="btn add--to_cart">Thêm vào giỏ</a>
		</div>
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
<form class="submit-comment" action="../model/user/handle_add_comment.php" method="post">
	<input hidden type="text" name="comment">
	<input hidden type="text" name="product_ID" value="<?php echo $product_ID; ?>">
</form>
<div class="popup">
	<div class="wrapper_popup">
		<p class="caution">Are you sure want to edit this data?</p>
		<form class="form-edit-comment" action="../model/user/handle_update_comment.php" method="post">
			<input type="text" name="comment">
			<input hidden type="text" name="ID_comment">
			<input hidden type="text" name="product_ID">
		</form>
		<div class="choose-method--delete">
			<p class="cancel">Cancel</p>
			<p class="delete">Edit</p>
		</div>
	</div>
</div>
<?php
includeJavascript("../asset/javascript/product_detail.js");
?>