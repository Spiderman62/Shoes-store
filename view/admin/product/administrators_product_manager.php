<?php
	includeCss("../asset/css/administrator_product_manager.css");
?>

		<a class="add_product" href="../controller/index.php?role=admin&route=administrators_add_product">Add product</a>
		<div class="manager_user">
			<div class="column">
				<p><input type="checkbox"></p>
				<p>ID</p>
				<p>IMAGE</p>
				<p>NAME PRODUCTS</p>
				<p>DESCRIPTION</p>
				<p>PRICE</p>
				<p>DATE</p>
				<p>USER ID</p>
				<p>CATEGORY ID</p>

				
			</div>
			<div class="container">

			
			<?php
			require_once "../core/Admin.php";
			$admin = new Admin();
			$dataProducts = $admin->getData("SELECT * FROM products");
			if(mysqli_num_rows($dataProducts) > 0){
				for($i = 0;$i < mysqli_num_rows($dataProducts);$i++){
					$row = mysqli_fetch_array($dataProducts);
					$ID = $row['ID'];
					$name_category = $row['product_name'];
					$image = $row['image'];
					$price = $row['price'];
					$create_date = $row['create_date'];
					$description = $row['description'];
					$category_ID = $row['category_ID'];
					$user_ID = $row['user_ID'];
					$my_folder ="../asset"."/image_products";
			?>
			<div class="component">
				<p><input type="checkbox" name="checkbox_array[]" value="<?php echo $ID;?>"></p>
				<p><?php echo $ID;?></p>
				<div class="wrapper_image">
					<img src="<?php echo $my_folder . "/" .$image;?>" alt="">
				</div>
				<p><?php echo $name_category;?></p>
				<p><?php echo $price;?></p>
				<p><span class="description"><?php echo $description;?></span></p>
				<p><?php echo $create_date;?></p>
				<p><?php echo $user_ID;?></p>
				<p><?php echo $category_ID;?></p>
				<p class="edit"><a href="../controller/index.php?role=admin&route=administrators_edit_product&ID=<?php echo $ID?>"><i class="fa-solid fa-pen-to-square"></i></a></p>
				<p class="delete"><a href="../controller/index.php?role=admin&route=administrators_delete_product&ID=<?php echo$ID;?>"><i class="fa-solid fa-trash"></i></a></p>
			</div>
			<?php }}?>
			</div>
		</div>
