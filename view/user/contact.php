<?php
// session_start();
// if (!isset($_SESSION['account'])) {
// 	header('location: ../frontend/index.php?page_layout=sign_in__sign_up&remove_home=remove_home');
// }
includeCss("../asset/css/loader.css");
?>
	<main class="contact ">
		<section>
			<div class="grid">
				<div class="contact_us">
					<div class="item reveal">
						<span>
							<i class='bx bxs-map'></i>
						</span>
						<strong>Address:<p> 198 West 21th Street, Suite 721 New York NY 10016</p></strong>
					</div>
					<div class="item reveal1">
						<span>
							<i class='bx bxs-phone'></i>
						</span>
						<strong>Phone:<p> + 1235 2355 98</p></strong>
					</div>
					<div class="item reveal2">
						<span>
							<i class='bx bxs-paper-plane'></i>
						</span>
						<strong>Email:<p> info@yoursite.com</p></strong>
					</div>
					<div class="item reveal3">
						<span>
							<i class='bx bx-globe'></i>
						</span>
						<strong>Website:<p> shoes/store.com</p></strong>
					</div>
				</div>
				<div class="contact_maps reveal">
					<div class="box-left">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1015.4437489610151!2d108.16973475610949!3d16.075590488980406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219b509a30cfb%3A0xb93a05e26b3b28ff!2zUGjhu5UgdGjDtG5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYyDEkMOgIE7hurVuZw!5e0!3m2!1sen!2s!4v1706524716261!5m2!1sen!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					<div class="box-right">
						<h1 class="reveal_right">Contact Us</h1>
						<div class="input-box-half">
							<div class="input-box-half--left reveal_right1">
								<p>FULL NAME</p>
								<input type="text" placeholder="Name">
							</div>
							<div class="input-box-half--right reveal_right2">
								<p>EMAIL ADDRESS</p>
								<input type="email" placeholder="Email">
							</div>

						</div>
						<div class="input-box reveal_right2">
							<p>SUBJECT</p>
							<input type="text" placeholder="Subject">
						</div>
						<div class="input-box reveal_right2">
							<p>MESSAGE</p>
							<textarea name="" id="" cols="30" rows="6" placeholder="Message"></textarea>
						</div>
						<button class="reveal_right2">Send Message</button>
					</div>
				</div>
			</div>
			<div class="grid">
				<div class="drag_drop">
					<div class="container">
						<img src="../asset/imgs/boots.jpg" alt="">
					</div>
					<div class="container">
						<img src="../asset/imgs/purple_shoes_col.jpg" alt="">

					</div>
					<div class="container">


					</div>
					<div class="container">


					</div>

				</div>
			</div>
			<div class="grid">
				<div class="local_storage">
					<div class="get_areaInput">
						<form action="" id="form-2">
							<h1>Customer</h1>
							<div class="input-box">
								<label for="username-2">UserName</label>
								<input name="username_2" id="username-2" type="text">
								<p class="error_message-2"></p>
							</div>
							<div class="input-box">
								<label for="email-2">Email</label>
								<input name="email_2" id="email-2" type="email">
								<p class="error_message-2"></p>

							</div>
							<div class="input-box">
								<label for="password-2">Password</label>
								<input name="password_2" id="password-2" type="password">
								<p class="error_message-2"></p>
							</div>
							<div class="input-box">
								<label for="re_password-2">Confirm password</label>
								<input name="re_password_2" id="re_password-2" type="password">
								<p class="error_message-2"></p>
							</div>
							<div class="input-box">
								<label for="typeShoes-2">What kind of shoes do you want?</label>
								<input name="typeShoes_2" id="typeShoes-2" type="text">
								<p class="error_message-2"></p>

							</div>
							<div class="wrapper_btn">
								<button class="submit-2">Submit</button>
							</div>
					</div>
					</form>
					<div class="render_areaOutput">
						<h1>Customer lists</h1>
						<div class="render_datas">


						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	
	<div class="loader">
		<div class="loader-inner">
			<div class="loader-line-wrap">
				<div class="loader-line"></div>
			</div>
			<div class="loader-line-wrap">
				<div class="loader-line"></div>
			</div>
			<div class="loader-line-wrap">
				<div class="loader-line"></div>
			</div>
			<div class="loader-line-wrap">
				<div class="loader-line"></div>
			</div>
			<div class="loader-line-wrap">
				<div class="loader-line"></div>
			</div>
		</div>
	</div>
	<?php
		includeJavascript("../asset/javascript/contact.js");
	?>
	
