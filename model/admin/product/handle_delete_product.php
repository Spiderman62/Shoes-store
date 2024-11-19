<?php
	require_once "../../connect_database.php";
	$ID = $_GET['ID'];
	$query = "DELETE FROM products WHERE ID = '$ID'";
	$connect->query($query);
	header('location: ../../../controller/index.php?role=admin&route=administrators_product_manager');
?>