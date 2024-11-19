<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "../../connect_database.php";
if (isset($_POST['submit'])) {
	$ID_varchar = $_POST['ID_varchar'];
	$name_product = $_POST['name_product'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$select_category = $_POST['select-category'];
	$select_product = $_POST['select-product'];
	$image = $_FILES['image'];
	$tmp_image = $image['tmp_name'];
	$name_image = $image['name'];
	$date = date('Y-m-d H:i:s');
	$folder = "../../../asset/image_products/";
	move_uploaded_file($tmp_image,$folder."$name_image");
	$sql = "INSERT INTO products(ID,product_name,image,price,create_date,description,category_ID,user_ID)
		VALUES('$ID_varchar','$name_product','$name_image','$price','$date','$description','$select_category','$select_product')
		";
	$connect->query($sql);
	header('location: ../../../controller/index.php?role=admin&route=administrators_product_manager');
}
?>