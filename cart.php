<?php include 'includes/header.php'; ?>
<section class="after-header p-tb-10">
 <div class="container">
  <div class="row">
   <div class="col-sm-8">
    <ul class="breadcrumb">
     <li><i class="fa fa-home" title="Home"></i></li>
     <li>Shopping Cart</li>
 </ul>
 <div class="clear"></div>
</div>
<div class="col-sm-4">
    <h6 class="page-heading">Shopping Cart</h6>
</div>
</div>
</div>
</section>
<div class="container alert-container"></div>
<div class="container cart body">
 <div class="row">
  <div id="content" class="col-sm-12">
   <p style="text-align: center;"></p>
   <h1 class="title">Shopping Cart              
   </h1>
   <form action="https://www.startech.com.bd/checkout/cart/edit" method="post" enctype="multipart/form-data">
    <div class="table-responsive">
     <table class="table table-bordered cart-table bg-white">
      <thead>
       <tr>
        <td class="text-center rs-none">Image</td>
        <td class="text-left">Product Name</td>
        <td class="text-left">Quantity</td>
        <td class="text-right rs-none">Unit Price</td>
        <td class="text-right">Total</td>
    </tr>
</thead>
<tbody>
    <?php 
    $total = 0;
    $discount_total = 0;
    foreach($_SESSION['startech_cart'] as $productId){
        $pro_id =  $productId['id'];
        $qty =  $productId['qty'];
        $sql = "SELECT * FROM products where product_id='$pro_id'";

        $get_cart = $dc->getproductsforcarts($sql);
        $show_price = 0;
        $row = $get_cart->fetch_assoc();

        $temp_total  = $row['product_price'];
        $temp_discount = $row['product_previous_price'];
        if($temp_discount==""){
            $temp_discount = $row['product_price'];
        }
        $show_price = $temp_total;
        $temp_total = $temp_total*$qty;
        $temp_discount = $temp_discount*$qty;
        $total +=$temp_total;
        $discount_total +=$temp_discount;
        ?> 
        <tr>
            <td class="text-center rs-none">                  
                <img style="max-height: 70px;" src="<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_alt']; ?>" title="<?php echo $row['product_alt']; ?>" class="img-thumbnail" />
            </td>
            <td class="text-left"><a href="products/<?php echo $row['product_slug']; ?>"><?php echo $row['product_title']; ?></a>
            </td>
            <td class="text-left">
             <div class="input-group btn-block" style="max-width: 200px;">
              <input type="text"  value="<?php echo $qty; ?>" size="1" class="form-control" id="qty_<?php echo $row['product_id'] ?>"/>
              <span class="input-group-btn">
                <button type="submit"  title="Update" class="btn btn-primary" onclick="update_cart_data('<?php echo $row['product_id']; ?>','')" ><i class="fa fa-refresh"></i></button>
                <button type="button"  title="Remove" class="btn btn-danger" id="remove1" prodi="<?php echo $row['product_id']; ?>"><i class="fa fa-times-circle" id="remove1" prodi="<?php echo $row['product_id']; ?>"></i></button></span>
            </div>
        </td>
        <td class="text-right rs-none"><?php if($row['product_previous_price']!='' && $row['product_previous_price']>$row['product_price']){
            echo '<del>'.$row['product_previous_price'].' ৳</del>&nbsp;&nbsp';
        } echo number_format($row['product_price']); ?> ৳</td>
        <td class="text-right"><?php echo number_format($temp_total); ?> ৳</td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</form>
<?php
if($total>0){
    $ship = $_SESSION['startech_dc'];
} else{
    $ship = 0;
}
?>
<div class="row">
    <div class="col-sm-4 col-sm-offset-8">
     <table class="table table-bordered bg-white">
      <tr>
       <td class="text-right"><strong>Sub-Total:</strong></td>
       <td class="text-right">
        <?php 
        if($discount_total>0){
            if($discount_total>$total){
                echo '<del>'.$discount_total.' ৳</del><br>';
            }
        } echo number_format($total); ?> ৳</td>
    </tr>
    <tr>
       <td class="text-right"><strong>Shipping Rate:</strong></td>
       <td class="text-right"><?php echo $ship; ?> ৳</td>
   </tr>
   <tr>
       <td class="text-right"><strong>Total:</strong></td>
       <td class="text-right"><?php echo number_format($total+$ship); ?> ৳</td>
   </tr>
</table>
</div>
</div>
<div class="buttons">
    <div class="pull-right"><a href="checkout.php" class="btn btn-primary checkout-btn">Continue to checkout</a></div>
    <div class="pull-right"><a href="" class="btn btn-primary">Continue Shopping</a></div>
</div>
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>

<script type="text/javascript">

    $("body").delegate("#remove1","click",function(event){
        var pid = $(this).attr("prodi");
        event.preventDefault();
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {remove:1,proId:pid},
            success : function(data){
                window.location.href="cart.php";
            }
        })
    })


    function update_cart_data(pro_id,type){
        var proid = Number(pro_id);
        var qty = $("#qty_".concat(proid)).val();
        console.log(type);
        if(type=="plus"){
            qty = Number(qty)+1;
        }if(type == "minus"){
            qty = Number(qty)-1;
        }if(type=="");
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {addToCart_data:1,proId:proid,qty:qty},
            success : function(data){
                window.location.href="cart.php";
            }
        })
    }
</script>