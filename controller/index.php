<?php
session_start();
if (isset($_SESSION['account'])) {
	if(isset($_GET['role'])){
		switch ($_GET['role']) {
			case "admin":
				include_once "../view/admin/index.php";
				break;
			case "user":
				include_once "../view/user/index.php";
				break;	
		}
	}else{
		include_once "../view/sign_in__sign_up.php";

	}
}else {
	include_once "../view/sign_in__sign_up.php";
}
