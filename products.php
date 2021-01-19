<?php include 'includes/header.php'; ?>
<?php
$slug = $_GET['slug'];
$type = $_GET['type'];

$sql = "";
$showname = "";
if($type == 'category'){
	$get_category = $dc->getcategorybyslug($slug);
	if($get_category!='false'){
		$get_category = $get_category->fetch_assoc();
		$showname = $get_category['cat_title'];
		$cat_id = $get_category['cat_id'];
		$sql = "SELECT * from products where product_cat = '$cat_id'";
	}
}elseif ($type=="sub_category") {
	$get_category = $dc->getsub_categorybyslug($slug);
	if($get_category!='false'){
		$get_category = $get_category->fetch_assoc();
		$showname = $get_category['sub_cat_name'];
		$cat_id = $get_category['sub_cat_id'];
		$sql = "SELECT * from products where product_sub_cat = '$cat_id'";
	}
}elseif($type=="sub_sub_category"){

	$get_category = $dc->getsub_sub_categorybyslug($slug);
	if($get_category!='false'){
		$get_category = $get_category->fetch_assoc();
		$showname = $get_category['name'];
		$cat_id = $get_category['sub_sub_cat_id'];
		$sql = "SELECT * from products where sub_sub_cat = '$cat_id'";
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
				<h6 class="page-heading"><?php echo $showname; ?></h6>
			</div>
		</div>
	</div>
</section>
<section class="product-categories bg-gray p-tb-15">
	<div class="container">
		<div class="row">
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
					if($sql){
						$getproducts = $dc->getslugproducts($sql);
						if($getproducts!='false'){
							while($row = $getproducts->fetch_assoc()){ 
								$pro_id = $row['product_id'];
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
													<span><?php
													if($row['product_previous_price']!=""){
														echo '<center><span style="color:black"><del>'.$row['product_previous_price'].'৳</del></span>';
														echo '<span class="price_response">'.$row['product_price'].'৳</span></center>';
													}else{?>
														<center><span><?php echo $row["product_price"]; ?>৳</span></center>
													<?php } 
													?></span>
												</div>
												<div class="cart-btn" id="pro_<?php echo $pro_id; ?>">
													<button style="height: 100%;width: 100%;" pid='<?php echo $row['product_id'];?>' id='product'><i class="fa fa-shopping-cart" pid='<?php echo $row['product_id'];?>' id='product'></i>Add to cart</button>
												</div>
												<div class="cart-btn" style="display:none;" id="pro_cart_<?php echo $pro_id.'_cart'; ?>">
													<button style="float: left;width: 50%;" pid='<?php echo $pro_id; ?>' id='product_plus'>+</button>
													<button style="width: 50%;" pid='<?php echo $pro_id; ?>' id='product_minus'>-</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php 	}}} ?>
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