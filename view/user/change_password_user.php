<?php
if (isset($_GET['type'])) {
	$type = $_GET['type'];
	switch ($type) {
		case "success":
			echo "<script>alert('Change password success')</script>";
			break;
		case "not_found":
			echo "<script>alert('Password current not exactly')</script>";
			break;
	}
}
includeCss("../asset/css/change_password_user.css");
?>
<style>
	header{
		display: none;
	}
	footer{
		display: none;
	}
</style>
<div class="body">
	<h1>Đổi mật khẩu</h1>
	<a href="../controller/index.php?role=user&route=profile_user">Quay lại</a>
	<main>
		<div class="wrapper">
			<form action="../model/user/handle_change_password.php" method="post">
				<div class="input-box ">
					<label for="currentPassword">Nhập mật khẩu hiện tại</label>
					<input id="currentPassword" name="currentPassword" type="password">
					<div class="error_message"></div>
				</div>
				<div class="input-box">
					<label for="newPassword">Nhập mật khẩu mới</label>
					<input id="newPassword" name="newPassword" type="password">
					<div class="error_message"></div>
				</div>
				<div class="input-box">
					<label for="repeatPassword">Nhập lại mật khẩu mới</label>
					<input id="repeatPassword" type="password">
					<div class="error_message"></div>
	
				</div>
				<input type="submit" name="submit" value="Lưu thay đổi">
			</form>
		</div>
	</main>
</div>
<?php
includeJavascript("../asset/javascript/change_password_user.js");
?>