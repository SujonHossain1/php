<?php
//fetch.php
if(isset($_POST["action"]))
{
 include '../includes/connection.php';
 $output = '';
 if($_POST["action"] == "cat")
 {
 	$cat_id = $_POST['query'];
  $query = "SELECT * from sub_category,categories WHERE categories.cat_id = sub_category.cat_id and categories.cat_id='{$cat_id}'";
  $result = mysqli_query($db, $query);
  $output .= '<option value=""  disabled selected>Select Sub Category</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["sub_cat_id"].'">'.$row["sub_cat_name"].'</option>';
  }
 }

 echo $output;
}
?>