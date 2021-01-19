<?php
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$document = new Dompdf();
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

	<h2 style="padding:10px;text-align:center;background-color:#ccc;">Report</h2>

	<div class="container" style="width:100%;margin:auto;overflow:hidden;">
	<div class="row" style="margin-top:10%;">';
	date_default_timezone_set("Asia/Dhaka");
	$today = date("Y-m-d h:i a");
	$html.='<h4 style="float:right;"><b>Date: '.$today.'</b></h4>';

	$html .= '<h1><u>Monthly Delivery Man Report - '. date('M-y').'</u></h1>';

	$html .='<table border="2" cellspacing = "0" style="width:100%;text-align:left;border:2px solid black;">
	<tr>
	<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Sl No</th>
	<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Name</th>
	<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Phone Number</th>
	<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Total Delivery</th>
	</tr>';
	include'../includes/connection.php';

	
		$month = date("m");
		$query = "SELECT * from delivery_man";
		$result = mysqli_query($db, $query) or die (mysqli_error($db));
		$serial = 1;
		while ($row = mysqli_fetch_assoc($result)) {
			$did = $row['id'];
			$count = mysqli_query($db,"SELECT * from orders_info where dm='$did' and month(date)='{$month}'");
			 $count = mysqli_affected_rows($db);
			$html .= '<tr>
			<td style="border-right:2px solid #ccc;">'.$serial.'</td>
			<td style="border-right:2px solid #ccc;">'.$row['name'].'</td>
			<td style="border-right:2px solid #ccc;">'.$row['phone_number'].'</td>
			<td style="border-right:2px solid #ccc;">'.$count.'</td>
			</tr>'; 
			$serial++;
		}

	$html .='</table></div>';
	          
?>
<?php
ob_end_clean();
ob_start();
$document->loadHtml($html);
$document->setPaper('A4','landscape');
$document->render();
$document->stream("DeliveryManRep",array("Attachment"=>0));
?>
</body>
</html>