<?php
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$document = new Dompdf();
$day = $_GET['day'];
$month = $_GET['month'];
$year = $_GET['year'];
$case = '0';
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

  $html = '';
  $html .='<table align="center">
  <tr><td>
  <img src="../../img/logo/logo.png" alt="logo" width="150px">
  </td>
  <td>
  </td>
  </tr> </table>' ;
  $html .='<div class="container" style="width:100%;margin:auto;">

  <h2 style="padding:10px;text-align:center;background-color:#ccc;">Report</h2>

  <div class="container" style="width:100%;margin:auto;overflow:hidden;">
  <div class="row" style="margin-top:10%;">';
  date_default_timezone_set("Asia/Dhaka");
  $today = date("Y-m-d h:i a");
  $html.='<h4 style="float:right;"><b>Date: '.$today.'</b></h4>';
  if(!empty($day) && !empty($month) && !empty($year)){
    $html .= '<h1><u>Daily Report</u></h1>';

  }
  else if(empty($day) && !empty($month) && !empty($year)){
    $html .= '<h1><u>Monthly Report</u></h1>';
  }
  else if(empty($day) && empty($month) && !empty($year)){
    $html .= '<h1><u>Yearly Report</u></h1>';
  }

  $html .='<table border="2" cellspacing = "0" style="width:100%;text-align:left;border:2px solid black;">
  <tr>
  <th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Sl No</th>
  <th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Order ID</th>
  <th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Order Date</th>
  <th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Customer Name</th>
  <th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Selling Product quantity</th>
  <th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Product Total Price</th>
  <th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Delivery Charge</th>
  <th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Total Amount</th>
  </tr>';
  include'../includes/connection.php';
  if(!empty($day) && !empty($month) && !empty($year)){
  	$case = '1';
  	$query = "SELECT * from orders_info WHERE DAY(date)='{$day}' and MONTH(date) = '{$month}' and YEAR(date) = '{$year}'";
  	$result = mysqli_query($db, $query) or die (mysqli_error($db));
    $serial = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      $html .= '<tr>
      <td style="border-right:2px solid #ccc;">'.$serial.'</td>
      <td style="border-right:2px solid #ccc;">'.$row['order_id'].'</td>
      <td style="border-right:2px solid #ccc;">'.$row['date'].'</td>
      <td style="border-right:2px solid #ccc;">'.$row['f_name'].'</td>
      <td style="border-right:2px solid #ccc;">'.$row['prod_count'].'</td>
      <td style="border-right:2px solid #ccc;">'.$row['product_total'].'</td>
      <td style="border-right:2px solid #ccc;">'.$row['delivery_charge'].'</td>
      <td style="border-right:2px solid #ccc;">'.$row['total_amt'].'</td>
      </tr>';	
      $serial++;
    }

  }
  else if(empty($day) && !empty($month) && !empty($year)){
  	$case = '2';
  	$query = "SELECT * from orders_info WHERE MONTH(date) = '{$month}' and YEAR(date) = '{$year}'";
  	$result = mysqli_query($db, $query) or die (mysqli_error($db));
   $serial = 1;
   while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
    <td style="border-right:2px solid #ccc;">'.$serial.'</td>
    <td style="border-right:2px solid #ccc;">'.$row['order_id'].'</td>
    <td style="border-right:2px solid #ccc;">'.$row['date'].'</td>
    <td style="border-right:2px solid #ccc;">'.$row['f_name'].'</td>
    <td style="border-right:2px solid #ccc;">'.$row['prod_count'].'</td>
    <td style="border-right:2px solid #ccc;">'.$row['product_total'].'</td>
    <td style="border-right:2px solid #ccc;">'.$row['delivery_charge'].'</td>
    <td style="border-right:2px solid #ccc;">'.$row['total_amt'].'</td>
    </tr>'; 
    $serial++;
  }


}
else if(empty($day) && empty($month) && !empty($year))
{
 $case = '3';
 $query = "SELECT * from orders_info WHERE YEAR(date) = '{$year}'";
 $result = mysqli_query($db, $query) or die (mysqli_error($db));
 $serial = 1;
 while ($row = mysqli_fetch_assoc($result)) {
  $html .= '<tr>
  <td style="border-right:2px solid #ccc;">'.$serial.'</td>
  <td style="border-right:2px solid #ccc;">'.$row['order_id'].'</td>
  <td style="border-right:2px solid #ccc;">'.$row['date'].'</td>
  <td style="border-right:2px solid #ccc;">'.$row['f_name'].'</td>
  <td style="border-right:2px solid #ccc;">'.$row['prod_count'].'</td>
  <td style="border-right:2px solid #ccc;">'.$row['product_total'].'</td>
  <td style="border-right:2px solid #ccc;">'.$row['delivery_charge'].'</td>
  <td style="border-right:2px solid #ccc;">'.$row['total_amt'].'</td>
  </tr>'; 
  $serial++;
}

}

$html .='</table>

</div>
<br><h4 style="color: #9F6D2D;"><b>Total Selling Amount:';
if ($case>0) {
  if($case==1)
  {

    $query = "SELECT sum(product_total) sell from orders_info WHERE DAY(date)='{$day}' and MONTH(date) = '{$month}' and YEAR(date) = '{$year}'";
  }
  else if ($case == 2) {

   $query = "SELECT sum(product_total) sell from orders_info WHERE MONTH(date) = '{$month}' and YEAR(date) = '{$year}'";  #
 }
 else if($case == 3)
 {
        
  $query="SELECT sum(product_total) sell from orders_info WHERE YEAR(date) = '{$year}'";


}
$result = mysqli_query($db, $query) or die (mysqli_error($db));
$row = mysqli_fetch_assoc($result);

$html .=$row['sell'].' Taka</b></h4><br><br><h1><u></u></h1>';
}            
?>
<?php
ob_end_clean();
ob_start();
$document->loadHtml($html);
$document->setPaper('A4','landscape');
$document->render();
$document->stream("htmlpdf",array("Attachment"=>0));
?>
</body>
</html>