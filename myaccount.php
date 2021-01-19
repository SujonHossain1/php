<?php include 'includes/header.php'; ?>
<?php
if(!isset($_SESSION['startech_uid'])){
    echo"<script>window.location.href='login.php'</script>";
}
$danger = "";
$_msg="";
$id = $_SESSION['startech_uid'];

if(isset($_POST['submit_pass'])){
    $password = md5($_POST['password']);
    $repassword = md5($_POST['confirm']);

    if( empty($password) || empty($repassword) ){

        $_msg = "Please fill all fields.";
        $danger="true";
    } else {

        if(strlen($password) < 6 ){
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

            $sql = "UPDATE user_info set password = '$password' where user_id = '$id';";

            $id = $dc->registration($sql);
            $_msg = 'Update successfull;';
            $danger="";
        }
    }

}

if (isset($_POST["submit_info"])) {

    $f_name = $_POST["firstname"];
    $l_name = $_POST["lastname"];
    $email = $_POST['email'];
    /*$password = md5($_POST['password']);
    $repassword = md5($_POST['confirm']);*/
    $mobile = $_POST['telephone'];
    $address1 = $_POST['address_1'];
    $address2 = $_POST['address_2'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $state = $_POST['zone_id'];
    $sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
    $check = $dc->checkuser($sql);

    if(empty($f_name) || empty($l_name) || empty($email) ||
        empty($mobile) || empty($address1) ){

        $_msg = "Please fill all fields.";
    $danger="true";
} else {

    if(!(strlen($mobile) == 11)){
        $_msg = 'Mobile number must be 11 digit';
        $danger="true";
    }
    else {

        $sql = "UPDATE user_info set first_name = '$f_name',
        last_name = '$l_name',address1 = '$address1',
        address2 = '$address2', city = '$city',region = '$state',
        post_code = '$postcode',mobile='$mobile',email='$email' where user_id = '$id';";

        $id = $dc->registration($sql);
        $_SESSION["startech_name"] = $f_name." ".$l_name;
        $_msg = 'Update successfull;';
        $danger="";
    }
}

}
$get_info = $dc->getcustomerinfo($_SESSION['startech_uid']);
$get_info = $get_info->fetch_assoc();

?>

<section class="after-header p-tb-10">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <ul class="breadcrumb">
                    <li><a href=""><i class="fa fa-home" title="Home"></i></a></li>
                    <li><a href="myaccount.php">My Account</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="col-sm-4">
                <h6 class="page-heading">My Account</h6>
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
        <a href="orderhistory.php" class="list-group-item">Order History</a>
    </div>
</column>
<div id="content" class="col-sm-9">
    <div class="main_content">


        <h1>My Account</h1>
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

        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal registration_form">
            <fieldset id="account">
                <legend>Your Personal Details</legend>
                <div class="form-group required" style="display: none;">
                    <label class="col-sm-3 control-label">Customer Group</label>
                    <div class="col-sm-9">
                        <div class="radio">
                            <label>
                                <input type="radio" name="customer_group_id" value="1" checked="checked" />
                            General</label>
                        </div>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-firstname">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="firstname" value="<?php echo $get_info['first_name']; ?>" placeholder="First Name" id="input-firstname" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-lastname">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="lastname" value="<?php echo $get_info['last_name']; ?>" placeholder="Last Name" id="input-lastname" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-email">E-Mail</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" value="<?php echo $get_info['email']; ?>" placeholder="E-Mail" id="input-email" class="form-control" required readonly/>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-telephone">Telephone</label>
                    <div class="col-sm-9">
                        <input type="tel" name="telephone" value="<?php echo $get_info['mobile']; ?>" placeholder="Telephone" id="input-telephone" class="form-control" required/>
                    </div>
                </div>
            </fieldset>
            <fieldset id="address">
                <legend>Your Address</legend>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-address-1">Address 1</label>
                    <div class="col-sm-9">
                        <input type="text" name="address_1" value="<?php echo $get_info['address1']; ?>" placeholder="Address 1" id="input-address-1" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="input-address-2">Address 2</label>
                    <div class="col-sm-9">
                        <input type="text" name="address_2" value="<?php echo $get_info['address2']; ?>" placeholder="Address 2" id="input-address-2" class="form-control" />
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-city">City</label>
                    <div class="col-sm-9">
                        <input type="text" name="city" value="<?php echo $get_info['city']; ?>" placeholder="City" id="input-city" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-postcode">Post Code</label>
                    <div class="col-sm-9">
                        <input type="text" name="postcode" value="<?php echo $get_info['post_code']; ?>" placeholder="Post Code" id="input-postcode" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-zone">Region / State</label>
                    <div class="col-sm-9">
                        <input type="text" name="zone_id" value="<?php echo $get_info['region']; ?>" id="input-zone" class="form-control" required/>
                    </div>
                </div>
                <div class="buttons" >
                    <div class="pull-right">
                        <input type="submit" name="submit_info" value="Update" class="btn btn-primary" />
                    </div>
                </div>
            </form>
        </fieldset>
        <fieldset>
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal registration_form">
                <legend>Your Password</legend>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-password">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-3 control-label" for="input-confirm">Password Confirm</label>
                    <div class="col-sm-9">
                        <input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-confirm" class="form-control" required/>
                    </div>
                </div>
            </fieldset>
            <div class="buttons" style="padding-bottom: 20px;">
                <div class="pull-right">
                    <input type="submit" name="submit_pass" value="Update" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>
