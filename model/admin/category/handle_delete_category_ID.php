<?php
require_once "../../connect_database.php";
$ID = $_POST['ID'];
$sql = "DELETE FROM categories WHERE ID = $ID";
$connect->query($sql);
header('location: ../../../controller/index.php?role=admin&route=administrators_category_manager');
?>