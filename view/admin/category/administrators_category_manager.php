<?php
	includeCss("../asset/css/administrator_category_manager.css");
?>
		<a class="add" href="../controller/index.php?role=admin&route=administrators_add_category">Add category</a>
		
		<div class="wrapper-action">
			<label for="action">Action: </label>
			<select class="action" name="action" id="action">
				<option value="">-- Action --</option>
				<option value="delete">-- Delete --</option>
			</select>
			<p class="handle-submit-action">Submit</p>
		</div>
		<form action="../model/admin/category/handle_delete_category_checkbox.php" method="post" class="wrapper">
			<div class="titles">
				<p><input class="checkbox" type="checkbox"></p>
				<p>ID</p>
				<p>Name category</p>
				<p>Create date</p>
				<p>User ID</p>
				<p></p>
				<p></p>
			</div>
			<div class="categories">
			<?php
				require_once "../core/Admin.php";
				$admin = new Admin();
				$categories = $admin->getData("SELECT * FROM categories");
				if(mysqli_num_rows($categories) > 0){
					for($i = 0;$i < mysqli_num_rows($categories);$i++){
						$row = mysqli_fetch_assoc($categories);
						$ID = $row['ID'];
						$name_category = $row['name_category'];
						$create_date = $row['create_date'];
						$user_ID = $row['user_ID'];
				
			?>
				<div class="component">
					<p><input type="checkbox" class="checkbox_array" name="checkbox_array[]" value="<?php echo $ID;?>"></p>
					<p><?php echo $ID;?></p>
					<p><?php echo $name_category;?></p>
					<p><?php echo $create_date;?></p>
					<p><?php echo $user_ID;?></p>
					<p><a href="../controller/index.php?role=admin&route=administrators_edit_category&ID=<?php echo$ID;?>"><i class="edit fa-solid fa-pen-to-square"></i></a></p>
					<p class="trash_ID" data-id="<?php echo $ID;?>"><i class="trash fa-solid fa-trash"></i></p>
				</div>
				<?php }}?>
				

			</div>
			
		</form>
	</main>
	<div class="popup">
		<div class="wrapper_popup">
			<p class="caution">Are you sure want to delete this data?</p>
			<div class="choose-method--delete">
				<p class="cancel">Cancel</p>
				<p class="delete">Delete</p>
			</div>
		</div>
	</div>
	<form class="delete_ID" action="../model/admin/category/handle_delete_category_ID.php" method="post">
		<input hidden name="ID" type="text" value="">
	</form>
	<?php
		includeJavascript("../asset/javascript/administrators_category_manager.js");
	?>

