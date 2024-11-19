<?php
	require_once "../../connect_database.php";
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST['submit'])){
			$ID = $_POST['submit'];
			$account = $_POST['account'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$status = $_POST['status'];
			$date = $_POST['date'];
			echo $ID,$account,$username,$email,$password,$status,$date;
			$query = "UPDATE users SET account = '$account', user_name ='$username', user_email = '$email', user_password = '$password',status = '$status', create_date = '$date' WHERE ID = $ID";
			$connect->query($query);
			header("location: ../../../controller/index.php?role=admin&route=administrators");
		}
	}
?>