<?php include 'includes/header.php'; ?>
<section class="after-header p-tb-10">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<ul class="breadcrumb">
					<li><a href="https://www.startech.com.bd/"><i class="fa fa-home" title="Home"></i></a></li>
					<li><a href="https://www.startech.com.bd/account/account">Account</a></li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="col-sm-4">
				<h6 class="page-heading">My Account</h6>
			</div>
		</div>
	</div>
</section>
<div class="container body bg-gray">
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
			<!-- <h2>My Account</h2> -->
			<h2 class="">ACCOUNT</h2>
			<ul class="list-unstyled">
				<li><a href="myaccount.php">Edit your account information</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			<h2>My Orders</h2>
			<ul class="list-unstyled">
				<li><a href="order.php">View your order history</a></li>
			</ul>
		</div>
	</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>
