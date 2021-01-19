<?php include 'includes/header.php';
$slug = "";
$product_name="";
if(isset($_GET['slug'])){
    $slug = $_GET['slug'];
    $get_product = $dc->getproductbyslug($slug);
    if($get_product!='false'){
        $row = $get_product->fetch_assoc();
        $product_name = $row['product_title'];
    }
}
?>

<section class="after-header p-tb-10">
    <div class="container">
        <ul class="breadcrumb">
            <li ><span><?php echo $product_name; ?></span></li>
        </ul>
    </div>
</section>
<section id="content-top">
    <div class="container">

    </div>
</section>
<?php
    if(isset($product_name)){ 
 ?>
<div class="product-details content">
    <section class="basic bg-gray p-tb-15">
        <div class="container">
            <div class="bg-white">
                <div class="row clearfix">
                    <div class="col-md-6 left">
                        <div class="images product-images">
                            <div class="product-img-holder">
                                <img class="main-img" src="<?php echo $row['product_image']; ?>" title="<?php echo $row['product_title']; ?>" alt="<?php echo $row['product_alt']; ?>" />
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 right">
                        <div class="product-short-info">
                            <h1 itemprop="name" class="product-name"><?php echo $row['product_title']; ?></h1>
                            <table class="product-info-table">
                                <tr class="product-info-group">
                                    <td class="product-info-label">Price</td>
                                    <td class="product-info-data product-price"><?php echo number_format($row['product_price']); ?>৳</td>
                                </tr>
                                <tr class="product-info-group">
                                    <td class="product-info-label">Previous Price</td>
                                    <td class="product-info-data product-price"><deL><?php echo $row['product_previous_price']; ?> ৳</deL></td>
                                </tr>

                                <tr class="product-info-group">
                                    <td class="product-info-label">Product Code</td>
                                    <td class="product-info-data product-status"><?php echo $row['product_id']; ?></td>
                                </tr>
                                <tr class="product-info-group">
                                    <td class="product-info-label">Status</td>
                                    <td class="product-info-data product-status">In Stock</td>
                                </tr>
                            </table>
                        </div>
                        <div class="short-description" style="visibility: hidden;">
                            <h2></h2>
                            <ul><li></li><li>
                            </li><li>
                            </li><li>
                            </li><li></li><a class="view-more" href="#specification"></a></ul>
                        </div>

                        <div id="product1" class="cart-option" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                            <div class="price-wrap">
                                <ins><?php echo number_format($row['product_price']); ?>৳</ins>
                            </div>
                            
                            <div class="quantity">
                                <span class="ctl"><i class="fa fa-minus" onclick="minus()"></i></span>
                                <span class="qty"><input type="text" name="quantity" id="qty" value="1" size="2"></span>
                                <span  class="ctl increment" onclick="plus()"><i class="fa fa-plus"></i></span>
                                <input type="hidden" name="product_id" value="10599" />
                            </div>
                            <button id="product_with_quantity" pid="<?php echo $row['product_id']; ?>" class="btn submit-btn" data-loading-text="Loading..." >Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
             <section class="description bg-white m-tb-15 p-15" id="description">
                <h2 class="section-head">Description :</h2><div  itemprop="description"><h2><?php echo $row['product_title'] ?></h2>
                    <p style="text-align: justify; "><?php echo $row['product_desc'] ?></p>
                    <!-- <div class="video-wrapper"><iframe width="560" height="315" src="https://www.youtube.com/embed/161trKFRaZg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div> --></div>
                </section>
            </div>
        </div>
    </div>
</div>
<section class="content-bottom">
    <div class="container">
    </div>
</section>
<?php } ?>
<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
    function plus() {
        var quantity = Number($("#qty").val());
        quantity = quantity+1;
        $("#qty").val(quantity);
    }
    function minus() {
        var quantity = Number($("#qty").val());
        if(quantity>1){
           quantity = quantity - 1;
           $("#qty").val(quantity); 
       }

   }
</script>