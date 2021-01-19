<?php
include'../includes/connection.php';
?>
<!-- Page Content -->
<div class="col-lg-12">
  <?php
  $name = $_POST['username'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $pass = $_POST['password'];
  $phone = $_POST['phone'];


  switch($_GET['action']){
    case 'add': 

    mysqli_query($db,"SELECT * from admin_info WHERE admin_email='{$email}'");
    $isExists = mysqli_affected_rows($db);
    if($isExists>0){
      echo "<script>alert('Email address already in use.')</script>";
    }else{

      $query = "INSERT INTO admin_info
      (admin_name, admin_email, admin_password, phone,gender,TYPE)
      VALUES ('{$name}','{$email}',sha1('{$pass}'),'{$phone}','{$gender}','Editor')";
      mysqli_query($db,$query)or die ('Error in updating Admin in '. $query);
    }
    break;

    case 'delete':
    break;
  }
  ?>
  <script type="text/javascript">window.location = "user.php";</script>
</div>

