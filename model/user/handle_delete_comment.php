<?php
require_once "../connect_database.php";
	if(isset($_GET['ID'])){
		$ID = $_GET['ID'];
		$product_ID = $_GET['product_ID'];
		echo $product_ID;
		$query = "DELETE FROM comments WHERE ID = $ID";
		$connect->query($query);
		header('location: ../../controller/index.php?role=user&route=product_detail&product_ID='.$product_ID);
	};
?>