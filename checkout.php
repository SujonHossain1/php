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
                    <li><a href="checkout.php">Checkout</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="col-sm-4">
                <h6 class="page-heading">Checkout</h6>
            </div>
        </div>
    </div>
</section>
<div class="container alert-container">
</div>

<section class="checkout bg-white">
    <div class="container">
        <!-- <h1 class="page-title">Checkout</h1> -->
        <form class="checkout-content" id="checkout-form" action="checkout_process.php" method="post">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="page-section">
                        <div class="section-head">
                            <h1><span>1</span>Customer Information</h1>
                        </div>
                        <div class="address">
                            <div class="form-group">
                                <input class="form-control" name="firstname" type="text" id="input-firstname"  placeholder="First Name*"  value="<?php echo $info['first_name']; ?>">
                            </div>
                            <div class="form-group">
                             <input type="text" id="input-lastname" name="lastname"  class="form-control" placeholder="Last Name*"  value="<?php echo $info['last_name']; ?>">
                         </div>
                         <div class="form-group">
                            <input type="text" id="input-address" name="address_1"  class="form-control" placeholder="Address*"  value="<?php echo $info['address1'].' '.$info['address2']; ?>">
                        </div>
                        <div class="form-group">
                         <input type="tel" id="input-telephone" name="telephone" value="<?php echo $info['mobile']; ?>"  class="form-control" placeholder="Telephone*"  >
                     </div>
                     <div class="form-group">
                        <input type="email" id="input-email" name="email" value="<?php echo $info['email']; ?>" class="form-control" placeholder="E-Mail*" >
                    </div>
                    <div class="form-group">
                        <input type="text" id="input-city" name="city"  class="form-control"  placeholder="City*"  value="<?php echo $info['city']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" id="input-city" name="state"  class="form-control"  placeholder="Region / State*"  value="<?php echo $info['region']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" id="input-city" name="zip"  class="form-control"  placeholder="Region / State*"  value="<?php echo $info['post_code']; ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control"  name="comment" value="" placeholder="Any special instructions" rows="6"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="row row-payment-delivery-order">
                <div class="col-md-12 col-sm-12 payment-methods">
                    <div class="page-section">
                        <div class="section-head">
                            <h1><span>2</span>Payment Method</h1>
                        </div>
                        <p>Select a payment method</p>
                        <label class="radio-inline">
                            <input type="radio" name="payment_method" value="cod" checked="checked">
                            Cash on delivery
                        </label>
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
                <div class="col-md-12 col-sm-12">
                    <div class="page-section">
                        <div class="section-head">
                            <h1><span>4</span>Order Overview</h1>
                        </div>
                        <table class="koyla-table bg-white checkout-data">
                            <thead>
                                <tr>
                                    <td>Product Name</td>
                                    <td class="rs-none">Unit Price</td>
                                    <td class="rs-none">Quantity</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total = 0;
                                foreach($_SESSION['startech_cart'] as $productId){
                                    $pro_id =  $productId['id'];
                                    $qty =  $productId['qty'];
                                    $sql = "SELECT * FROM products where product_id='$pro_id'";

                                    $get_cart = $dc->getproductsforcarts($sql);
                                    $show_price = 0;
                                    $row = $get_cart->fetch_assoc();
                                    $temp_total  = $row['product_price'];
                                    $show_price = $temp_total;
                                    $temp_total = $temp_total*$qty;
                                    $total +=$temp_total;
                                    ?> 
                                    <tr>
                                        <td class="name">
                                            <a href="products/<?php echo $row['product_slug']; ?>"><?php echo $row['product_title']; ?></a>
                                            <div class="options">
                                            </div>
                                        </td>
                                        <td class="rs-none"><?php echo $row['product_price']; ?>৳   </td>
                                        <td class="rs-none"><?php echo $qty; ?>   </td>
                                        <td class="price text-right"><?php echo number_format($temp_total); ?> ৳</td>
                                    </tr>
                                <?php } ?>
                                <?php
                                if($total>0){
                                    $ship = $_SESSION['startech_dc'];
                                } else{
                                    $ship = 0;
                                }
                                ?>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Sub-Total:</strong></td>
                                    <td class="text-right"><?php echo number_format($total); ?>৳</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Shipping Rate:</strong></td>
                                    <td class="text-right"><?php echo $ship; ?> ৳</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                                    <td class="text-right"><?php echo number_format($total+$ship); ?> ৳</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-right" style="margin-bottom: 10px">I have read and agree to the <a href="policy" target="_blank"><b>Terms and Conditions</b></a>, <a href="privacy-policy" target="_blank"><b>Privacy Policy</b></a>                                                               <input type="checkbox" name="agree" value="1" checked="checked" />
                    </div>
                    <div class="clearfix"></div>
                    <button style="margin-bottom: 20px" type="submit" class="btn submit-btn pull-right" type="submit">Confirm Order</button>
                </div>
            </div>
        </div>
    </div>
</form>

</div>
</section>
<section class="content-bottom">
    <div class="container">
    </div>
</section>
<?php include 'includes/footer.php'; ?>


