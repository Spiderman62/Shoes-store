<?php
	$ID = $_GET['ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	header{
		display: none;
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

	<div class="wrapper">
		<h1 style="color: white;">Bạn có chắc chắn muốn xoá ID: <?php echo $ID?></h1>
		<div class="controls">
			<a href="../controller/index.php?role=admin&route=administrators">Cancel</a>
			<a href="../model/admin/user_manager/handle_administrators_delete.php?ID=<?php echo $ID?>">Delete</a>
		</div>
	</div>

</html>