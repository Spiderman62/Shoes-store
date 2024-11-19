<?php
require_once "../../connect_database.php";

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER['REQUEST_METHOD'] == "GET") {
	$ID = $_GET['ID'];
	$SQL = "SELECT products.product_name as product_name,
	order_detail.quantity as quantity,
	order_detail.status as status,
	products.price as price,
	user_detail.username as username,
	user_detail.address as address,
	user_detail.number_phone as number_phone,
	users.user_email as email,
	categories.name_category as name_category
	FROM order_detail 
	INNER JOIN products ON products.ID = order_detail.product_ID 
	INNER JOIN user_detail on user_detail.ID = order_detail.user_detail_ID 
	INNER JOIN users on users.ID = user_detail.user_ID 
	INNER JOIN categories ON categories.ID = products.category_ID 
	WHERE order_detail.ID = $ID;";
	$row = mysqli_fetch_assoc($connect->query($SQL));
	$product_name = $row['product_name'];
	$quantity = $row['quantity'];
	$status = $row['status'];
	$price = $row['price'];
	$username = $row['username'];
	$address = $row['address'];
	$number_phone = $row['number_phone'];
	$email = $row['email'];
	$name_category = $row['name_category'];
	require_once "../../PHPMailer/src/Exception.php";
	require_once "../../PHPMailer/src/PHPMailer.php";
	require_once "../../PHPMailer/src/SMTP.php";
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
	$mail->Subject = "Shoes Store company would like to send you a notification about your order";
	$mail->Body = "<h2>Thông báo về đơn hàng của bạn</h2>
	<p>Xin chào <strong>$username</strong>,</p>
	<p>Công ty Shoes Store muốn gửi bạn thông báo về đơn hàng của bạn.</p>
	<table> 
	<tr> 
	<th>Sản phẩm</th>
	 <th>Số lượng</th>
	  <th>Trạng thái</th>
	   <th>Giá</th> 
	   </tr> 
	   <tr> 
	   <td>$product_name</td>
	    <td>$quantity</td> 
		<td>$status</td> 
		<td>$price</td> 
		</tr> </table> 
		<p>Địa chỉ giao hàng: $address</p>
		 <p>Số điện thoại: $number_phone</p>
		  <p>Danh mục: $name_category</p> 
		  <p>Nếu bạn có bất kỳ thắc mắc hoặc yêu cầu nào, vui lòng liên hệ với chúng tôi theo địa chỉ email: $email.</p> <p>Trân trọng,
		  <br> Đội ngũ Shoes Store</p> ";
	$mail->send();
	sleep(1);
	header('location: ../../../controller/index.php?role=admin&route=adminstrators_order_manager');
}
