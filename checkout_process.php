<?php
session_start();
echo '<pre>';
echo $_SESSION['startech_uid'];
echo '</pre>';
include "includes/action_config.php";
if (isset($_SESSION["startech_uid"])) {
	$f_name = $_POST["firstname"];
    $l_name = $_POST["lastname"];
    $email = $_POST['email'];
    $number =$_POST['telephone'];
    $address = $_POST['address_1'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip= $_POST['zip'];
    $comment = $_POST['comment'];

    $user_id=$_SESSION["startech_uid"];
    $f_name .= " ".$l_name;
    
    
   

    $total = 0;
    $total_count = 0;
    foreach($_SESSION['startech_cart'] as $productId){
        $total_count++;
        //Print out the product ID.
        $pro_id =  $productId['id'];
        $qty =  $productId['qty'];
        $sql = "SELECT * FROM products where product_id='$pro_id'";

        $get_cart = mysqli_query($con,$sql);
        $show_price = 0;
        $row = mysqli_fetch_assoc($get_cart);
        $temp_total  = $row['product_price'];
        $show_price = $temp_total;
        
        $temp_total = $temp_total*$qty;
        $total +=$temp_total;

    }

    $delivery = $_SESSION['startech_dc'];

    $total_pay = $total+$delivery;
    
    $sql = "INSERT INTO `orders_info` 
    (`order_id`,`user_id`,`f_name`,phone, `email`,`address`, 
    `city`, `state`, `zip`,`prod_count`,product_total,delivery_charge,`total_amt`,comment) 
    VALUES (null, '$user_id','$f_name','$number','$email', 
    '$address', '$city', '$state', '$zip','$total_count','$total','$delivery','$total_pay','$comment')";


    if(mysqli_query($con,$sql)){

        $order_id = mysqli_query($con,"SELECT max(order_id) order_id from orders_info where user_id = '$user_id'");
        $order_id = mysqli_fetch_assoc($order_id);
        $order_id = $order_id['order_id'];
        foreach($_SESSION['startech_cart'] as $productId){
            $pro_id =  $productId['id'];
            $qty =  $productId['qty'];
            $sql = "SELECT * FROM products where product_id='$pro_id'";

            $get_cart = mysqli_query($con,$sql);
            $show_price = 0;
            $row = mysqli_fetch_assoc($get_cart);
            $date = date("Y-m-d");
            $temp_total  = $row['product_price'];
            $show_price = $temp_total;
            $temp_total = $temp_total*$qty;

            $sql1="INSERT INTO `order_products` 
            (`order_pro_id`,`order_id`,`product_id`,`qty`,`amt`) 
            VALUES (NULL, '$order_id','$pro_id','$qty','$temp_total')";
            mysqli_query($con,$sql1);
        }
        unset($_SESSION['startech_cart']);

        if(1){
            $get_admin_email = mysqli_query($con,"SELECT * from admin_info");
            while($row=mysqli_fetch_assoc($get_admin_email)){
                $mail = $row['admin_email'];
                mail($mail,"New Order Alert","New order received\nQUEEN DOHS Store");
            }
            

            include 'send_invoice.php';

            echo"<script>window.location.href='success.php'</script>";
        }else{
            echo(mysqli_error($con));
        }


    }
    
}else{
  /*echo"<script>window.location.href='index.php'</script>";*/
}


?>