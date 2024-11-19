<?php
includeCss('../asset/css/header_admin.css');
?>
<header>
	<div class="wrapper_header_admin">
		<a href="../controller/index.php?role=admin&route=unset" class="turn-back nav_admin">Đăng xuất</a>
		<a href="../controller/index.php?role=admin&route=adminstrators" class="user_manager nav_admin">Người dùng</a>
		<a href="../controller/index.php?role=admin&route=administrators_category_manager" class="category_manager nav_admin">Quản lý danh mục</a>
		<a href="../controller/index.php?role=admin&route=administrators_product_manager" class="product_manager nav_admin">Quản lý sản phẩm</a>
		<a href="../controller/index.php?role=admin&route=administrators_comment_manager" class="comment_manager nav_admin">Quản lý bình luận</a>
		<a href="../controller/index.php?role=admin&route=adminstrators_order_manager" class="order_manager nav_admin">Quản lý đơn hàng</a>
		<a href="../controller/index.php?role=admin&route=adminstrators_analytics" class="analytics nav_admin">Thống kê</a>
	</div>
</header>