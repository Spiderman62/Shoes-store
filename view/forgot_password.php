<?php
require_once "../model/connect_database.php";
$email_exist_element = "";
$send_email_element = "";
	if(isset($_GET['email_exist'])){
		$email_exist = $_GET['email_exist'];
		if($email_exist == 'email_exist'){
			$email_exist_element = "Email không tồn tại!";
		}
	}
	if(isset($_GET['send_email'])){
		$send_email = $_GET['send_email'];
		if($send_email == 'send_email'){
			$send_email_element = "Mật khẩu đã được gửi tới email của bạn, Vui lòng kiểm tra";
		}
	}
includeCss("../asset/css/forgot_password.css");
?>

	<main>
		<div class="wrapper">
			<div class="content">
				<h1>Quên mật khẩu?</h1>
				<p>Điền email gắn với tài khoản của bạn để nhận lại mật khẩu</p>
			</div>
			<form action="../model/handle_send_email_forgot_password.php" id="forgot_form" method="post">
				<div class="input-box">
					<label for="email_forgot">Email</label>
					<input id="email_forgot" type="text" name="email_forgot">
					<p style="font-size: 1.6rem;color: red;margin-top: 8px;" class="error_message"><?php echo $email_exist_element;?></p>
				</div>
				<div class="wrapper_btn">
					<input type="submit" name="submit" value="Tiếp tục">
					<a href="../controller/index.php">Quay lại đăng nhập</a>
				</div>
				<p style="margin-top: 15px;font-size: 2.0rem;text-align: center;color:rgb(72,91,124)"><?php echo $send_email_element;?></p>
			</form>
		</div>
	</main>
	<?php
		includeJavascript("../asset/javascript/forgot_password.js");
	?>
