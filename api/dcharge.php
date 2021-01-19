<?php
    include '../includes/action_config.php';
    
    $sql = "select * from delivery_charge";
$result = mysqli_query($con,$sql);

$response = array();
if($result!=false){
   while($row = mysqli_fetch_array($result)) {
	array_push($response,array('charge'=>$row['charge']));
   }

 print json_encode($response);
}else{
        echo "Something WentWrong";
}
      
?>