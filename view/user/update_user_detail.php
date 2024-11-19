<?php
// session_start();
// if (!isset($_SESSION['account'])) {
// 	header('location: ../frontend/index.php?page_layout=sign_in__sign_up&remove_home=remove_home');
// }
includeCss("../asset/css/pay_method.css");
includeCss("../asset/css/loader.css");
?>
<?php
$account = $_SESSION['account'];
$sql_userID = "SELECT * FROM users WHERE account = '$account'";
$querySQL = $connect->query($sql_userID);
$user_ID = mysqli_fetch_array($querySQL)['ID'];
$query_user_detail = "SELECT * FROM user_detail WHERE user_ID = '$user_ID'";
$get_user_detail = $connect->query($query_user_detail);
if (mysqli_num_rows($get_user_detail) > 0) {
	$row = mysqli_fetch_assoc($get_user_detail);
	$ID = $row['ID'];
	$username = $row['username'];
	$address = $row['address'];
	$number_phone = $row['number_phone'];
?>
	<main class="main_wrapper_address">
		<main class="wrapper_address">
			<h1>Hãy chắc chắn rằng thông tin của bạn phải được chính xác</h1>
			<form class="infor-address" action="../model/user/handle_update_user_detail.php" method="post">
				<div class="input-box">
					<label for="username">Username: </label>
					<input name="username" id="username" type="text" value="<?php echo $username ?>">
					<p class="error_message"></p>
				</div>
				<div class="input-box">
					<label for="address">Address: </label>
					<input name="address" id="address" type="text" value="<?php echo $address ?>">
					<p class="error_message"></p>
				</div>
				<div class="input-box">
					<label for="number_phone">Number phone: </label>
					<input name="number_phone" id="number_phone" type="text" value="<?php echo $number_phone ?>">
					<p class="error_message"></p>
				</div>
				<input type="submit" name="submit_user_detail" value="submit">
			</form>
		</main>
	</main>
<?php } ?>