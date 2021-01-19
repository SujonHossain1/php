<?php
require 'config.php';

$email = $_GET['email'];
// $product_cat = '1';
$sql = "select * from user_info where email ='$email'";
$result = mysqli_query($conn,$sql);

$response = array();
if($result!=false){
   while($row = mysqli_fetch_array($result)) {
	array_push($response,array('user_id'=>$row['user_id'],'first_name'=>$row['first_name'],'last_name'=>$row['last_name'],'email'=>$row['email'],'password'=>$row['password'],'mobile'=>$row['mobile'],'address1'=>$row['address1'],'city'=>$row['city'],'address2'=>$row['address2'],'country'=>$row['country'],'region'=>$row['region'],'post_code'=>$row['post_code']));
   }

 print json_encode($response);
}else{
        echo "Something WentWrong";
}

?>