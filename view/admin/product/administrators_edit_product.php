<?php
require_once "../model/connect_database.php";
$ID = $_GET['ID'];
$query = "SELECT * FROM products WHERE ID = '$ID'";
$category_datas = $connect->query($query);
if (mysqli_num_rows($category_datas) > 0) {
	$row = mysqli_fetch_array($category_datas);
	$ID = $row['ID'];
	$name_category = $row['product_name'];
	$image = $row['image'];
	$price = $row['price'];
	$create_date = $row['create_date'];
	$description = $row['description'];
	$category_ID = $row['category_ID'];
	$user_ID = $row['user_ID'];
	$my_folder = "../asset" . "/image_products";
}
?>
<style>
	header{
		display: none;
	}
</style>
<?php
	includeCss("../asset/css/administrators_product.css");
?>

	<div class="wrapper">
		<h1>Category</h1>
		<a href="../controller/index.php?role=admin&route=administrators_product_manager">Your product</a>
		<form id="form" action="../model/admin/product/handle_update_product.php" method="post" enctype="multipart/form-data">
			<div class="input-box">
				<label for=">ID_varchar">ID</label>
				<input id="ID_varchar" type="text" name="ID_varchar" value="<?php echo $ID ?>">
				<span class="error_message"></span>
			</div>
			<div class="input-box">
				<label for=">name_product">Product Name</label>
				<input id="name_product" type="text" name="name_product" value="<?php echo $name_category ?>">
				<span class="error_message"></span>
			</div>
			<div class="input-box">
				<label for="description">Description</label>
				<input id="description" type="text" name="description" value="<?php echo $description ?>">
				<span class="error_message"></span>
			</div>
			<div class="input-box">
				<label for="price">Price</label>
				<input id="price" type="text" name="price" value="<?php echo $price ?>">
				<span class="error_message"></span>
			</div>
			<div class="input-box">
				<label for="date">Date</label>
				<input id="date" type="text" name="date" value="<?php echo $create_date ?>">
				<span class="error_message"></span>
			</div>
			<div class="input-box">
				<label for="category_ID">Category ID:</label>
				<select style="margin-top:20px;padding: 5px;border-radius: 4px;" name="select-category" id="">
					<?php
					$query_categoies = "SELECT * FROM categories";
					$get_categories = $connect->query($query_categoies);
					if (mysqli_num_rows($get_categories) > 0) {
						for ($i = 0; $i < mysqli_num_rows($get_categories); $i++) {
							$row = mysqli_fetch_assoc($get_categories);
					?>
							<option value="<?php echo $row['ID']; ?>" <?php if ($category_ID === $row['ID']) echo "selected" ?>><?php echo $row['name_category']; ?></option>
					<?php }
					} ?>
				</select>

			</div>
			<div class="input-box">
				<label for="user_ID">User ID:</label>
				<select style="margin-top:20px;padding: 5px;border-radius: 4px;" name="select-product" name="" id="">
					<?php
					$query_product = "SELECT * FROM users WHERE role = 'admin'";
					$get_product = $connect->query($query_product);
					if (mysqli_num_rows($get_product) > 0) {
						for ($i = 0; $i < mysqli_num_rows($get_product); $i++) {
							$row = mysqli_fetch_assoc($get_product);
					?>
							<option value="<?php echo $row['ID']; ?>"><?php echo $row['ID']; ?></option>
					<?php }
					} ?>
				</select>

			</div>
			<div class="room_image">
				<label for="image">Image</label>
				<input id="image" type="file" name="image">
				<span class="error_message"></span>

			</div>

			<div style="height: 100px;width:100px;margin: 0 auto;" class="wrapper_image">
				<img style="width:100%;height:100%;object-fit: cover;" src="<?php echo $my_folder . "/" . $image ?>" alt="">
			</div>
			<button style="width: 100%;
    height: 40px;
    background-color: rgb(47, 42, 98);
    border: none;
    outline: none;
    border-radius: 4px;
    color: white;
    cursor: pointer;display: flex;justify-content: center;align-items: center;text-decoration: none;" name="submit" value="<?php echo $ID; ?>" type="submit">Submit</button>

		</form>
	</div>
	<?php
		includeJavascript("../asset/javascript/administrators_update_product.js");
	?>