<?php
$duplicate = "";
	if(isset($_GET['duplicate'])){
		$duplicate = "Không cho phép trùng danh mục";
	};
?>
<?php
	includeCss("../asset/css/administrators_add_category.css");
?>
<style>
	header{
		display: none;
	}
	main{
		display: flex;
		justify-content: center;
		align-items: center;
		background: unset;
	}
	
</style>
	<div class="wrapper">
		<h1>Category</h1>
		<a href="../controller/index.php?role=admin&route=administrators_category_manager">Your category</a>
		<form id="form" action="../model/admin/category/handle_add_category.php" method="post" enctype="multipart/form-data">
				<div class="input-box">
					<label for="name_category">Category Name</label>
					<input id="name_category" type="text" name="name_category">
					<span style="color:red" class="error_message"><?php echo $duplicate;?></span>
				</div>
				<div class="input-box">
				
				<div class="input-box">
					<select name="select" id="">
				<?php 
				require_once "../model/connect_database.php";
				$sql = "SELECT * FROM users WHERE role = 'admin'";
				$admins = $connect->query($sql);
				if(mysqli_num_rows($admins) > 0){
					for($i = 0;$i < mysqli_num_rows($admins);$i++){
						$row = mysqli_fetch_assoc($admins);
						$ID = $row['ID'];
						$account = $row['account'];
				?>
						<option value="<?php echo $ID;?>"><?php echo $account;?></option>
						<?php }}?>
					</select>
				</div>
				<input id="submit" type="submit" value="Submit">

		</form>
	</div>
	<?php
		includeJavascript("../asset/javascript/administrators_add_category.js");
	?>