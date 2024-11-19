<?php
	$ID = $_GET['ID'];
?>
<style>
	header{
		display: none;
	}
	footer{
		display: none;
	}
	.wrapper{
		height: 100vh;
		display: flex;
		justify-content:center;
		align-items: center;
	}
	.wrapper::-webkit-scrollbar{
		display: none;
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
		font-size: 2.0rem;

		&:hover{
			box-shadow: 0px 0px 0px 0px gray;
			transform: translate(2px,2px);
		}
	}
	h1{
		user-select: none;
		font-size: 3.0rem;
		margin-right: 20px;
	}
</style>

	<div class="wrapper">
		<h1>Bạn có chắc chắn muốn huỷ ID: <?php echo $ID?></h1>
		<div class="controls">
			<a href="../controller/index.php?role=user&route=order">Cancel</a>
			<a href="../model/user/handle_delete_order.php?ID=<?php echo $ID?>">Delete</a>
		</div>
	</div>
