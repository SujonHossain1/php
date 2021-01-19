<?php 
include 'includes/config.php';
include 'includes/dataclass.php';
session_start();
$dc = new dataclass();
$getinfo = $dc->getinfo();
$getlogo = $dc->getlogo();
$logo = "";
$alt = "";
if($getlogo!='false'){
    $getlogo = $getlogo->fetch_assoc();
    $logo = $getlogo['logo_img'];
    $alt = $getlogo['alt'];
}

$getstoreinfo = $dc->getstoreinfo();
$getstoreinfo = $getstoreinfo->fetch_assoc();
$notice = "";
$getnotice = $dc->getnotice();
if($getnotice!='false'){
    $getnotice = $getnotice->fetch_assoc();
    $notice = $getnotice['notice'];
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <base href='http://localhost/queen/'>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>QUEEN DOHS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="<?php echo $logo ?>" rel="icon" />            
    <link href="catalog/view/theme/koyla/stylesheet/stylesheet.min.49.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--         <script>
window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
ga('create', 'UA-70432379-1', 'auto');
ga('send', 'pageview');
</script> -->

</head>
<body class="common-home">
    <header>

        <div class="main-header">
            <div class="container-fluid">
                <div class="row menu">
                    <div class="col-xs-6 col-sm-2 col-md-2 no-pad-xs">
                        <div id="nav-toggler"><span></span></div>
                        <div class="logo">
                            <a href=""><img src="<?php echo $logo ?>" alt="<?php echo $alt; ?>"></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-10 col-md-10 search-wrap">
                        <div class="top-bar">
                            <div class="">
                                <div class="hotline pull-right">
                                    <?php
                                    $phone = "";
                                    if($getinfo!='false'){
                                        $getinfo = $getinfo->fetch_assoc();
                                        $phone = $getinfo['phone'];
                                    } 
                                    ?>
                                    <a href="tel:<?php echo $phone; ?>"><span class="hotline-number">PHONE:  <?php echo $phone; ?></span></a>
                                </div>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-10 col-md-10 ">
                       <div class="main-nav">
                        <div class="">
                            <nav class="nav" id="main-nav">
                                <ul class="responsive-menu" style="background-color: #83878C;">
                                    <?php  
                                    $cat = $dc->getallcategory();
                                    if($cat!='false'){
                                        while($row = $cat->fetch_assoc()){ 
                                            $id = $row['cat_id'];
                                            $getcat = $dc->getsubcategorybyid($id);
                                            if($getcat!='false'){
                                                echo '<li class="has-child c-1">';
                                            }else{
                                                echo '<li>';
                                            }
                                            ?>

                                            <a href="category/<?php echo $row['cat_slug']; ?>"><?php echo $row['cat_title']; ?></a>
                                            <ul class="drop-down drop-menu-1">
                                             <?php
                                             $id = $row['cat_id'];
                                             $getcat = $dc->getsubcategorybyid($id);
                                             if($getcat!='false'){
                                                while($row_subcat = $getcat->fetch_assoc()){
                                                    $id = $row_subcat['sub_cat_id'];
                                                    $getsubsubid = $dc->getsubsubcategorybyid($id);
                                                    if($getsubsubid!='false'){
                                                        echo '<li class="has-child">';
                                                    }else{
                                                        echo '<li>';
                                                    }
                                                    ?>
                                                    <a href="sub-category/<?php echo $row_subcat['sub_slug']; ?>"><?php echo $row_subcat['sub_cat_name']; ?></a>
                                                    <ul class="drop-down drop-menu-2">
                                                        <?php
                                                        $id = $row_subcat['sub_cat_id'];
                                                        $getsubsubid = $dc->getsubsubcategorybyid($id);
                                                        if($getsubsubid!='false'){
                                                            while ($row_sub_sub = $getsubsubid->fetch_assoc()) {
                                                               ?>
                                                               <li><a href="sub-sub-category/<?php echo $row_sub_sub['sub_sub_slug']; ?>"><?php echo $row_sub_sub['name']; ?></a></li>
                                                           <?php }} ?>
                                                       </ul>
                                                   </li>
                                               <?php }} ?>

                                           </ul>
                                       </li> 
                                   <?php }} ?>
                                   <!-- <div class="search-box">
                                       <span class="fa fa-search"></span>
                                       <form action="" class="search-box-form">
                                           <input type="text" name="search" placeholder="Search for ...">
                                       </form>
                                    </div> -->
                               </ul>
                               <div class="search-box">
                                       <span class="fa fa-search"></span>
                                       <form action="" class="search-box-form">
                                           <input type="text" name="search" placeholder="Search for ...">
                                       </form>
                                </div>
                           </nav>
                       </div>
                   </div>              
               </div>

           </div>
       </div>
   </div>


</header>