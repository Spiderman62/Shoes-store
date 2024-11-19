<?php

if (!isset($_SESSION['account'])) {
	header('location: ../view/sign_in__sign_up.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../asset/css/style.css?v= <?php echo time(); ?>">
	<link rel="stylesheet" href="../asset/css/responsive.css?v= <?php echo time(); ?>">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<?php
	function includeCss($path)
	{
		echo '<link rel="stylesheet" href="' . $path . "?v=" . time() . '">';
	};
	?>
</head>

<body>
	<main>

		<?php
		include_once "../layout/header.php";
		?>
		
		<?php
		if (isset($_GET['route'])) {
			switch ($_GET['route']) {
				case "about":
					include_once "../view/user/about.php";
					break;
				case "cart":
					include_once "../view/user/cart.php";
					break;
				case "product":
					include_once "../view/user/product.php";
					break;
				case "product_detail":
					include_once "../view/user/product_detail.php";
					break;
				case "home":
					include_once "../view/user/home.php";
					break;
				case "blog":
					include_once "../view/user/blog.php";
					break;
				case "contact":
					include_once "../view/user/contact.php";
					break;
				case "order":
					include_once "../view/user/order.php";
					break;
				case "pay_method":
					include_once "../view/user/pay_method.php";
					break;
				case "update_user_detail":
					include_once "../view/user/update_user_detail.php";
					break;
				case "delete_order":
					include_once "../view/user/delete_order.php";
					break;
				case "profile_user":
					include_once "../view/user/profile_user.php";
					break;
				case "change_password_user":
					include_once "../view/user/change_password_user.php";
					break;
				default:
					include_once "../view/user/home.php";
			}
		} else {
			include_once "../view/user/home.php";
		}
		?>
		<?php
		include_once "../layout/footer.php";
		?>
	</main>
	<!-- <div class="loading">
		<img src="../asset/imgs/spider_sky.webp" alt="">
	</div> -->




	<?php
	function includeJavascript($path)
	{
		echo '<script src="' . $path . "?v=" . time() . '"></script>';
	};
	?>
</body>

</html>