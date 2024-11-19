<?php
// if(isset($_SESSION['account'])){
// 	header('location: ');
// }
$not_found = "";
$account_exist_element = "";
$email_exist_element = "";
$error_password_element = "";
if(isset($_GET['error_not_found'])){
	$found_error = $_GET['error_not_found'];
	if($found_error == 'not_found'){
		$not_found = "Không hề tồn tại tài khoản";
	}
}
	if(isset($_GET['error_password'])){
		$found_error_password = $_GET['error_password'];
		if($found_error_password == 'error_password'){
			$error_password_element = "Mật khẩu không chính xác!";
		}
	}
	if(isset($_GET['account_exist'])){
		$account_exist = $_GET['account_exist'];
		if($account_exist == 'account_exist'){
			$account_exist_element = "Tài khoản đã tồn tại";
		}
	}
	if(isset($_GET['email_exist'])){
		$email_exist = $_GET['email_exist'];
		if($email_exist == 'email_exist'){
			$email_exist_element = "Email đã tồn tại";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign in</title>
	<link rel="stylesheet" href="../asset/css/sign_in.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="../asset/css/sign_up.css?reload=<?php echo time(); ?>">
</head>

<body>
	<main>
		<div class="wrapper">
			<div class="form sign_in">
				<h2>Sign in</h2>
				<form action="../model/handle__sign_in.php" method="post" name="sign_in" enctype="multipart/form-data">
					<div class="input-box">
						<label for="account_name">Account name</label>
						<input id="account_name__sign_in" type="text" name="account_name__sign_in">
						<p style="color:red;margin-top: 5px;font-size: 1.5rem;" class="error_message"><?php echo $not_found;?></p>
					</div>
					<div class="input-box">
						<label for="password">Password</label>
						<input id="password__sign_in" type="password" name="password__sign_in">
						<p style="color:red;margin-top: 5px;font-size: 1.5rem;" class="error_message"><?php echo $error_password_element;?></p>
					</div>
					<div class="wrapper_forgot">
						<div class="forgot aline">
							<span style="text-align: center;" class="forgot_span">Don't have an account?</span>
						</div>
						<div class="forgot_password aline">
							<a style="text-align: center;" href="../controller/forgot_password.php">Forgot the password?</a>
						</div>
					</div>
					<button class="btn btn_sign" type="submit" name="submit_btn" value="Submit">
						<span class="show_hide--btn">Submit</span>
						<div class="dots">
							<div class="dot"></div>
							<div class="dot"></div>
							<div class="dot"></div>
						</div>
					</button>
					<p></p>
				</form>
			</div>
			<div class="form sign_up">
				<h2>Sign up</h2>
				<form action="../model/handle__sign_up.php" method="post" name="sign_up" enctype="multipart/form-data">
					<div class="input-box">
						<label for="account_name">Account name</label>
						<input id="account_name__sign_up" type="text" name="account_name__sign_up">
						<p style="font-size: 1.6rem;color: red;margin-top: 8px;" class="error_message"><?php echo $account_exist_element;?></p>
					</div>
					<div class="input-box">
						<label for="username">Username</label>
						<input id="username__sign_up" type="text" name="username__sign_up">
						<p class="error_message"></p>
					</div>
					<div class="input-box">
						<label for="email">Email</label>
						<input id="email__sign_up" type="email" name="email__sign_up">
						<p style="font-size: 1.6rem;color: red;margin-top: 8px;" class="error_message"><?php echo $email_exist_element;?></p>
					</div>
					<div class="input-box">
						<label for="password">Password</label>
						<input id="password__sign_up" type="password" name="password__sign_up">
						<p class="error_message"></p>
					</div>
					<div class="input-box">
						<label for="re_password">Confirm password</label>
						<input id="re_password__sign_up" type="password" name="re_password">
						<p class="error_message"></p>
					</div>
					<div class="input-box">
						<label for="image">Choose image</label>
						<input id="image" name="image" type="file">
						<p class="error_message"></p>
					</div>
					<div class="has_account">
						<p>You have account? <span class="have_account">click here</span></p>
					</div>
					<button class="btn btn_sign_up" type="submit" name="submit_btn__sign_up" value="Submit__sign_up">
						<span class="show_hide--btn">Submit</span>
						<div class="dots">
							<div class="dot"></div>
							<div class="dot"></div>
							<div class="dot"></div>
						</div>
					</button>

				</form>
			</div>
			<div class="overlay">
				<img src="../asset/imgs/Gotham_night.jpg" alt="">
			</div>
		</div>
	</main>
	<script src="../asset/javascript/sign_in__sign_up.js?v= <?php echo time(); ?>"></script>

</body>

