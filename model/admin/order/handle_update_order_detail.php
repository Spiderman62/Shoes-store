<?php
	require_once "../../connect_database.php";
	$ID = $_POST['ID'];
	$status = $_POST['status'];
	$SQL = "UPDATE order_detail SET status = '$status' WHERE ID = $ID";
	$connect->query($SQL);
	sleep(1);
	header('location: ../../../controller/index.php?role=admin&route=adminstrators_order_manager');
?>