<?php
require_once "../../connect_database.php";
	if(isset($_POST['checkbox_array'])){
		$checkbox_array = $_POST['checkbox_array'];
		for($i = 0;$i < count($checkbox_array);$i++){
			$sql = "DELETE FROM categories WHERE ID = $checkbox_array[$i]";
			$connect->query($sql);
		}
		header('location: ../../../controller/index.php?role=admin&route=administrators_category_manager');
	}else{
		header('location: ../../../controller/index.php?role=admin&route=administrators_category_manager');
	}
?>