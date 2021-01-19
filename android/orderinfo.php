<?php

    require 'config.php';

     $uid = $_GET["uid"];
//$uid = "10";
    $f_name = $_GET["f_name"];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $address = $_GET['address'];
    $city = $_GET['city'];
    $state = $_GET['state'];
    $zip = $_GET['zip'];
    $prod_count = $_GET['prod_count'];  //Count of how many individual product has been bought
    $prod_total = $_GET['prod_total'];  //total amount of the purchase without delivery charge
    $delivery = $_GET['delivery'];
    //$comment = $_POST['comment'];
$comment = "";
    //$total_amount = $prod_count+$delivery;
$total_amount = $prod_total+$delivery;
    
    
    mysqli_query($conn,"INSERT INTO orders_info(user_id,f_name,phone,email,address,city,state,zip,prod_count,product_total,delivery_charge,total_amt,comment) values('$uid','$f_name','$phone','$email','$address','$city','$state','$zip','$prod_count','$prod_total','$delivery','$total_amount','$comment') ");
$response = array();
    $order_id = mysqli_insert_id($conn);
    //$age = array("order_id"=>$order_id);
array_push($response,array("order_id"=>$order_id));
    print json_encode($response);
      
?>