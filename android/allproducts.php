<?php
require 'config.php';


$sql = "select * from products";
$result = mysqli_query($conn,$sql);

$response = array();
if($result!=false){
   while($row = mysqli_fetch_array($result)) {
	array_push($response,array('product_id'=>$row['product_id'],'title'=>$row['product_title'],'price'=>$row['product_price'],'previous_price'=>$row['product_previous_price'],'image'=>$row['product_image'],'desc'=>$row['product_desc'],'product_id'=>$row['product_id']));
   }

 print json_encode($response);
}else{
        echo "Something WentWrong";
}
?>