<header>
				<div class="header_top">
					<div class="grid">
						<div class="contact_information">
							<p><i class='bx bxs-phone'></i>+00 1234 567</p>
							<p><i class='bx bxs-paper-plane'></i>aztenderio7146@gmail.com</p>
						</div>
						<div class="sign_in--sign_up">
							<div class="icons">
								<i class='bx bxl-facebook'></i>
								<i class='bx bxl-twitter'></i>
								<i class='bx bxl-instagram'></i>
								<i class='bx bxl-dribbble'></i>
							</div>
							<div class="wrapper_image_user">
								<?php
								require_once "../model/connect_database.php";
								$account = $_SESSION['account'];
								$query = "SELECT * FROM users WHERE account = '$account'";
								$get_data_user = $connect->query($query);
								$row = mysqli_fetch_assoc($get_data_user);
								$image = $row['image'];
								?>
								<img src="../asset/tmp_image/<?php echo $image ?>" alt="">
								<ul>
									<li><a href="../controller/index.php?role=user&route=profile_user&remove_home=remove_home">Profile</a></li>
									<li><a href="../model/log_out.php">SIGN OUT</a></li>
								</ul>
							</div>

						</div>
					</div>
					<div class="header_bottom">
						<div class="grid">
							<h1 class="logo">
								<span style="color: rgb(255, 255, 255);">SHOES</span> STORE
							</h1>
							<nav>
								<ul>
									<li class="li ">
										<a href="../controller/index.php?role=user&route=home">TRANG CHỦ</a>
									</li>
									<li class="li "><a href="../controller/index.php?role=user&route=about">VỀ CHÚNG TÔI</a></li>
									<li class="li ">DANH MỤC
										<i class='bx bx-caret-down'></i>
										<ul class="subnav">
											<?php
											
											$sql = "SELECT * FROM categories";
											$categories = $connect->query($sql);
											if (mysqli_num_rows($categories) > 0) {
												for ($i = 0; $i < mysqli_num_rows($categories); $i++) {
													$row = mysqli_fetch_array($categories);
													$ID = $row['ID'];
													$name_category = $row['name_category'];
											?>
													<li><a style="color: black;" href="../controller/index.php?role=user&route=product&category_ID=<?php echo $ID ?>"><?php echo $name_category ?></a></li>
											<?php 	}
											} ?>
										</ul>
									</li>
									<li class="li"><a href="../controller/index.php?role=user&route=blog">BLOG</a></li>
									<li class="li "><a href="../controller/index.php?role=user&route=contact">LIÊN LẠC</a></li>
									<li class="li"><a href="../controller/index.php?role=user&route=order">ĐƠN HÀNG</a></li>
									<li class="li-icon"><a style="color: rgb(162,63,37);" href="../controller/index.php?role=user&route=cart"><i class='bx bx-shopping-bag'></i></a></li>
								</ul>
							</nav>
							<div class="navigation_mobile">
								<i class="fa-solid fa-bars"></i>
							</div>
						</div>
					</div>

				</div>
			</header>