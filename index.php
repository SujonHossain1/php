<?php include 'includes/header.php';

?>




<section id="content">
    <div ><?php include 'includes/slider.php'; ?></div>
    <!-- <div style="margin-top: 15px;"><?php include 'includes/home_category.php'; ?></div> -->
    <div style="margin-top: 15px;"><?php include 'includes/home_products.php'; ?></div>
    <div class="container">

</div>
</section>

<section class="content-bottom bg-white">
    <div class="container">
        <h1>About Us</h1>

        <div style="text-align: justify;"><?php echo $getstoreinfo['about'] ?></div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
