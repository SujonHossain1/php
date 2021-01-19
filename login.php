<?php include 'includes/header.php'; ?>
<?php
    $danger = "";
    $_msg="";
    if(isset($_POST['login_submit'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $check = $dc->login($email,$password);
        if($check=='false'){
            $danger="true";
            $_msg = "Invalid email/password.";
        }else{
            $check = $check->fetch_assoc();
            $_SESSION["startech_uid"] = $check['user_id'];
            echo "<script>alert('Login Successfull.')</script>";
            echo '<script>window.location.href="index.php";</script>';
        }
    }

 ?>

<section class="after-header p-tb-10">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <ul class="breadcrumb">
                    <li><a href=""><i class="fa fa-home" title="Home"></i></a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="col-sm-4">
                <h6 class="page-heading">Account Login</h6>
            </div>
        </div>
    </div>
</section>
<div class="container alert-container">
</div>
<div class="container account_layout customer_login body">
  <div class="row"><column id="column-left" class="col-sm-3">
      <span class="lc-close"><i class="fa fa-times" aria-hidden="true"></i></span>
      <div class="list-group category_nav">
        <a href="login.php" class="list-group-item">Login</a> <a href="register.php" class="list-group-item">Register</a> <a href="forgotten.php" class="list-group-item">Forgotten Password</a>
        <a href="myaccount.php" class="list-group-item">My Account</a>
        <a href="order.php" class="list-group-item">Order History</a>
    </div>
</column>
<div id="content" class="col-sm-9">

  <div class="main_content">
      <div class="row">
          <div class="col-sm-6">
              <div class="well">
                  <h2>New Customer</h2>
                  <p><strong>Register Account</strong></p>
                  <a href="register.php" class="btn btn-primary">Continue</a>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="well">
                  <h2>Login</h2>
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
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label class="control-label" for="input-email">E-Mail Address</label>
                      <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="input-password">Password</label>
                      <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
                      <a href="forgotten.php">Forgotten Password</a></div>
                      <input type="submit" name="login_submit" value="Login" class="btn btn-primary" />
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>
