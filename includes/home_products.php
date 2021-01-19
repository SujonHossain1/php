<?php
$getcategory = $dc->getallcategory();
if($getcategory!='false'){
	while($row = $getcategory->fetch_assoc()){
		$getproducts = $dc->getproductbycategory($row['cat_id']);
		if($getproducts!='false'){
			?>
			<section class="product-categories bg-gray ">
				<div class="container">
					<div class="row">
						<div id="" class="col-xs-12 col-md-12 product-listing">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6 col-xs-12"><h1><?php echo $row['cat_title'] ?></h1></div>
									<div class="col-md-6 col-xs-12"><span style="float: right;padding: 10px;"><a class="btn button" href="category/<?php echo $row['cat_slug']; ?>" style="padding: 5px; ">View All</a></span></div>
								</div>
							</div>
							<div class="row main-content">
								<?php
								while($row1 = $getproducts->fetch_assoc()){  
									$pro_id = $row1['product_id'];
									?>
									<div class="col-xs-6 col-md-2  grid">
										<div class="product-thumb">
											<div class="img-holder">
												<center><a href="products/<?php echo $row1['product_slug']; ?>"><img src="<?php echo $row1['product_image']; ?>" alt="<?php echo $row1['product_alt']; ?>"></a></center>
											</div>
											<div class="product-info">
												<div class="product-content-blcok" style="height:53px;">
													<h4 class="product-name" style="display: table-cell; vertical-align: middle;height:53px;">
														<center><a href="products/<?php echo $row1['product_slug']; ?>"><?php echo substr($row1['product_title'],0,32); ?></a></center>
													</h4>
												</div>
												<div class="actions">
													<div class="price space-between">
														<span><?php
														if($row1['product_previous_price']!=""){
															echo '<center><span style="color:black"><del>'.$row1['product_previous_price'].'৳</del></span>';
															echo '<span class="price_response">'.$row1['product_price'].'৳</span></center>';
														}else{?>
															<center><span><?php echo $row1["product_price"]; ?>৳</span></center>
														<?php } 
														?></span>                                                     
													</div>
													<div class="cart-btn" id="pro_<?php echo $pro_id; ?>">
														<button style="height: 100%;width: 100%;" pid='<?php echo $row1['product_id'];?>' id='product'><i class="fa fa-shopping-cart" pid='<?php echo $row1['product_id'];?>' id='product'></i>Add to cart</button>
													</div>
													<div class="cart-btn" style="display:none;" id="pro_cart_<?php echo $pro_id.'_cart'; ?>">
														<button style="float: left;width: 50%;" pid='<?php echo $pro_id; ?>' id='product_plus'>+</button>
														<button style="width: 50%;" pid='<?php echo $pro_id; ?>' id='product_minus'>-</button>
													</div>
													<!-- <div  class="cart-btn" style="display:none;" id="pro_cart_<?php echo $pro_id.'_cart'; ?>">
														<button style="width: 50%;float: left;" pid='<?php echo $pro_id; ?>' id='product_plus'  href="#"><span >+</span></button>
														<button style="width:50%;float: left; " pid='<?php echo $pro_id; ?>' id='product_minus'   href="#"><span>-</span></button> 
													</div> -->
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php }}} ?>
		
<style>
    @media screen and (min-width: 1100px) {
        .img-holder{
            height:130px;
            
        } .product-thumb .img-holder img {
            max-height:130px;
            
        }
        .product-name{
            width:125px;
        }
        
    }
    @media screen and (max-width: 1024px) {
        .img-holder{
            height:100px;
            
        } .product-thumb .img-holder img {
            max-height:100px;
            
        }
        .product-name{
            width:91px;
        }
        
    }
    @media screen and (max-width: 768px) {
        .img-holder{height:310px;
            
        } 
        .product-thumb .img-holder img {
            max-height:310px;
            
        }
        .product-name{
            width:305px;
        }
        
    }
    @media screen and (max-width: 600px) {
        .img-holder{
            height:140px;
            
        } .product-thumb .img-holder img {
            max-height:140px;
            
        }
        .product-name{
            width:200px;
        }
        
    }
    @media screen and (max-width: 360px) {
        .img-holder{
            height:110px;
            
        } 
        .product-thumb .img-holder img {
            max-height:110px;
            
        }
        .product-name{
            width:110px;
        }
        
    }
</style>

