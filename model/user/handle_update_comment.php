<?php
	require_once "../connect_database.php";
	$product_ID = $_POST['product_ID'];
	$comment = $_POST['comment'];
	$ID = $_POST['ID_comment'];
	$query = "UPDATE comments SET comment = '$comment' WHERE ID = $ID";
	$connect->query($query);
	header('location: ../../controller/index.php?role=user&route=product_detail&product_ID='.$product_ID);
?>