<?php include 'includes/header.php'; 
if(!isset($_SESSION['startech_uid'])){
    echo '<script>alert("Please login first!")</script>';
    echo '<script>window.location.href="login.php"</script>';
}else{
    $info = $dc->getcustomerinfo($_SESSION['startech_uid']);
    if($info!='false'){
        $info = $info->fetch_assoc();
    }
}
?>
<section class="after-header p-tb-10">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <ul class="breadcrumb">
                    <li><a href="checkout.php">Order Placed</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="col-sm-4">
                <h6 class="page-heading">Order Placed</h6>
            </div>
        </div>
    </div>
</section>
<div class="container alert-container">
</div>

<section class="checkout bg-white">
    <div class="container">
        <!-- <h1 class="page-title">Checkout</h1> -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row row-payment-delivery-order">
                    <div class="col-md-12 col-sm-12 payment-methods">
                        <div class="page-section">
                            <div class="section-head">
                                <h1><span><i class="fa fa-check-circle" aria-hidden="true" style="color: white;"></i></span>SUCCESS</h1>
                            </div>
                            <center><p><h1><i class="fa fa-check-circle" aria-hidden="true" style="color:green;font-size: 30px;"></i>&nbsp;&nbsp;&nbsp;Order Placed Successfully</h1></p></center>

                        </div>
                        <div class="buttons">
                            <div class="pull-right"><a href="" class="btn btn-primary">Continue Shopping</a></div>
                        </div>
                    </div>
               <!--  <div class="col-md-6 col-sm-12 delivery-methods">
                    <div class="page-section">
                        <div class="section-head">
                            <h1><span>3</span>Delivery Method</h1>
                        </div>
                        <p>Select a delivery method</p>
                        <label class="radio-inline">
                            <input type="radio" name="shipping_method" value="flat.flat" checked="checked" />
                        Flat Shipping Rate - 50৳                                </label>
                        <input type="hidden" name="flat.flat.title" value="Flat Shipping Rate">
                    </div>
                </div> -->

            </div>
        </div>
    </div>

</div>
</section>
<section class="content-bottom">
    <div class="container">
    </div>
</section>
<?php include 'includes/footer.php'; ?>


