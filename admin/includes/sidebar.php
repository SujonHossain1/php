<?php
   require('session.php');
   confirm_logged_in();
   include 'generateslug.php';
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <style type="text/css">
         #overlay {
         position: fixed;
         display: none;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: rgba(0,0,0,0.5);
         z-index: 2;
         cursor: pointer;
         }
         #text{
         position: absolute;
         top: 50%;
         left: 50%;
         font-size: 50px;
         color: white;
         transform: translate(-50%,-50%);
         -ms-transform: translate(-50%,-50%);
         }
      </style>
      <?php
         $getlogo = mysqli_query($db,"SELECT * FROM `logo` order by id desc");
         $getlogo = mysqli_fetch_assoc($getlogo); 
         ?>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Queen DOHS</title>
      <link rel="icon" href="../../<?php echo $getlogo['logo_img']; ?>">
      <!-- Custom fonts for this template-->
      <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="../css/sb-admin-2.min.css" rel="stylesheet">
      <!-- Custom styles for this page -->
      <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon">
               <!-- <i class="fas fa-plane"></i>-->
               <img src="../../<?php echo $getlogo['logo_img']; ?>" style="max-width: 150px; padding: 10px">
            </div>
            <!-- <div class="sidebar-brand-text mx-3">Khayer Store</div> -->
         </a>
         <!-- Divider -->
         <hr class="sidebar-divider my-0">
         <!-- Nav Item - Dashboard -->
         <li class="nav-item">
            <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Heading -->
         <div class="sidebar-heading">
            Tables
         </div>
         <!-- Tables Buttons -->
         <li class="nav-item">
            <?php
               $result = mysqli_query($db,"SELECT * FROM orders_info where  status='Under Review'");
               $num_rows1 = mysqli_affected_rows($db);
               ?>
            <a class="nav-link" href="daily_order.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Daily Orders</span>&nbsp;<span class="numberCircle"><?php echo htmlentities($num_rows1); ?></span></a>
         </li>
         <li class="nav-item">
            <?php
               $result = mysqli_query($db,"SELECT * FROM orders_info where status !='Under Review' and status!='Delivered'");
               $num_rows1 = mysqli_affected_rows($db);
               ?>
            <a class="nav-link" href="pending_orders.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Pending Orders</span>&nbsp;<span class="numberCircle"><?php echo htmlentities($num_rows1); ?></span></a>
         </li>
         <li class="nav-item">
            <?php
               $result = mysqli_query($db,"SELECT * FROM orders_info where status='Delivered'");
               $num_rows1 = mysqli_affected_rows($db);
               ?>
            <a class="nav-link" href="delivered_orders.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Delivered Orders</span>&nbsp;<span class="numberCircle1"><?php echo htmlentities($num_rows1); ?></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="customer.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Customer</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="product.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Product</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="category.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Category</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="sub_category.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Sub Category</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="sub_sub_category.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Sub Sub Category</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="banner.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Banner</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="notice.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Notice</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="deliverycharge.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Delivery Charge</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="store_info.php">
            <i class="fas fa-fw fa-table"></i>
            <span>About Us</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="android.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Android App</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="terms_conditions.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Terms & Conditions</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="privacy_policy.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Privacy Policy</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="transaction.php">
            <i class="fas fa-fw fa-retweet"></i>
            <span>All Transections</span></a>
         </li>
         <!-- <li class="nav-item">
            <a class="nav-link" href="assign.php">
              <i class="fas fa-fw fa-archive"></i>
              <span>Assign Delivery</a>
              </li> -->
         <li class="nav-item">
            <a class="nav-link" href="user.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Accounts</span></a>
         </li>
         <!-- <li class="nav-item">
            <a class="nav-link" href="expense.php">
              <i class="fas fa-fw fa-archive"></i>
              <span>Extra Expense</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="salary.php">
                <i class="fas fa-money-check"></i>
                <span>Salary</span></a>
              </li> -->
         <!-- <li class="nav-item">
            <a class="nav-link" href="admin_permission.php">
              <i class="fas fa-key"></i>
              <span>Admin Permission</span></a>
            </li> -->
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">
         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
      </ul>
      <!-- End of Sidebar -->
      <?php include_once 'topbar.php'; ?>
      <style type="text/css">
         .numberCircle {
         border-radius: 25%;
         width: 36px;
         height: 30px;
         padding: 4px;
         background: #CB4335;
         /* border: 2px solid #666; */
         color: #fff;
         text-align: center;
         font-style: bold;
         font: 32px Arial, sans-serif;
         }
         .numberCircle1 {
         border-radius: 25%;
         width: 36px;
         height: 30px;
         padding: 4px;
         background: green;
         /* border: 2px solid #666; */
         color: #fff;
         text-align: center;
         font-style: bold;
         font: 32px Arial, sans-serif;
         }
      </style>