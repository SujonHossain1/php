<?php
    include '../includes/action_config.php';

    $uid = $_POST["uid"];
    $f_name = $_POST["name"];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $prod_count = $_POST['prod_count'];  //Count of how many individual product has been bought
    $prod_total = $_POST['prod_total'];  //total amount of the purchase without delivery charge
    $delivery = $_POST['dcharge'];
    $comment = $_POST['comment'];
    $total_amount = $prod_count+$delivery;
    
    
    mysqli_query($con,"INSERT INTO orders_info(order_id,user_id,f_name,phone,email,address,city,state,zip,prod_count,product_total,delivery_charge,total_amt,comment) values(null,'$uid','$f_name','$phone','$email','$address','$city','$state','$zip','$prod_count','$prod_total','$delivery','$total_amount','$comment')");
    $response = array();
    $order_id = mysqli_insert_id($con);
    //$age = array("order_id"=>$order_id);
    array_push($response,array("order_id"=>$order_id));
    print json_encode($response);
      
?>