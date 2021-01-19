<?php
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$document = new Dompdf();
$transactionid = $_GET['id'];
ob_start();	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Khayer Store</title>
	<link rel="icon" href="../../img/logo/logo.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<?php
	include'../includes/connection.php';
	$query = "SELECT *,DATE(date) date FROM orders_info,order_products,products WHERE orders_info.order_id = order_products.order_id and order_products.product_id=products.product_id and orders_info.order_id = '{$transactionid}'";
	$result = mysqli_query($db, $query) or die (mysqli_error($db));
	while ($row = mysqli_fetch_assoc($result)) {
		$invoicenumber = $row['order_id'];
		$name = $row['f_name'];
		$date = $row['date'];
		$pn = $row['phone'];
		$email = $row['email'];
		$date = $row['date'];
		$tid = $row['order_id'];
		$address = $row['address']." ".$row['city']." ".$row['state']." ".$row['zip'];
	}

	$get_delivery_man_name = mysqli_query($db,"SELECT name,phone_number from delivery_man,orders_info where orders_info.dm=delivery_man.id and orders_info.order_id='{$transactionid}'");
	$get_delivery_man_name = mysqli_fetch_assoc($get_delivery_man_name);


	$getinfo = mysqli_query($db,"SELECT * from info");
	$getinfo = mysqli_fetch_assoc($getinfo);

	$html = '';
	$html .='<table align="center">
	<tr><td>
	<img src="../../img/logo/logo.png" alt="logo" width="150px"><br>
	<hr>
	<p><b>Address : </b>'.$getinfo['address'].' , <b>Phone - </b>'.$getinfo['phone'].'</p>
	</td>
	</tr> </table>' ;
	$html .='<div class="container" style="width:100%;margin:auto;">

	<h2 style="padding:10px;text-align:center;background-color:#ccc;">Invoice/Bill</h2>
	<div class="row">
	<div class="left" style="width:80%;float:left;overflow:hidden;">
	<table>
	<!--<tr>
	<td><b>Order No</b></td>
	<td>SO-STEMP-abrar-2017-005790</td>
	</tr> -->
	<tr>
	<td><b>Order No : </b></td>
	<td>#'.$invoicenumber.'</td>
	</tr>
	<tr>
	<td><b>Name : </b></td>
	<td>'.$name.'</td>
	</tr>
	<tr>
	<td><b>Phone : </b></td>
	<td>'.$pn.'</td>
	</tr>
	<tr>
	<td><b>Email : </b></td>
	<td>'.$email.'</td>
	</tr>
	<tr>
	<td><b>Address : </b></td>
	<td>'.$address.'</td>
	</tr>
	<tr>
	<td><b>Delivered By : </b></td>
	<td>'.$get_delivery_man_name['name'].' - '.$get_delivery_man_name['phone_number'].'</td>
	</tr>

	</table>
	</div>
	<div class="left" style="width:60%;float:left;overflow:hidden;">
	<table>
	<tr>
	<td><b>Date : </b></td>
	<td>'.$date.'</td>
	</tr>
	</table>
	</div>	
	</div>
	</div>
	<div class="container" style="width:100%;margin:auto;overflow:hidden;">
	<div class="row" style="margin-top:25%;">
	<table style="width:100%;text-align:left;border:2px solid black;">
	<tr>
	<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Sl No</th>
	<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Product Image</th>
	<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Product Name</th>
	<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Quantity</th>
	<th style="text-align:right;border-bottom:2px solid #000;">Total Price</th>
	</tr>';
	include'../includes/connection.php';
	$query = "SELECT *,DATE(date) date FROM orders_info,order_products,products WHERE orders_info.order_id = order_products.order_id and order_products.product_id=products.product_id and orders_info.order_id=".$_GET['id'];
	$result = mysqli_query($db, $query) or die (mysqli_error($db));
	$serial = 1;
	while ($row = mysqli_fetch_assoc($result)) {
		$total = $row['PRICE']*$row['QTY'];
		$html .= '<tr>
		<td style="border-right:2px solid #ccc;">'.$serial.'</td>
		<td style="border-right:2px solid #ccc;"><img style="width: 50px;" src="../../product_images/'.$row['product_image'].'"</td>
		<td style="border-right:2px solid #ccc;">'.$row['product_title'].'</td>
		<td style="border-right:2px solid #ccc;">'.$row['qty'].'</td>
		<td style="text-align:right;">'.$row['amt'].'</td>
		</tr>';	
		$serial++;
	}
	$query = 'SELECT * from orders_info where order_id ='.$_GET['id']; 
	$result = mysqli_query($db, $query) or die (mysqli_error($db));
	$row = mysqli_fetch_assoc($result);
	$delivery_charge = $row['delivery_charge'];
	$grand = $row['total_amt'];
	$sub = $row['product_total'];
	$html .='
	<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td><br><hr>Product Total : '.number_format($sub).' Taka<br>
	Delivery Charge : '.$delivery_charge.' Taka
	</td>
	</tr>
	</table>
	<h4 style="margin-top:30px; float:right;">Total amount : '.number_format($grand).' Taka ONLY</h4>
	</div>
	</div>
	<br><br><br><br><br>
	<div class="container" style="width:960px;margin:auto;">
	<div class="row" style="margin-top:20px;2px solid black;">
	</div>
	</div>';            
	?>
	<?php
	ob_end_clean();
	ob_start();
	$document->loadHtml($html);
	$document->setPaper('A4','potrait');
	$document->render();
	$document->stream("Invoice",array("Attachment"=>0));
	?>
</body>
</html>