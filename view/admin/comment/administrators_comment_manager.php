<?php
	includeCss("../asset/css/administrators_comment_manager.css");
?>
		<div class="wrapper">
			<div class="titles">
				<p>Sản phẩm</p>
				<p>Số lượng</p>
				<p>Bình luận mới nhất</p>
				<p>Bình luận cũ nhất</p>
				<p></p>
			</div>
			<div class="wrapper_products">
				<?php
				require_once "../model/connect_database.php";
				$query_count_product_ID = "SELECT max(comments.create_date) as news_comment,
				 min(comments.create_date) as olds_comment ,
				  products.product_name ,
				  comments.product_ID,
				  count(comments.user_ID) as user_count_ID FROM comments
				   INNER JOIN products ON products.ID = comments.product_ID
				    GROUP BY comments.product_ID;";
				$get_data_count = $connect->query($query_count_product_ID);
				if (mysqli_num_rows($get_data_count) > 0) {
					for ($i = 0; $i < mysqli_num_rows($get_data_count); $i++) {
						$row = mysqli_fetch_assoc($get_data_count);
						$product_ID = $row['product_ID'];
						$user_count_ID = $row['user_count_ID'];
						$product_name = $row['product_name'];
						$news_comment = $row['news_comment'];
						$olds_comment = $row['olds_comment'];
				?>
						<div class="component_render">
							<p class="product"><?php echo $product_name; ?></p>
							<p><?php echo $user_count_ID; ?></p>
							<p><?php echo $news_comment; ?></p>
							<p><?php echo $olds_comment; ?></p>
							<p class="details"><a href="../controller/index.php?role=admin&route=administrators_detail_comment&product_ID=<?php echo $product_ID?>">Chi tiết</a></p>
						</div>
				<?php }
				} ?>
			</div>
		</div>
