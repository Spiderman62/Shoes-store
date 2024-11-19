<?php
// session_start();
// if (!isset($_SESSION['account'])) {
// 	header('location: ../frontend/index.php?page_layout=sign_in__sign_up&remove_home=remove_home');
// }
includeCss("../asset/css/loader.css");
?>
<main>
	<main class="product grid-1">
		<section>
			<div class="wrapper_detail_products">
				<div class="container-grid">
					<?php
					require_once "../model/connect_database.php";
					$category_ID = $_GET['category_ID'];
					$sql_getname_category = "SELECT name_category FROM categories WHERE ID = $category_ID";
					$get_name_category_query = $connect->query($sql_getname_category);
					$get_name_category = mysqli_fetch_array($get_name_category_query)['name_category'];
					$itemPerPage = isset($_GET['perPage']) ? $_GET['perPage'] : 8;
					$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
					$offSet = ($currentPage - 1) * $itemPerPage;
					$sql = "SELECT * FROM products 
							WHERE category_ID = $category_ID 
							LIMIT $itemPerPage OFFSET $offSet;";
					$queryTotalRecord = "SELECT * FROM products 
							WHERE category_ID = $category_ID";
					$getTotalRecord = mysqli_num_rows($connect->query($queryTotalRecord));
					$totalPage = ceil($getTotalRecord / $itemPerPage);
					$get_products = $connect->query($sql);
					if (mysqli_num_rows($get_products) > 0) {
						for ($i = 0; $i < mysqli_num_rows($get_products); $i++) {
							$row = mysqli_fetch_array($get_products);
							$ID = $row['ID'];
							$product_name = $row['product_name'];
							$image = $row['image'];
							$price = $row['price'];
							$description = $row['description'];
							$views = $row['views'];
					?>
							<div class="item_render">
								<a href="../controller/index.php?role=user&route=product_detail&product_ID=<?php echo $ID; ?>">
									<div class="wrapper_image">
										<img src="../asset/image_products/<?php echo $image; ?>" alt="">
									</div>
									<div class="content">
										<p class="name_category"><?php echo $get_name_category; ?></p>
										<p class="name_products"><?php echo $product_name; ?></p>
										<p class="price"><?php echo number_format($price); ?> vnd</p>
										<p class="view"><i class="fa-solid fa-user"></i><span><?php echo $views ?></span></p>
									</div>
								</a>
							</div>
					<?php }
					} ?>
				</div>
				<div class="buttons_products">
					<!-- <span><i class='bx bx-chevron-left'></i></span> -->
					<?php
					for ($i = 0; $i < $totalPage; $i++) {
					?>
					<a href="../controller/index.php?role=user&route=product&category_ID=<?php echo $category_ID;?>&perPage=8&page=<?php echo $i + 1?>">
						<span>
							<p><?php echo $i + 1?></p>
						</span>
					</a>
					<?php }?>

					<!-- <span><i class='bx bx-chevron-right'></i></span> -->
				</div>
			</div>





		</section>
	</main>

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
includeJavascript("../asset/javascript/product.js");
?>