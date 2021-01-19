<?php
require 'config.php';

$email = $_GET['email'];
$password = $_GET['password'];
$sql = "select * from user_info where email ='$email' and password = '$password'";
$result = mysqli_query($conn,$sql);

$response = array();

if(!mysqli_num_rows($result)>0)
{
$status = "failed";
array_push($response,array("response"=>$status));
// print json_encode($response);
}
else
{
//     if($result!=false){
//     $status = "ok";
//   while($row = mysqli_fetch_array($result)) {
// 	array_push($response,array('id'=>$row['email'],'name'=>$row['password']));
//   }

//  print json_encode($response);
        
//     }
//     else
//     {
//         echo "Something WentWrong";
        
//     }

$status = "ok";
array_push($response,array("response"=>$status));

}
print json_encode($response);

?>