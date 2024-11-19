<?php
	$server = "127.0.0.1:3307";
	$user = "root";
	$password = "";
	$database = "my_workspace";
	$connect =  new mysqli($server,$user,$password,$database);
	if($connect){
		echo '';
	}else{
		die('Connection to the database has fail!!!');
	}
?>