<?php
	 require 'config.php';

	 $order_id = $_GET['order_id'];
	 $product_id = $_GET['product_id'];
	 $qty = $_GET['qty'];
	 $amt = $_GET['amt'];

	 $result = mysqli_query($conn,"INSERT INTO order_products(order_pro_id,order_id,product_id,qty,amt) values(null,'$order_id','$product_id','$qty','$amt')");
	 $response = array();
	 if($result){
	 	//echo json_encode(array('status' =>'success' ));
	 	array_push($response,array("status"=>'success'));
	 	print json_encode($response);
	 }else{
	 	//echo json_encode(array('status' =>'failure' ));
	 	array_push($response,array("status"=>'failure'));
	 	print json_encode($response);
	 }
?>