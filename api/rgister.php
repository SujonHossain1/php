<?php

include '../includes/action_config.php';

$first_name = $_GET["first_name"];
$last_name =$_GET["last_name"];
$email = $_GET["email"];
$password =md5($_GET["password"]);
$mobile = $_GET["mobile"];
$address1 =$_GET["address1"];
$city = $_GET["city"];
$address2 =$_GET["address2"];
$country =$_GET["country"];
$region = $_GET["region"];
$post_code =$_GET["post_code"];
$post_code1 ="1205";


$sql = "select * from user_info where email = '$email'";
$result = mysqli_query($con,$sql);

$response = array();

if(mysqli_num_rows($result)>0)
{
$status = "exist";
array_push($response,array("response"=>$status));
}
else
{
$sql = "insert into user_info(first_name,last_name,email,password,mobile,address1,city,address2,country,region,post_code) values('$first_name','$last_name','$email','$password','$mobile','$address1','$city','$address2','$country','$region','$post_code') ";

if(mysqli_query($con,$sql))
{
$status = "ok";

array_push($response,array("response"=>$status));
}
else
{
$status = "error";

array_push($response,array("response"=>$status));
}
}

print json_encode($response);
?>
