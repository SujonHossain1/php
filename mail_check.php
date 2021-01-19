<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("mhsabuj1@gmail.com","My subject",$msg);
?>



<?php
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$from = 'QUEEN DOHS';
$email = "mhsabuj1@gmail.com";
$headers .= 'From: '.$from."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
$transactionid = 6;


            ///////////////////////////Invoice Code///////////////////
$query = "SELECT *,DATE(date) date FROM orders_info,order_products,products WHERE orders_info.order_id = order_products.order_id and order_products.product_id=products.product_id and orders_info.order_id = '{$transactionid}'";
$result = mysqli_query($con, $query) or die (mysqli_error($con));

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


$getinfo = mysqli_query($con,"SELECT * from info");
$getinfo = mysqli_fetch_assoc($getinfo);
$html = '';
$html .='<center><div class="container" style="width:60%;"><table align="center">
<tr><td>
<img src="../../img/logo/logo2.png" alt="logo" width="150px">
</td>
<td>
<h1>Kahyer Store</h1><hr>
<p><b>Address : </b>'.$getinfo['address'].', <b>Phone - </b>'.$getinfo['phone'].'</p>
</td>
</tr> </table>' ;
$html .='<div class="container" style="width:100%;">

<h2 style="padding:10px;text-align:center;background-color:#ccc;">Invoice/Bill</h2>
<div class="row">
<div class="left" style="width:80%;float:left;overflow:hidden;">
<table style="float:left !important;">
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
<td><b>Date : </b></td>
<td>'.$date.'</td>
</tr>
<tr>
</tr>

</table>
</div>
<div class="left" style="width:60%;float:right;overflow:hidden;">
</div>  
</div>
</div>
<div class="container" style="width:100%;margin:auto;">
<div class="row">
<table style="width:100%;text-align:left;border:2px solid black;">
<tr>
<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Sl No</th>
<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Product Name</th>
<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Product Price</th>
<th style="border-right:2px solid #ccc;border-bottom:2px solid #000;">Quantity</th>
<th style="text-align:right;border-bottom:2px solid #000;">Total Price</th>
</tr>';
$query = "SELECT *,DATE(date) date FROM orders_info,order_products,products WHERE orders_info.order_id = order_products.order_id and order_products.product_id=products.product_id and orders_info.order_id=".$transactionid;
$result = mysqli_query($con, $query) or die (mysqli_error($con));
$serial = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
    <td style="border-right:2px solid #ccc;">'.$serial.'</td>
    <td style="border-right:2px solid #ccc;">'.$row['product_title'].'</td>
    <td style="border-right:2px solid #ccc;">'.$row['product_price'].'</td>
    <td style="border-right:2px solid #ccc;">'.$row['qty'].'</td>
    <td style="text-align:right;">'.$row['amt'].'</td>
    </tr>';
    $serial++;  
}
$query = 'SELECT * from orders_info where order_id ='.$transactionid; 
$result = mysqli_query($con, $query) or die (mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$delivery_charge = $row['delivery_charge'];
$grand = $row['total_amt'];
$sub = $row['product_total'];
$html.='</table>
<h4 style="float:right;">
Product Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;'.number_format($sub).' Taka<br>
Shipping Charge&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;'.$delivery_charge.' Taka<br>
Total amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;'.number_format($grand).' Taka</h4>
</div>
</div></div></center>';  
            //////////////////////////Invoice Code////////////////////
mail($email,"Order Placed",$html,$headers); 
?>