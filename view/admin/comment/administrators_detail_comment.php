<?php
	includeCss("../asset/css/administrators_detail_comment.css");
?>
		<div class="wrapper-action">
			<label for="action">Action: </label>
			<select class="action" name="action" id="action">
				<option value="">-- Action --</option>
				<option value="delete">-- Delete --</option>
			</select>
			<p class="handle-submit-action">Submit</p>
		</div>
		<form action="../model/admin/comment/handle_delete_comment_checkbox.php" method="post" class="wrapper">
			<div class="titles">
				<p><input class="checkbox" type="checkbox"></p>
				<p>Bình luận</p>
				<p>Ngày bình luận</p>
				<p>Người dùng</p>
				<p></p>
			</div>
			<div class="categories">
				<?php
					$product_ID = $_GET['product_ID'];
					require_once "../model/connect_database.php";
					$query_comment_product_ID = "SELECT comments.comment as comment,
					 comments.ID as comment_ID ,comments.create_date as date ,
					 users.account as account FROM comments INNER JOIN users ON users.ID = comments.user_ID WHERE comments.product_ID = '$product_ID'";
					$get_datas = $connect->query($query_comment_product_ID);
					if(mysqli_num_rows($get_datas) > 0){
						for($i = 0;$i < mysqli_num_rows($get_datas);$i++){
						$row = mysqli_fetch_assoc($get_datas);
						$ID = $row['comment_ID'];
						$comment = $row['comment'];
						$date = $row['date'];
						$account = $row['account'];
				?>
				<div class="component">
					<input hidden type="text" name="product_ID_checkbox" value="<?php echo $product_ID;?>">
					<p><input type="checkbox" class="checkbox_array" name="checkbox_array[]" value="<?php echo $ID;?>"></p>
					<p class="limit-content-comment"><?php echo $comment;?></p>
					<p><?php echo $date;?></p>
					<p><?php echo $account;?></p>
					<p class="trash_ID" data-id="<?php echo $ID;?>" data-product="<?php echo $product_ID;?>"><i class="trash fa-solid fa-trash"></i></p>
				</div>
				<?php }}?>
				

			</div>
			
		</form>
	</main>
	<div class="popup">
		<div class="wrapper_popup">
			<p class="caution">Are you sure want to delete this data?</p>
			<div class="choose-method--delete">
				<p class="cancel">Cancel</p>
				<p class="delete">Delete</p>
			</div>
		</div>
	</div>
	<form class="delete_ID" action="../model/admin/comment/handle_delete_comment.php" method="post">
		<input hidden name="ID" type="text" value="">
		<input hidden type="text" name="product_ID" value="">
	</form>
	<?php
		includeJavascript("../asset/javascript/administrators_detail_comment.js");
	?>
