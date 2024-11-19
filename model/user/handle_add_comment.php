<?php
session_start();
require_once "../connect_database.php";
$account = $_SESSION['account'];
$query_user_ID = "SELECT * FROM users WHERE account = '$account'";
$user_ID = mysqli_fetch_assoc($connect->query($query_user_ID))['ID'];
//
$comment = $_POST['comment'];
$product_ID = $_POST['product_ID'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO comments(product_ID,user_ID,comment,create_date)
VALUES('$product_ID','$user_ID','$comment','$date')
";
$connect->query($sql);
header('location: ../../controller/index.php?role=user&route=product_detail&product_ID='.$product_ID);
?>