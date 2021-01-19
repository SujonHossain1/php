<?php
	 include '../includes/action_config.php';

	 $order_id = $_POST['order_id'];
	 $product_id = $_POST['product_id'];
	 $qty = $_POST['qty'];
	 $amt = $_POST['amt'];

	 $result = mysqli_query($con,"INSERT INTO order_products(order_pro_id,order_id,product_id,qty,amt) values(null,'$order_id','$product_id','$qty','$amt')");
	 if($result){
	 	echo json_encode(array('status' =>'success' ));
	 }else{
	 	echo json_encode(array('status' =>'failure' ));
	 }
?>