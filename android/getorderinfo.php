<?php
require 'config.php';

$email = $_GET['email'];
// $email = 'm@gmail.com';
$sql = "select * from orders_info where email ='$email'";
$result = mysqli_query($conn,$sql);

$response = array();
if($result!=false){
   while($row = mysqli_fetch_array($result)) {
	array_push($response,array('user_id'=>$row['user_id'],'f_name'=>$row['f_name'],'phone'=>$row['phone'],'prod_count'=>$row['prod_count'],'product_total'=>$row['product_total'],'date'=>$row['date'],'status'=>$row['status']));
   }

 print json_encode($response);
}else{
        echo "Something WentWrong";
}

?>