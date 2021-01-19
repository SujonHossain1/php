<?php include 'includes/header.php'; ?>
<?php
if(!isset($_SESSION['for_pass'])){
    echo"<script>window.location.href='forgotten.php'</script>";
}
$danger = "";
$_msg="";

if(isset($_POST['submit_pass'])){
    $otp = $_POST['otp'];
    $password = md5($_POST['password']);
    $repassword = md5($_POST['confirm']);
    $email = $_SESSION['for_email'];

    if( empty($password) || empty($repassword) || empty($otp)){

        $_msg = "Please fill all fields.";
        $danger="true";
    } else {
        if($_SESSION['for_pass']!=$otp){
            $_msg = "Please enter the correct otp.";
            $danger="true";
        }
        elseif(strlen($password) < 6 ){
            $_msg = "Password should be at least 6 digit long.";
            $danger="true";
        }
        elseif(strlen($repassword) < 6 ){
            $_msg = "Password should be at least 6 digit long.";
            $danger="true";
        }
        elseif($password != $repassword){
            $_msg = "Password didn't match";
            $danger="true";
        }
        else {

            $sql = "UPDATE user_info set password = '$password' where email = '$email';";

            $id = $dc->registration($sql);
            $_msg = 'Password changed successfully';
            $danger="";
        }
    }

}

?>

<section class="after-header p-tb-10">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <ul class="breadcrumb">
                    <li><a href=""><i class="fa fa-home" title="Home"></i></a></li>
                    <li><a href="forgotten.php">Forgot Password</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="col-sm-4">
                <h6 class="page-heading">Forgot Password</h6>
            </div>
        </div>
    </div>
</section>
<div class="container alert-container">
</div>
<div class="container account_layout account_registration body">

  <div class="row"><column id="column-left" class="col-sm-3">
      <span class="lc-close"><i class="fa fa-times" aria-hidden="true"></i></span>
      <div class="list-group category_nav">
        <a href="login.php" class="list-group-item">Login</a> <a href="register.html" class="list-group-item">Register</a> <a href="forgotten.php" class="list-group-item">Forgotten Password</a>
        <a href="myaccount.php" class="list-group-item">My Account</a>
    </div>
</column>
<div id="content" class="col-sm-9">
    <div class="main_content">


        <h1>Forgot Password</h1>
        <p class="ifHaveAccount"></p>
        <!----------------alert ----------------------> 
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

        <fieldset>
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal registration_form">
                <legend>Enter OTP sent to your mail</legend>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-password">OTP</label>
                    <div class="col-sm-9">
                        <input type="text" name="otp" value="" placeholder="Enter your otp" id="input-password" class="form-control" required/>
                    </div>
                </div>
                <legend>Your Password</legend>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-password">New Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-confirm">Confirm Password Confirm</label>
                    <div class="col-sm-9">
                        <input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-confirm" class="form-control" required/>
                    </div>
                </div>
            </fieldset>
            <div class="buttons" style="padding-bottom: 20px;">
                <div class="pull-right">
                    <input type="submit" name="submit_pass" value="Change Password" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>
