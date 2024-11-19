<?php
require_once "../../connect_database.php";
$ID = $_GET['ID'];
$delete_cart_user = "DELETE FROM carts WHERE user_ID = $ID";
$connect->query($delete_cart_user);
$delete_order_detail = "DELETE FROM order_detail where user_detail_ID = (select ID from user_detail where user_ID = $ID)";
$connect->query($delete_order_detail);
$delete_user_detail = "DELETE FROM user_detail WHERE user_ID = $ID";
$connect->query($delete_user_detail);
$delete_comment = "DELETE FROM comments WHERE user_ID = $ID";
$connect->query($delete_comment);
$sql = "DELETE FROM users WHERE ID = $ID";
$connect->query($sql);
header('location: ../../../controller/index.php?role=admin&route=administrators');
