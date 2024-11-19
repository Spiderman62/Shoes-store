<?php
require_once "../../connect_database.php";
$ID = $_POST['ID_varchar'];
$name_product = $_POST['name_product'];
$image = $_FILES['image'];
$image_tmp = $image['tmp_name'];
$name_image = $image['name'];
$description = $_POST['description'];
$category_ID = $_POST['select-category'];
$price = $_POST['price'];
$user_ID = $_POST['select-product'];
$create_date = $_POST['date'];
$folder = "\\images\\";
$folder = "../../../asset/image_products/";
move_uploaded_file($image_tmp, $folder . "$name_image");
$query = "UPDATE products SET ID = '$ID',product_name = '$name_product',price = '$price',create_date = '$create_date',description = '$description',category_ID = '$category_ID',user_ID = '$user_ID',image = '$name_image' WHERE ID = '$ID'";
$connect->query($query);
sleep(1);
header('location: ../../../controller/index.php?role=admin&route=administrators_product_manager');