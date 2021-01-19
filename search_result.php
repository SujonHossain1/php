<?php
include 'includes/header.php';
$sql = "";
if(isset($_GET['search'])){
	$search_data =  $_GET['search'];
	$category="";
	if(isset($_GET['category_id'])){
		$category =  $_GET['category_id'];
	}
	if($category!=''){
		$sql = "SELECT * from products where product_cat = '$category' and product_title LIKE '%".$search_data."%' group by product_id";
	}else{
		$sql = "SELECT * from products where product_title LIKE '%".$search_data."%' group by product_id";
	}
} 
?>
<section class="after-header p-tb-10">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">

				<div class="clear"></div>
			</div>
			<div class="col-sm-4">
				<h6 class="page-heading">Search Result</h6>
			</div>
		</div>
	</div>
</section>
<section class="product-categories bg-gray p-tb-15"><div class="container"><div class="row">
	<div id="content" class="col-xs-12 col-md-12 product-listing">
		<div class="clear ads ads-pos-7" data-position="7"></div>

		<div class="top-bar">
			<div class="row">
				<div class="col-sm-4 col-xs-2 view-switch">
				</div>
			</div>
		</div>
		<div class="row main-content">
			<?php
			if($sql!=""){
				$products = $dc->search_result($sql);
				if($products!="false"){
					while ($row = $products->fetch_assoc()) { 
						?>
						<div class="col-xs-12 col-md-3 product-layout grid">
							<div class="product-thumb">
								<div class="img-holder">
									<a href="products/<?php echo $row['product_slug']; ?>"><img src="<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_alt']; ?>"></a>
								</div>
								<div class="product-info">
									<div class="product-content-blcok">
										<h4 class="product-name">
											<center><a href="products/<?php echo $row['product_slug']; ?>"><?php echo substr($row['product_title'],0,32); ?></a></center>
										</h4>
									</div>
									<div class="actions">
										<div class="price space-between">
											<center><span><?php echo $row['product_price']; ?>৳</span></center>
										</div>
										<div class="cart-btn" id="pro_<?php echo $pro_id; ?>">
											<button style="height: 100%;width: 100%;" pid='<?php echo $row['product_id'];?>' id='product'><i class="fa fa-shopping-cart" pid='<?php echo $row['product_id'];?>' id='product'></i>Buy Now</button>
										</div>
										<div class="cart-btn" style="display:none;" id="pro_cart_<?php echo $pro_id.'_cart'; ?>">
											<button style="float: left;width: 50%;" pid='<?php echo $pro_id; ?>' id='product_plus'>+</button>
											<button style="width: 50%;" pid='<?php echo $pro_id; ?>' id='product_minus'>-</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }}} ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'includes/footer.php'; ?>
<style>
    @media screen and (min-width: 1100px) {.img-holder{height:230px;} .product-thumb .img-holder img {max-height:230px;}}
   @media screen and (max-width: 1024px) {.img-holder{height:180px;} .product-thumb .img-holder img {max-height:180px;}}
    /*@media screen and (max-width: 768px) {.img-holder{height:310px;} .product-thumb .img-holder img {max-height:310px;}}
    @media screen and (max-width: 600px) {.img-holder{height:140px;} .product-thumb .img-holder img {max-height:140px;}}*/
</style>