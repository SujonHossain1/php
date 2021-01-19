<?php include 'includes/header.php'; ?>
<?php
$_msg = "";
$danger="";
if(isset($_POST['email_submit'])){
    $email = $_POST['email'];
    


    $check = $dc->checkuser("SELECT * from user_info where email='$email'");
    if($check=='false'){
        $_msg = "Invalid email address";
        $danger="true";
    }else{
        $otp = mt_rand(100000, 999999);
        $_SESSION['for_pass'] = $otp;
        $_SESSION['for_email'] = $email;

        /*$headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $from = 'QUEEN DOHS';
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$email."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        $getinfo = $dc->checkuser("SELECT * from info");
        $getinfo = $getinfo->fetch_assoc();
        $html = '';
        $html .='<div class="container" style="width:100%;"><table align="center">
        <tr><td>
        </td>
        <td>
        <h1>QUEEN DOHS</h1><hr>
        <p><b>Address : </b>'.$getinfo['address'].', <b>Phone - </b>'.$getinfo['phone'].'</p>
        </td>
        </tr> </table></div>' ;
        $html .= '<center><h2>Here is your otp to reset your password : <span style="color: red;"><b>'.$_SESSION['for_pass'].'</b></span></h2></center>';
        mail($email,"Forgot Password",$html,$headers);*/
        
        $html = '';
        $html .= 'Here is your otp to reset your password : '.$_SESSION['for_pass'];
        mail($email,"Forgot Password",$html);
         echo "<script> location.href='otp.php'; </script>";
    }
}
?>

<section class="after-header p-tb-10">
 <div class="container">
  <div class="row">
   <div class="col-sm-8">
    <ul class="breadcrumb">
     <li><a href=""><i class="fa fa-home" title="Home"></i></a></li>
     <li><a href="forgotten.php">Forgotten Password</a></li>
 </ul>
 <div class="clear"></div>
</div>
<div class="col-sm-4">
    <h6 class="page-heading">Forgot Your Password?</h6>
</div>
</div>
</div>
</section>
<div class="container alert-container">
</div>
<div class="container body">
 <div class="row">
  <column id="column-left" class="col-sm-3">
   <span class="lc-close"><i class="fa fa-times" aria-hidden="true"></i></span>
   <div class="list-group category_nav">
    <a href="login.php" class="list-group-item">Login</a> <a href="register.html" class="list-group-item">Register</a> <a href="forgotten.php" class="list-group-item">Forgotten Password</a>
    <a href="myaccount.php" class="list-group-item">My Account</a>
    <a href="orderhistory.php" class="list-group-item">Order History</a> 
</div>
</column>
<div id="content" class="col-sm-9">
   <div class="main_content">
    <h1>Forgot Your Password?</h1>
    <p>Enter the e-mail address associated with your account. Click submit to have your otp to reset your password e-mailed to you.</p>
    <?php if($_msg!=""){ 
        if ($danger!="") {
            echo '<div class=" alert-container">
            <div class="alert alert-danger">
            <div class="cart-success-message">
            <i class="fa fa-exclamation-triangle" ></i>
            <div class="success-message">'.$_msg.'</div>
            </div>
            <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            </div>';
        }else{
            echo '<div class=" alert-container">
            <div class="alert alert-success">
            <div class="cart-success-message">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
            <div class="success-message">'.$_msg.'</div>
            </div>
            <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            </div>';
        }
    } ?>
    <!----------------alert ---------------------->
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
     <fieldset>
      <legend>Your E-Mail Address</legend>
      <div class="form-group required">
       <label class="col-sm-2 control-label" for="input-email">E-Mail Address</label>
       <div class="col-sm-10">
        <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control" />
    </div>
</div>
</fieldset>
<div class="buttons clearfix">
  <div class="pull-left"><a href="login.html" class="btn btn-default">Back</a></div>
  <div class="pull-right">
   <input type="submit" name="email_submit" value="Continue" class="btn btn-primary" />
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>