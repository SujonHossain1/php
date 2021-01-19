<?php
	
	require 'config.php';
	
	$name = $_POST["name"]; 
// 	$name = "Morshed";
    $image = $_POST["image"];
    
    $upload_path = "/images/cat_img/".$name.".JPG";
    $sql = "INSERT INTO categories(cat_title,cat_slug,image) VALUES ('$name','$name','$upload_path')";
    $result = mysqli_query($conn,$sql);
    
    $response = array();
    if($result!=false)
    {
        
    $decodedImage = base64_decode("$image");
    $return = file_put_contents("../images/cat_img/".$name.".JPG", $decodedImage);
 
    if($return !== false){
        $response['success'] = 1;
        $response['ok'] = "Image Uploaded Successfully with Retrofit";
    }else{
        $response['success'] = 0;
        $response['ok'] = "Image Uploaded Failed";
    }
 
    echo json_encode($response);

    }
?>