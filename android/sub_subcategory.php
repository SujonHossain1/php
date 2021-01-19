<?php
require 'config.php';

$sub_cat_id = $_GET['sub_cat_id'];
$sql = "select * from sub_sub_category where sub_cat_id ='$sub_cat_id'";
$result = mysqli_query($conn,$sql);

$response = array();
if($result!=false){
   while($row = mysqli_fetch_array($result)) {
	array_push($response,array('id'=>$row['sub_sub_cat_id'],'name'=>$row['name']));
   }

 print json_encode($response);
}else{
        echo "Something WentWrong";
}

?>