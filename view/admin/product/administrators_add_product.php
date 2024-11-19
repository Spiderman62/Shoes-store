<?php
$duplicate_ID = "";
if(isset($_GET['duplicate_ID'])){
	$duplicate_ID = "Không cho phép trùng ID";
}
?>
<style>
	header{
		display: none;
	}
	main{
		display: flex;
		justify-content: center;
		align-items: center;
		background: unset;
	}
</style>
<?php
	includeCss("../asset/css/administrators_product.css");
?>
	<div class="wrapper">
		<h1>Product</h1>
		<a href="../controller/index.php?role=admin&route=administrators_product_manager">Your product</a>
		<form id="form" action="../model/admin/product/handle_add_product.php" method="post" enctype="multipart/form-data">
				<div class="input-box">
					<label for=">ID_varchar">ID</label>
					<input id="ID_varchar" type="text" name="ID_varchar">
					<span style="color:red" class="error_message"><?php echo $duplicate_ID;?></span>
				</div>
				<div class="input-box">
					<label for=">name_product">Product Name</label>
					<input id="name_product" type="text" name="name_product">
					<span class="error_message"></span>
				</div>
				<div class="input-box">
					<label for="description">Description</label>
					<input id="description" type="text" name="description">
					<span class="error_message"></span>

				</div>
				<div class="input-box">
					<label for="price">Price</label>
					<input id="price" type="text" name="price">
					<span class="error_message"></span>
				</div>
				<div class="input-box">
					<label for="category_ID">Category ID:</label>
					<select style="margin-top:20px;padding: 5px;border-radius: 4px;" name="select-category" id="">
						<?php
						require_once "../model/connect_database.php";
						$query_categoies = "SELECT * FROM categories";
						$get_categories = $connect->query($query_categoies);
						if(mysqli_num_rows($get_categories) > 0){
							for($i = 0;$i < mysqli_num_rows($get_categories);$i++){
								$row = mysqli_fetch_assoc($get_categories);
						?>
						<option value="<?php echo $row['ID'];?>"><?php echo $row['name_category'];?></option>
						<?php }}?>
					</select>

				</div>
				<div class="input-box">
					<label for="user_ID">User ID:</label>
					<select style="margin-top:20px;padding: 5px;border-radius: 4px;" name="select-product" id="">
					<?php
						$query_product = "SELECT * FROM users WHERE role = 'admin'";
						$get_product = $connect->query($query_product);
						if(mysqli_num_rows($get_product) > 0){
							for($i = 0;$i < mysqli_num_rows($get_product);$i++){
								$row = mysqli_fetch_assoc($get_product);
						?>
						<option value="<?php echo $row['ID'];?>"><?php echo $row['ID'];?></option>
						<?php }}?>
					</select>

				</div>
				<div class="room_image">
					<label for="image">Image</label>
					<input id="image" type="file" name="image">
					<span class="error_message"></span>

				</div>
				<input id="submit" type="submit" name="submit" value="Submit">

		</form>
	</div>
	<?php
		includeJavascript("../asset/javascript/administrators_add_product.js");
	?>
	
