<?php
require 'config.php';


$sql = "select * from categories";
$result = mysqli_query($conn,$sql);

$response = array();
if($result!=false){
   while($row = mysqli_fetch_array($result)) {
	array_push($response,array('id'=>$row['cat_id'],'category'=>$row['cat_title'],'images'=>$row['image']));
   }

 print json_encode($response);
}else{
        echo "Something WentWrong";
}
?>