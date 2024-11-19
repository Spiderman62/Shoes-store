<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="../asset/javascript/jQuery.js"></script>
	<?php
	function includeCss($path)
	{
		echo '<link rel="stylesheet" href="' . $path . "?v=" . time() . '">';
	};
	?>
</head>
<style>
	main {
		position: relative;
		height: 100vh;
		background: #2980b9;
		background: -webkit-linear-gradient(to right, #2c3e50, #2980b9);
		background: linear-gradient(to right, #2c3e50, #2980b9);
	}
</style>

<body>
	<main>
		<?php
		include_once "../layout/header_admin.php";
		?>
		<?php
		if (isset($_GET['route'])) {
			switch ($_GET['route']) {
				case "adminstrators_order_manager":
					include_once "../view/admin/order/adminstrators_order_manager.php";
					break;
				case "administrators_update_order":
					include_once "../view/admin/order/administrators_update_order.php";
					break;
				case "administrators_category_manager":
					include_once "../view/admin/category/administrators_category_manager.php";
					break;
				case "administrators_add_category":
					include_once "../view/admin/category/administrators_add_category.php";
					break;
				case "administrators_edit_category":
					include_once "../view/admin/category/administrators_edit_category.php";
					break;
				case "administrators_product_manager":
					include_once "../view/admin/product/administrators_product_manager.php";
					break;
				case "administrators_add_product":
					include_once "../view/admin/product/administrators_add_product.php";
					break;
				case "administrators_edit_product":
					include_once "../view/admin/product/administrators_edit_product.php";
					break;
				case "administrators_delete_product":
					include_once "../view/admin/product/administrators_delete_product.php";

					break;
				case "unset":
					header('location: ../model/log_out.php');
					break;
				case "administrators":
					include_once "../view/admin/user/administrators.php";
					break;
				case "administrator_edit":
					include_once "../view/admin/user/administrators_update.php";
					break;
				case "administrators_delete":
					include_once "../view/admin/user/administrators_delete.php";
					break;
				case "administrators_comment_manager":
					include_once "../view/admin/comment/administrators_comment_manager.php";
					break;
				case "administrators_detail_comment":
					include_once "../view/admin/comment/administrators_detail_comment.php";
					break;
				case "adminstrators_analytics":
					include_once "../view/admin/analytics/adminstrators_analytics.php";
					break;
				default:
					include_once "../view/admin/user/administrators.php";
			}
		} else {
			include_once "../view/admin/user/administrators.php";
		}
		?>
	</main>

	<?php
	function includeJavascript($path)
	{
		echo '<script src="' . $path . "?v=" . time() . '"></script>';
	};
	?>
</body>

</html>