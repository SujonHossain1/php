
<section class="product-categories bg-gray ">

	<div class="container">
		<div class="row">
			<div id="" class="col-xs-12 col-md-12 product-listing">
				<div class="col-md-12" style="margin: 20px;">
					<div class="row">
						<div class="col-md-12 col-xs-12"><center><h1><b>Featured Categories</b></h1></center></div>
					</div>
				</div>
				<div class="row main-content">
					<?php
						$getcategory = $dc->getallcategory();
						if($getcategory!='false'){
							while($row = $getcategory->fetch_assoc()){ 
					 ?>
					<div class="col-xs-6 col-md-2  grid">
						<div class="product-thumb">
							<div class="img-holder_cat">
								<center><a href="category/<?php echo $row['cat_slug']; ?>"><img src="<?php echo $row['image']; ?>" alt="<?php echo $row['alt']; ?>"></a></center>
							</div>
							<div class="product-info">
								<div class="product-content-blcok">
									<h4 class="product-name" style="width: 100% !important;">
										<center><a href="category/<?php echo $row['slug']; ?>"><?php echo $row['cat_title']; ?></a></center>
									</h4>
								</div>
							</div>
						</div>
					</div>
				<?php }} ?>
				</div>
			</div>
		</div>
	</div>
</section>
