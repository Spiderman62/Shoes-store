<?php
require_once "../../connect_database.php";
$product_ID = $_POST['product_ID_checkbox'];
if (isset($_POST['checkbox_array'])) {
	$checkbox_array = $_POST['checkbox_array'];
	for($i = 0;$i < count($checkbox_array);$i++){
		$sql = "DELETE FROM comments WHERE ID = $checkbox_array[$i]";
		$connect->query($sql);
	}
	header('location: ../../../controller/index.php?role=admin&route=administrators_detail_comment&product_ID=' . $product_ID);

} else {
	header('location: ../../../controller/index.php?role=admin&route=administrators_detail_comment&product_ID=' . $product_ID);
}
?>