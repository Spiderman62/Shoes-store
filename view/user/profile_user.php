<?php

$account_session = $_SESSION['account'];
require_once "../model/connect_database.php";
includeCss("../asset/css/profile_user.css");
?>
<style>
	header{
		display: none;
	}
	footer{
		display: none;
	}
	
</style>


	<h1>Thông tin tài khoản</h1>
	<a href="../controller/index.php?role=user&route=home">Quay lại</a>
	<div class="profile_user-main">
		<div class="wrapper">
			<div class="wrapper-infor">
				<h1>Thông tin cá nhân</h1>
				<div class="infor-important">
					<?php
					$query = "SELECT * FROM users WHERE account = '$account_session'";
					$get_user = $connect->query($query);
					$row = mysqli_fetch_assoc($get_user);
					$account = $row['account'];		
					$username = $row['user_name'];		
					$email = $row['user_email'];	
					$image = $row['image'];	
					?>
					<div class="image">
						<img src="../asset/tmp_image/<?php echo $image;?>" alt="">
					</div>
					<div class="infor-detail">
						<p>Tên tài khoản: <span><?php echo $account;?></span></p>
						<p>Tên người dùng: <span><?php echo $username?></span></p>
						<p>Email: <span><?php echo $email;?></span></p>
					</div>
				</div>
				<?php
					$query = "SELECT user_detail.username,user_detail.address,user_detail.number_phone FROM users INNER JOIN user_detail on user_detail.user_ID = users.ID WHERE users.account = '$account_session'";
					$get_user_detail = $connect->query($query);
					$row = mysqli_fetch_assoc($get_user_detail);
					if(isset($row)){
						$username_detail = $row['username'];
						$address = $row['address'];
						$number_phone = $row['number_phone'];
					}
				?>
				<div class="infor-address--security">
					<?php
						if(mysqli_num_rows($get_user_detail) > 0){	
					?>
					<div class="phone">
						<h1>Số điện thoại</h1>
						<div class="phone-detail">
							<div>
								<i class="fa-solid fa-phone"></i>
								<div class="number--phone">
									<h1>Số điện thoại</h1>
									<p><?php echo $number_phone;?></p>
								</div>
							</div>
							<div class="update">
								<a href="">Cập nhật</a>
							</div>
						</div>
					</div>
					<?php }else{?>
						<div class="phone">
						<h1>Số điện thoại</h1>
						<div class="phone-detail">
							<div>
								<i class="fa-solid fa-phone"></i>
								<div class="number--phone">
									<h1>Số điện thoại</h1>
									<p>Chưa có số</p>
								</div>
							</div>
							<div class="update">
								<a href="">Cập nhật</a>
							</div>
						</div>
					</div>
						<?php }?>
						<?php
						if(mysqli_num_rows($get_user_detail) > 0){	
						?>
					<div class="phone">
						<h1>Địa chỉ giao hàng</h1>
						<div class="phone-detail">
							<div>
								<i class="fa-solid fa-location-dot"></i>
								<div class="number--phone">
									<h1>Địa chỉ</h1>
									<p><?php echo $address;?></p>
								</div>
							</div>
							<div class="update">
								<a href="">Cập nhật</a>
							</div>
						</div>
					</div>
					<?php }else{?>
						<div class="phone">
						<h1>Địa chỉ giao hàng</h1>
						<div class="phone-detail">
							<div>
								<i class="fa-solid fa-location-dot"></i>
								<div class="number--phone">
									<h1>Địa chỉ</h1>
									<p>Không có địa chỉ</p>
								</div>
							</div>
							<div class="update">
								<a href="">Cập nhật</a>
							</div>
						</div>
					</div>
						<?php }?>
					<div class="securty">
						<h1>Bảo mật</h1>
						<div class="hide-password">
							<div class="wrapper-password">
								<i class="fa-solid fa-lock"></i>
								<h1>Đổi mật khẩu</h1>
							</div>
							<div class="update">
								<a href="../controller/index.php?role=user&route=change_password_user">Cập nhật</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
