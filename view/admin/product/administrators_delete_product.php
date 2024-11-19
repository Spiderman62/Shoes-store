<?php
	
	$ID = $_GET['ID'];

?>

<style>
	header{
		display: none;
	}
	*{
		margin: 0;
		box-sizing: border-box;
		padding: 0;
	}
	main{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.controls{
		display: flex;
		gap: 20px;
		justify-content: center;	
	}
	.controls a:first-child{
		background-color: #1DBA53;
	}
	.controls a:last-child{
		background-color:  #D44A4A;;
	}
	a{
		border-radius: 4px;
		display: block;
		text-decoration: none;
		padding: 10px 20px;
		color: white;
		outline: none;
		box-shadow: 5px 5px 0px 1px gray;
		transition:all .15s ease-in-out;
		&:hover{
			box-shadow: 0px 0px 0px 0px gray;
			transform: translate(2px,2px);
		}
	}
</style>
<body>
	<div class="wrapper">
		<h1 style="color: white;margin-bottom: 10px;">Bạn có chắc chắn muốn xoá ID: <?php echo $ID?></h1>
		<div class="controls">
			<a href="../controller/index.php?role=admin&route=administrators_product_manager">Cancel</a>
			<a href="../model/admin/product/handle_delete_product.php?ID=<?php echo $ID?>">Delete</a>
		</div>
	</div>
</body>
</html>