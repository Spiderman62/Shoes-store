<?php
includeCss('../asset/css/adminstrators_analytics.css')
?>
<div class="adminstrators_analytics">
	<div class="countAll">
		<div style="background-color: rgb(58 83 168);" class="item">
			<div class="col-left">
				<h1>Sản phẩm</h1>
				<?php
					require_once "../model/connect_database.php";
					$getTotalProducts = "SELECT count(*) as total_products FROM products";
					$convertTotalProducts = mysqli_fetch_assoc($connect->query($getTotalProducts))['total_products'];
				?>
				<p class="data-return"><?php echo $convertTotalProducts?></p>
			</div>
			<div class="col-right">
				<i class='bx bx-archive'></i>
			</div>
		</div>
		<div style="background-color: rgb(209 120 64);" class="item">
			<div class="col-left">
				<h1>Danh mục</h1>
				<?php
					$getTotalCategories = "SELECT count(*) as total_categories FROM categories";
					$convertTotalCategories = mysqli_fetch_assoc($connect->query($getTotalCategories))['total_categories'];
				?>
				<p class="data-return"><?php echo $convertTotalCategories;?></p>
			</div>
			<div class="col-right">
				<i class='bx bx-category'></i>
			</div>
		</div>
		<div style="background-color: rgb(63 164 69);" class="item">
			<div class="col-left">
				<h1>Khách hàng</h1>
				<?php
					$getTotalUser = "SELECT count(*) as total_user FROM users WHERE role = 'user'";
					$convertTotaluser = mysqli_fetch_assoc($connect->query($getTotalUser))['total_user'];
				?>
				<p class="data-return"><?php echo $convertTotaluser;?></p>
			</div>
			<div class="col-right">
				<i class='bx bx-user'></i>
			</div>
		</div>
		<div style="background-color: rgb(95 28 233);" class="item">
			<div class="col-left">
				<h1>Đơn hàng</h1>
				<?php
					$getTotalOrder = "SELECT count(*) as total_order_detail FROM order_detail";
					$convertTotalOrder = mysqli_fetch_assoc($connect->query($getTotalOrder))['total_order_detail'];
				?>
				<p class="data-return"><?php echo $convertTotalOrder;?></p>
			</div>
			<div class="col-right">
				<i class='bx bx-cube'></i>
			</div>
		</div>
	</div>
	<div class="chart">
		<div class="charts-card">
			<h2 class="chart-title">Top 10 sản phẩm nhiều lượt xem nhất</h2>
			<div id="bar-chart">
				<canvas id="myChart"></canvas>
			</div>
			<div id="bar-chart-products">
			<h2 class="chart-title">Giá tiền lớn nhất và nhỏ nhất từng danh mục</h2>
			<canvas id="myMaxMin"></canvas>
				
			</div>
			<div id="bar-chart-avg">
			<h2 class="chart-title">Giá tiền trung bình từng sản phẩm</h2>
			<canvas id="myAverage"></canvas>

			</div>
		</div>
		<div class="charts-card">
			<h2 class="chart-title">Thống kê đơn hàng</h2>
			<div id="area-chart">
				<canvas id="orderChart"></canvas>

			</div>
		</div>
	</div>

</div>
<?php
includeJavascript('../asset/javascript/administrators_analytics.js')
?>