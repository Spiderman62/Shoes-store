<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once "./connect_database.php";
if (isset($_POST['submit'])) {
	$email = $_POST['email_forgot'];
	$query = "SELECT * from users WHERE user_email = '$email'";
	$find_email = $connect->query($query);
	if (mysqli_num_rows($find_email) > 0) {
		$row = mysqli_fetch_array($find_email);
		$email = $row['user_email'];
		$password = $row['user_password'];
		require_once "./PHPMailer/src/Exception.php";
		require_once "./PHPMailer/src/PHPMailer.php";
		require_once "./PHPMailer/src/SMTP.php";	
			$mail = new PHPMailer(true);
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = "hoangnlpd09770@fpt.edu.vn";
			$mail->Password = "tttv fmok txsh ivae";
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			$mail->addAddress($email);
			$mail->isHTML(true);
			$mail->Subject ="Your request to retrieve your password has been approved by Nguyen Lam Hoang";
			$mail->Body = "Your password is: " . $password;
			$mail->send();
		header('location: ../controller/forgot_password.php?send_email=send_email');
			
	} else {
		sleep(1);
		header('location: ../controller/forgot_password.php?email_exist=email_exist');
	}
}
