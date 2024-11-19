<?php
require_once "../../connect_database.php";
$ID = $_POST['ID'];
$product_ID = $_POST['product_ID'];
echo $product_ID;
$sql = "DELETE FROM comments WHERE ID = $ID";
$connect->query($sql);
header('location: ../../../controller/index.php?role=admin&route=administrators_detail_comment&product_ID='.$product_ID);
?>