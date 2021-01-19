<?php
include'../includes/connection.php';
include'../includes/sidebar.php';

if(isset($_POST['submit_main']))
{
 $permitedImg = array('jpg','jpeg','png','gif');
 $banner1="images/slider/".$_FILES["banner1"]["name"];



 move_uploaded_file($_FILES["banner1"]["tmp_name"],"../../images/slider/".$_FILES["banner1"]["name"]);
 $sql=mysqli_query($db,"INSERT  into main_banner values(null,'$banner1','')");
 $_SESSION['msg']="Well Done, Banner Inserted";

}
if(isset($_GET['del']))
{
 mysqli_query($db,"delete from info_banner where id = '".$_GET['id']."'");
 $_SESSION['delmsg']="Product deleted !!";
}

if(isset($_GET['del_main']))
{
 mysqli_query($db,"delete from main_banner where id = '".$_GET['id']."'");
 $_SESSION['delmsg']="Product deleted !!";
}

if(!isset($_SESSION['MEMBER_ID'])){
 ?>
 <script type="text/javascript">
   //then it will be redirected
   alert("Restricted Page! You will be redirected to POS");
   window.location = "login.php";
 </script>
 <?php
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin| </title>
  <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link type="text/css" href="css/theme.css" rel="stylesheet">
  <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
  <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
  <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
  <script>
   function getSubcat(val) {
     $.ajax({
       type: "POST",
       url: "get_sub.php",
       data:'cat_id='+val,
       success: function(data){
         $("#subcategory").html(data);
       }
     });
   }
   function selectCountry(val) {
     $("#search-box").val(val);
     $("#suggesstion-box").hide();
   }
 </script> 
</head>
<body>
  <div class="card shadow mb-4">
   <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">
     Main Banner Image&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> -->
   </h4>
   &nbsp;&nbsp;1920px X 820px
 </div>
 <div class="card-body">
  <?php if(isset($_POST['submit_main']))
  {?>
    <div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert">×</button>
     <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
   </div>
 <?php } ?>
 <div class="table-responsive">
   <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
    <table class="table table-bordered" id="" width="100%" cellspacing="0">
     <tr>
      <th>Banner</th>
      <td> <input type="file" name="banner1" id="banner1" value="" class="form-control" required>
      </td>
    </tr>
    <tr>
      <th></th>
      <td> <button type="submit" class="button" name="submit_main" class="btn">Insert</button></td>
    </tr>
  </table>
</form>
</div>
</div>
</div>
<div class="card shadow mb-4">
 <div class="card-header py-3">
  <h4 class="m-2 font-weight-bold text-primary">Main Banner&nbsp;</h4>
</div>
<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
     <tr>
       <tr>
        <th>#</th>
        <th>Banner1</th>
        <th>Action</th>
      </tr>
    </tr>
  </thead>
  <tbody>
   <?php                  
   $query = "SELECT * from main_banner";
   $result = mysqli_query($db, $query) or die (mysqli_error($db));
   $cnt=1;
   while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'. $cnt.'</td>';
    echo '<td><img style="width: 200px;" src="../../'. $row['banner1'].'"</td>';
    echo '<td align="right">

    <div class="btn-group">
    <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
    ... <span class="caret"></span></a>
    <ul class="dropdown-menu text-center" role="menu">

    <li>
    <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="banner.php?del_main='.$row['id']. ' & id='.$row['id']. '">
    <i class="fas fa-fw fa-edit"></i> Delete
    </a>
    </li>
    </ul>
    </div>
    </div> </td>

    ';
    echo '</tr> ';
    $cnt++;
  }
  ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<?php
if(isset($_POST['submit_logo'])){
 $permitedImg = array('jpg','jpeg','png','gif');
 $banner1="images/logo/".$_FILES["logo"]["name"];
 $alt = $_POST['logo_alt'];


 move_uploaded_file($_FILES["logo"]["tmp_name"],"../../images/logo/".$_FILES["logo"]["name"]);
 $sql=mysqli_query($db,"INSERT  into logo values(null,'$banner1','$alt')");
 $_SESSION['msg']="Well Done, Logo Inserted";
} 

if(isset($_GET['del_logo']))
{
 mysqli_query($db,"delete from logo where id = '".$_GET['id']."'");
 $_SESSION['delmsg']="Product deleted !!";
}
?>

<!------------------Logo--------------------->
<div class="card shadow mb-4">
 <div class="card-header py-3">
  <h4 class="m-2 font-weight-bold text-primary">
   Logo Image&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> -->
 </h4>
 &nbsp;&nbsp;144px X 64px
</div>
<div class="card-body">
  <?php if(isset($_POST['submit_main']))
  {?>
    <div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert">×</button>
     <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
   </div>
 <?php } ?>
 <div class="table-responsive">
   <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
    <table class="table table-bordered" id="" width="100%" cellspacing="0">
     <tr>
      <th>Logo</th>
      <td> <input type="file" name="logo" id="logo" value="" class="form-control" required>
      </td>
    </tr>
    <tr>
      <th>Alt</th>
      <td> <input type="text" name="logo_alt" id="logo" value="" class="form-control" required>
      </td>
    </tr>
    <tr>
      <th></th>
      <td> <button type="submit" class="button" name="submit_logo" class="btn">Insert</button></td>
    </tr>
  </table>
</form>
</div>
</div>
</div>
<div class="card shadow mb-4">
 <div class="card-header py-3">
  <h4 class="m-2 font-weight-bold text-primary">Logo&nbsp;</h4>
</div>
<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
     <tr>
       <tr>
        <th>#</th>
        <th>Logo</th>
        <th>Logo Alt</th>
        <th>Action</th>
      </tr>
    </tr>
  </thead>
  <tbody>
   <?php                  
   $query = "SELECT * from logo";
   $result = mysqli_query($db, $query) or die (mysqli_error($db));
   $cnt=1;
   while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'. $cnt.'</td>';
    echo '<td><img style="width: 200px;" src="../../'. $row['logo_img'].'"</td>';
    echo '<td>'. $row['alt'].'</td>';
    echo '<td align="right">

    <div class="btn-group">
    <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
    ... <span class="caret"></span></a>
    <ul class="dropdown-menu text-center" role="menu">

    <li>
    <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="banner.php?del_logo='.$row['id']. ' & id='.$row['id']. '">
    <i class="fas fa-fw fa-edit"></i> Delete
    </a>
    </li>
    </ul>
    </div>
    </div> </td>

    ';
    echo '</tr> ';
    $cnt++;
  }
  ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<!------------------Logo--------------------->
<?php
include'../includes/footer.php';
?>
<style type="text/css">
 .button {
   background-color: #4CAF50; /* Green */
   border: none;
   color: white;
   border-radius: 15px;
   padding: 15px 32px;
   text-align: center;
   text-decoration: none;
   display: inline-block;
   font-size: 16px;
 }
</style>