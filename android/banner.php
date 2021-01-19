<?php
require 'config.php';


$sql = "select * from main_banner";
$result = mysqli_query($conn,$sql);

$response = array();
if($result!=false){
   while($row = mysqli_fetch_array($result)) {
	array_push($response,array('images'=>$row['banner1']));
   }

 print json_encode($response);
}else{
        echo "Something WentWrong";
}
?>