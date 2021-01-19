<?php
  //include autoloader

  require_once '../dompdf/autoload.inc.php';

  // reference the Dompdf namespace

  use Dompdf\Dompdf;

  //initialize dompdf class

  $document = new Dompdf();
  
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>HTML to PDF</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

  <?php
  include'../includes/connection.php';
  include '../includes/invoiceQuery.php';


  $html = '';
  $html .='<div class="container" style="width:960px;margin:auto;">
		<img src="C:\xampp\htdocs\management\testing\Incoice demo\logo.png" alt="" />
		<h2 style="padding:10px;text-align:center;background-color:#ccc;">Invoice/Bill</h2>
		<div class="row">
			<div class="left" style="width:80%;float:left;overflow:hidden;">
				<table>
					<!--<tr>
						<td><b>Order No</b></td>
						<td>SO-STEMP-abrar-2017-005790</td>
					</tr> -->
					<tr>
						<td><b>Invoice No</b></td>';
     while ($row = mysqli_fetch_assoc($result)) {

     	$html .= '<td>'.$row["TRANS_D_ID"].'</td>
     			 </tr>
     			 <td><b>Buyer Name</b></td>
                  <td>'.$row["FIRST_NAME"].' '.$row["LAST_NAME"].'</td>
                </tr>
                </table>
			</div>
			<div class="left" style="width:20%;float:left;overflow:hidden;">
				<table>
					<tr>
						<td><b>Date</b></td>
						<td>'.$row["DATE"].'</td>
					</tr>
					<tr>
						<td><b>Time</b></td>
						<td>'.$row["DATE"].'</td>
					</tr>
					
				</table>
			</div>	
		</div>
	</div>
	<div class="container" style="width:960px;margin:auto;overflow:hidden;">
		<div class="row" style="margin-top:20px;">
			<table style="width:100%;text-align:left;border:2px solid black;">
				<tr>
					<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Sl No</th>
					<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Product Description</th>
					<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Unit Price</th>
					<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Quantity</th>
					<th style="text-align:right;border-bottom:2px solid #000;">Total</th>
				</tr>
				<tr>
					<td style="border-right:2px solid #ccc;">1</td>
					<td style="border-right:2px solid #ccc;">Product Description</td>
					<td style="border-right:2px solid #ccc;">150</td>
					<td style="border-right:2px solid #ccc;">1</td>
					<td style="text-align:right;">143</td>
				</tr>
				<tr>
					<td style="border-right:2px solid #ccc;">1</td>
					<td style="border-right:2px solid #ccc;">Product Description</td>
					<td style="border-right:2px solid #ccc;">150</td>
					<td style="border-right:2px solid #ccc;">1</td>
					<td style="text-align:right;">143</td>
				</tr>
				<tr>
					<td style="border-right:2px solid #ccc;">1</td>
					<td style="border-right:2px solid #ccc;">Product Description</td>
					<td style="border-right:2px solid #ccc;">150</td>
					<td style="border-right:2px solid #ccc;">1</td>
					<td style="text-align:right;">143</td>
				</tr>
			</table>
			<label style="float:right;margin-right:5px;margin-top:15px;"><b>Total Amount : </b>2200</label>
			<!--<h3 style="margin-top:30px;">IN WORD : TWO LAC TWENTY SIX THOUSAND TAKA ONLY</h3> -->
		</div>
	</div>
	<br><br><br><br><br>
	<div class="container" style="width:960px;margin:auto;">
		<div class="row" style="margin-top:20px;2px solid black;">
			<!--<div class="left" style="width:30%;float:left;overflow:hidden">
				<hr />
				<p style="text-align:left;">Received in good condition by</p>
			</div> -->
			<div class="right" style="width:30%;float:right;overflow:hidden">
				<hr/>
				<p>Authorized Signature</p>
			</div>
		</div>
	</div>
                ';

     }