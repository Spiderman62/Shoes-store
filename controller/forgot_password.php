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
<?php
	include_once "../view/forgot_password.php";
	function includeJavascript($path)
	{
		echo '<script src="' . $path . "?v=" . time() . '"></script>';
	};
?>
