<?php
require 'config.php';

$cat_id = $_GET['cat_id'];
$sql = "select * from sub_category where cat_id ='$cat_id'";
$result = mysqli_query($conn,$sql);

$response = array();
if($result!=false){
   while($row = mysqli_fetch_array($result)) {
	array_push($response,array('id'=>$row['sub_cat_id'],'name'=>$row['sub_cat_name']));
   }

 print json_encode($response);
}else{
        echo "Something WentWrong";
}

?>