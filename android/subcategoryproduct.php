<?php
require 'config.php';

$product_sub_cat = $_GET['product_sub_cat'];
 //$product_sub_cat = '1';
$sql = "select * from products where product_sub_cat ='$product_sub_cat'";
$result = mysqli_query($conn,$sql);

$response = array();
if($result!=false){
   while($row = mysqli_fetch_array($result)) {
	array_push($response,array('product_id'=>$row['product_id'],'product_sub_cat'=>$row['product_sub_cat'],'sub_sub_cat'=>$row['sub_sub_cat'],'product_title'=>$row['product_title'],'product_price'=>$row['product_price'],'product_previous_price'=>$row['product_previous_price'],'product_desc'=>$row['product_desc'],'product_image'=>$row['product_image']));
   }

 print json_encode($response);
}else{
        echo "Something WentWrong";
}

?>