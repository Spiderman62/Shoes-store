<?php
require_once "../model/connect_database.php";


$ID = $_GET['ID'];
$sql = "SELECT * FROM users WHERE ID = $ID";

$get_data = $connect->query($sql);
$row = mysqli_fetch_array($get_data);
$ID = $row['ID'];
$account = $row['account'];
$user_name = $row['user_name'];
$user_email = $row['user_email'];
$user_password = $row['user_password'];
$status = $row['status'];
$create_date = $row['create_date'];

?>
<style>
	header{
		display: none	;
	}
</style>
<?php
	includeCss("../asset/css/administrators_update.css");
?>
	<div class="wrapper">
		<h1>Edit user</h1>
		<a href="../controller/index.php?role=admin&route=administrators">Quay lại</a>
		<form action="../model/admin/user_manager/handle_administrators_update.php" method="post" enctype="multipart/form-data" id="form_update">

			<div class="input-box">
				<label for=">account">Account</label>
				<input id="account" type="text" name="account" value="<?php echo $account; ?>">
				<span class="error_message"></span>
			</div>
			<div class="input-box">
				<label for="username">Username</label>
				<input id="username" type="text" name="username" value="<?php echo $user_name; ?>">
				<span class="error_message"></span>

			</div>
			<div class="input-box">
				<label for="email">Email</label>
				<input id="email" type="text" name="email" value="<?php echo $user_email; ?>">
				<span class="error_message"></span>

			</div>
			<div class="input-box">
				<label for="password">Password</label>
				<input id="password" type="text" name="password" value="<?php echo $user_password; ?>">
				<span class="error_message"></span>

			</div>
			<div class="input-box">
				<label for="status">Status</label>
				<input id="status" type="text" name="status" value="<?php echo $status; ?>">
				<span class="error_message"></span>

			</div>
			<div class="input-box">
				<label for="date">Date</label>
				<input id="date" type="text" name="date" value="<?php echo $create_date; ?>">
				<span class="error_message"></span>

			</div>

			<button type="submit" name="submit" value="<?php echo $ID; ?>">Update</button>
		</form>
	</div>
	<?php
		includeJavascript("../asset/javascript/administrators_update.js");
	?>

