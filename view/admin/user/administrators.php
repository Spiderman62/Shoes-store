<?php
// require_once "../model/connect_database.php";
// $query = "SELECT * FROM users where role = 'user'";
// $user_datas = $connect->query($query);

?>
<?php
	includeCss('../asset/css/administrators.css');
?>
	

	
		<div class="wrapper-checkbox">
			<label for="action">Action:</label>
			<select name="action" id="action">
				<option value="">-- Choose action --</option>
				<option value="delete">-- Delete --</option>
			</select>
			<p id="submit">Submit</p>
		</div>
		<div class="manager_user">
			<div class="column">
				<p class="select-all"><input type="checkbox"></p>
				<p>ID</p>
				<p>ACCOUNT</p>
				<p>USERNAME</p>
				<p>EMAIL</p>
				<p>PASSWORD</p>
				<p>ROLE</p>
				<p>STATUS</p>
				<p>DATE</p>
			</div>
			<form action="../model/admin/user_manager/handle_delete_users_checkbox.php" method="POST" class="container">
				<?php
				require_once "../core/Admin.php";
				$admin = new Admin();
				$user_datas = $admin->getData("SELECT * FROM users WHERE role = 'user'");
				if (mysqli_num_rows($user_datas) > 0) {
					for ($i = 0; $i < mysqli_num_rows($user_datas); $i++) {
						$row = mysqli_fetch_assoc($user_datas);
						$ID = $row['ID'];
						$account = $row['account'];
						$user_name = $row['user_name'];
						$user_email = $row['user_email'];
						$user_password = $row['user_password'];
						$role = $row['role'];
						$status = $row['status'];
						$create_date = $row['create_date'];

				?>
						<div class="component">
							<input class="checkbox_array" type="checkbox" name="checkbox_array[]" value="<?php echo $ID; ?>">
							<p><?php echo $ID; ?></p>
							<p><?php echo $account; ?></p>
							<p><?php echo $user_name; ?></p>
							<p><?php echo $user_email; ?></p>
							<p><?php echo $user_password; ?></p>
							<p><?php echo $role; ?></p>
							<p><?php echo $status; ?></p>
							<p><?php echo $create_date; ?></p>
							<p class="edit"><a href="../controller/index.php?role=admin&route=administrator_edit&ID=<?php echo $ID ?>"><i class="fa-solid fa-pen-to-square"></i></a></p>
							<p class="delete"><a href="../controller/index.php?role=admin&route=administrators_delete&ID=<?php echo $ID ?>"><i class="fa-solid fa-trash"></i></a></p>
						</div>
				<?php }
				} ?>
			</form>
		</div>
	
	<?php
		includeJavascript('../asset/javascript/adminstrators_user.js');
	?>

