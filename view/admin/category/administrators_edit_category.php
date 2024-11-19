<?php
	require_once "../model/connect_database.php";
	$ID = $_GET['ID'];
	$sql = "SELECT * FROM categories WHERE ID = $ID";
	$categories = $connect->query($sql);
	$row = mysqli_fetch_assoc($categories);
	$ID = $row['ID'];
	$name_category = $row['name_category'];
	$create_date = $row['create_date'];
	$user_ID = $row['user_ID'];
?>
<?php
	includeCss("../asset/css/administrators_edit_category.css");
?>
<style>
	header{
		display: none;
	}
</style>
		<a class="turn-back" href="../controller/index.php?role=admin&route=administrators_category_manager">Quay lại</a>
		<div class="wrapper">
			<h1>Edit category</h1>
			<form action="../model/admin/category/handle_update_category.php" method="post">
			<input hidden type="text" name="ID" value="<?php echo $ID;?>">
				<div class="input-box">
					<label for="ID">ID</label>
					<input disabled type="text" id="ID" value="<?php echo $ID;?>">
					<span class="error_message"></span>
				</div>
				<div class="input-box">
					<label for="name_category">Name category</label>
					<input name="name_category" type="text" id="name_category" value="<?php echo $name_category;?>">
					<span class="error_message"></span>
				</div>
				
				<div class="input-box">
					<label for="create_date">Create date</label>
					<input name="create_date" type="text" id="create_date" value="<?php echo $create_date;?>">
					<span class="error_message"></span>
				</div>
				<div class="input-box">
					<label for="user_ID">User ID</label>
					<select name="select" id="user_ID">
						<?php
						$sql = "SELECT * FROM users WHERE role = 'admin'";
						$admins = $connect->query($sql);
						if(mysqli_num_rows($admins) > 0){
							for($i = 0;$i < mysqli_num_rows($admins);$i++){
								$row = mysqli_fetch_assoc($admins);
								$ID = $row['ID'];
						?>
						<option value="<?php echo $ID?>" <?php if($ID === $user_ID) echo "selected"?>><?php echo $ID?></option>
						<?php 	}
						}?>
					</select>
				</div>
						<input class="submit" type="submit" name="submit" value="Submit">
			</form>
		</div>
	<?php
		includeJavascript("../asset/javascript/administrators_update_category.js");
	?>

