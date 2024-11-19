<?php
require_once "../../connect_database.php";
if(isset($_POST['submit'])){
	$ID = $_POST['ID'];
	$name_category = $_POST['name_category'];
	$create_date = $_POST['create_date'];
	$select = $_POST['select'];
	$sql = "UPDATE categories SET name_category = '$name_category', create_date = '$create_date', user_ID = '$select' WHERE ID = '$ID'";
	$connect->query($sql);
	header('location: ../../../controller/index.php?role=admin&route=administrators_category_manager');
}
?>