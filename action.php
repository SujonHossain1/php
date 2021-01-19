<?php
include 'includes/action_config.php';
session_start();
if(!isset($_SESSION['startech_cart'])){
	$_SESSION['startech_cart'] = array();
	$_SESSION['startech_dc'] = 0;
}
$get_charge = mysqli_query($con,"SELECT * from delivery_charge");
$get_charge = mysqli_fetch_assoc($get_charge);
$_SESSION['startech_dc'] = $get_charge['charge'];
$ip_add = getenv("REMOTE_ADDR");
?>

<?php 
if(isset($_POST['dosignup'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$num = $_POST['num'];
	$add = $_POST['add'];

	$isexists = mysqli_query($con,"SELECT * from user_info where email = '{$email}'");
	$isexists = mysqli_affected_rows($con);
	if($isexists>0){
		echo "exists";
	}else{
		mysqli_query($con,"INSERT into user_info (first_name,email,password,mobile,address1) values ('$name','$email','$password','$num','$add')");

		$get_info = mysqli_query($con,"SELECT * from user_info where email = '{$email}'");
		$get_info = mysqli_fetch_assoc($get_info);
		$_SESSION["startech_uid"] = $get_info['user_id'];
		$_SESSION['startech_uname'] = $get_info['first_name'];

		$user_id = $get_info['user_id'];

		/*mysqli_query($con,"UPDATE cart set user_id = '$user_id' where ip_add='$ip_add'");
		echo "UPDATE cart set user_id = '$user_id' where ip_add='$ip_add'";*/


	}
} 

if(isset($_POST['getcat'])){
	$cat_id = $_POST['catId'];

	$get_result = mysqli_query($con,"SELECT * from products where product_cat='{$cat_id}'");
	while ($row = mysqli_fetch_assoc($get_result)) {
		?>
		<div class="single__food__list d-flex wow fadeInUp">
			<div class="food__list__thumb">
				<a  href="product.php?pid=<?php echo $row['product_id']; ?>">
					<img class="responsive" style="max-height: 300px; max-width: 470px;  " src="<?php echo $row['product_image']; ?>" alt="list food images">
				</a>
			</div>
			<div class="food__list__inner d-flex align-items-center justify-content-between">
				<div class="food__list__details">
					<h2><a href="product.php?pid=<?php echo $row['product_id']; ?>"><?php echo $row['product_title']; ?></a></h2>
					<p class="responsive2" style="max-width: 500px;word-break:break-all;min-width: 500px;"><?php echo $row['product_desc']; ?></p>
					<div class="list__btn">
						<a class="food__btn grey--btn theme--hover"  href="menu-details.php?pid=<?php echo $row['product_id']; ?>">Order Now</a>
					</div>
				</div>
				<div class="food__rating">
					<div class="list__food__prize">
						<span><font style="font-size: 30px;">৳</font><?php echo $row['product_price']; ?></span>
					</div>
					<ul class="rating">
						<li><i class="zmdi zmdi-star"></i></li>
						<li><i class="zmdi zmdi-star"></i></li>
						<li><i class="zmdi zmdi-star"></i></li>
						<li><i class="zmdi zmdi-star"></i></li>
						<li class="rating__opasity"><i class="zmdi zmdi-star"></i></li>
					</ul>
				</div>
			</div>
		</div>
	<?php } }?>

	<?php 
	if(isset($_POST['getall'])){


		$get_result = mysqli_query($con,"SELECT * from products");
		while ($row = mysqli_fetch_assoc($get_result)) {
			?>
			<div class="single__food__list d-flex wow fadeInUp">
				<div class="food__list__thumb">
					<a  href="menu-details.php?pid=<?php echo $row['product_id']; ?>">
						<img style="max-height: 300px; max-width: 470px;  " class="responsive" src="<?php echo $row['product_image']; ?> " alt="list food images">
					</a>
				</div>
				<div class="food__list__inner d-flex align-items-center justify-content-between">
					<div class="food__list__details">
						<h2><a href="menu-details.php?pid=<?php echo $row['product_id']; ?>"><?php echo $row['product_title']; ?></a></h2>
						<p class="responsive2" style="max-width: 500px;word-break:break-all;min-width: 500px;"> <?php echo $row['product_desc']; ?></p>
						<div class="list__btn">
							<a class="food__btn grey--btn theme--hover"  href="menu-details.php?pid=<?php echo $row['product_id']; ?>">Order Now</a>
						</div>
					</div>
					<div class="food__rating">
						<div class="list__food__prize">
							<span><font style="font-size: 30px;">৳</font><?php echo $row['product_price']; ?></span>
						</div>
						<ul class="rating">
							<li><i class="zmdi zmdi-star"></i></li>
							<li><i class="zmdi zmdi-star"></i></li>
							<li><i class="zmdi zmdi-star"></i></li>
							<li><i class="zmdi zmdi-star"></i></li>
							<li class="rating__opasity"><i class="zmdi zmdi-star"></i></li>
						</ul>
					</div>
				</div>
			</div>
		<?php } }?>

		<?php 
	/*if(isset($_POST["addToCart"])){

		$p_id = $_POST["proId"];
		$qty_data = $_POST['qty'];


		if(isset($_SESSION["uid"])){
			$user_id = $_SESSION["uid"];

			$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
			$run_query = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run_query);
			if($count > 0){
				$get_qty = mysqli_fetch_assoc($run_query);
				$get_qty = $get_qty['qty'];
				$get_qty = $get_qty+$qty_data;
				mysqli_query($con,"UPDATE cart set qty = '{$get_qty}' WHERE p_id='{$p_id}' and user_id='{$user_id}'");
			} else {
				$sql = "INSERT INTO `cart`
				(`p_id`, `ip_add`, `user_id`, `qty`) 
				VALUES ('$p_id','$ip_add','$user_id','{$qty_data}')";
				if(mysqli_query($con,$sql)){
					echo "
					<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product is Added..!</b>
					</div>
					";
				}
			}
		}else{
			$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '{$ip_add}'";
			$run_query = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run_query);
			if($count > 0){
				$get_qty = mysqli_fetch_assoc($run_query);
				$get_qty = $get_qty['qty'];
				$get_qty = $get_qty+$qty_data;
				mysqli_query($con,"UPDATE cart set qty = '{$get_qty}' WHERE p_id='{$p_id}' and user_id='{$ip_add}'");
			} 
			else{
				$sql = "INSERT INTO `cart`
				(`p_id`, `ip_add`, `user_id`, `qty`) 
				VALUES ('$p_id','$ip_add','{$ip_add}','{$qty_data}')";
				if (mysqli_query($con,$sql)) {
					echo "
					<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Your product is Added Successfully..!</b>
					</div>
					";
					exit();
				}
			}

		}




	}*/
	if(isset($_POST["addToCart"])){


		$p_id = $_POST["proId"];
		$quantity = 1;

		if(array_key_exists($p_id, $_SESSION['startech_cart'])){
			$product = $_SESSION['startech_cart'][$p_id];
			echo $product['qty'];
			$product['qty'] += $quantity;
			echo $product['qty'];


			/*$product['id'] = $p_id;*/
		}else{
			$product = array(
				'id' =>$p_id,
				'qty' =>$quantity
			);
		}

		$_SESSION['startech_cart'][$p_id] = $product;
		echo "
		<div class='alert alert-success'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Product is Added..!</b>
		</div>
		";
	}
	?>

	<?php
	if(isset($_POST["minuscart"])){

		$p_id = $_POST["proId"];

		$quantity = 1;

		$product = $_SESSION['startech_cart'][$p_id];
		if($product['qty']==1){
			unset($_SESSION['startech_cart'][$p_id]);
		}else{
			if($product['qty']>1){
				$product['qty'] -= $quantity;

				$_SESSION['startech_cart'][$p_id] = $product;
			}
		}

	}

	?>

	<?php 
	if(isset($_POST["addToCart_single"])){

		/*$p_id = $_POST["proId"];
		$qty_data = 1;*/

		$p_id = $_POST["proId"];
		$quantity = 1;

		if(array_key_exists($p_id, $_SESSION['startech_cart'])){
			$product = $_SESSION['startech_cart'][$p_id];
			$product['qty'] += $quantity;
		}else{
			$product = array(
				'id' =>$p_id,
				'qty' =>$quantity
			);
		}

		$_SESSION['startech_cart'][$p_id] = $product;
		echo "
		<div class='alert alert-success'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Product is Added..!</b>
		</div>
		";



	}
	?>


	<?php 
	if(isset($_POST["addToCart_data"])){

		$p_id = $_POST["proId"];
		$quantity = $_POST['qty'];


		if(array_key_exists($p_id, $_SESSION['startech_cart'])){
			$product = $_SESSION['startech_cart'][$p_id];
			$product['qty'] = $quantity;
		}else{
			$product = array(
				'id' =>$p_id,
				'qty' =>$quantity
			);
		}

		$_SESSION['startech_cart'][$p_id] = $product;
		echo "
		<div class='alert alert-success'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Product is Added..!</b>
		</div>
		";


/*		if(isset($_SESSION["uid"])){
			$user_id = $_SESSION["uid"];

			$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
			$run_query = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run_query);
			if($count > 0){
				$get_qty = mysqli_fetch_assoc($run_query);
				$get_qty = $get_qty['qty'];
				$get_qty = $qty_data;
				mysqli_query($con,"UPDATE cart set qty = '{$get_qty}' WHERE p_id='{$p_id}' and user_id='{$user_id}'");
			} else {
				$sql = "INSERT INTO `cart`
				(`p_id`, `ip_add`, `user_id`, `qty`) 
				VALUES ('$p_id','$ip_add','$user_id','{$qty_data}')";
				if(mysqli_query($con,$sql)){
					echo "
					<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product is Added..!</b>
					</div>
					";
				}
			}
		}else{
			$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '{$ip_add}'";
			$run_query = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run_query);
			if($count > 0){
				$get_qty = mysqli_fetch_assoc($run_query);
				$get_qty = $get_qty['qty'];
				$get_qty = $qty_data;
				mysqli_query($con,"UPDATE cart set qty = '{$get_qty}' WHERE p_id='{$p_id}' and user_id='{$ip_add}'");
			} 
			else{
				$sql = "INSERT INTO `cart`
				(`p_id`, `ip_add`, `user_id`, `qty`) 
				VALUES ('$p_id','$ip_add','{$ip_add}','{$qty_data}')";
				if (mysqli_query($con,$sql)) {
					echo "
					<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Your product is Added Successfully..!</b>
					</div>
					";
					exit();
				}
			}

		}*/




	}
	?>

	<?php
	if(isset($_POST['getCartItem'])){
		$total = 0;
		foreach($_SESSION['startech_cart'] as $productId){
        //Print out the product ID.
			$pro_id =  $productId['id'];
			$qty =  $productId['qty'];
			$sql = "SELECT * FROM products where product_id='$pro_id'";

			$get_cart = mysqli_query($con,$sql);
			$show_price = 0;
			$row = mysqli_fetch_assoc($get_cart);
			$date = date("Y-m-d");
			$offer_price = mysqli_query($con,"SELECT * FROM offers where product_id='$pro_id' and time>='$date'");
			if(mysqli_affected_rows($con)>0){
				$temp_total = mysqli_fetch_assoc($offer_price);
				$temp_total = $temp_total['new_price'];
				$show_price = $temp_total;
			}else{
				$temp_total  = $row['product_price'];
				$show_price = $temp_total;
			}
			$temp_total = $temp_total*$qty;
			$total +=$temp_total;

			?>
			<div class="cartbox__items">
				<!-- Cartbox Single Item -->
				<div class="cartbox__item">
					<div class="cartbox__item__thumb">
						<a href="product.php?p=<?php echo $row['product_id']; ?>">
							<img style="max-width: 70px !important;"   src="<?php echo $row['product_image']; ?>">
						</a>
					</div>
					<div class="cartbox__item__content" style="width: 70%;">
						<h5><a  href="product.php?p=<?php echo $row['product_id']; ?>" class="product_name"><div class="b"><?php echo $row['product_title']; ?></div></a></h5>
						<p>Qty: <span><?php echo $qty." X ".$show_price; ?></span></p>
						<span class="price">৳<?php echo " ".$temp_total; ?></span>
					</div>
					<button  class="cartbox__item__remove" id="remove" prodi="<?php echo $row['product_id']; ?>">
						<i class="fa fa-trash cartbox__item__remove" id="remove" prodi="<?php echo $row['product_id']; ?>"></i>
					</button>
				</div><!-- //Cartbox Single Item -->
				<!-- Cartbox Single Item -->

				<!-- Cartbox Single Item -->

			</div>
		<?php }
		if($total>0){
			$ship = $_SESSION['startech_dc'];
		}else{
			$ship=0;
		}
		?>

		<div class="cartbox__total">
			<ul>
				<li><span class="cartbox__total__title">Subtotal</span><span class="price">৳<?php echo " ".$total; ?></span></li>
				<li class="shipping-charge"><span class="cartbox__total__title">Shipping Charge</span><span class="price">৳&nbsp;<?php echo $ship; ?></span></li>
				<li class="grandtotal">Total<span class="price">৳&nbsp;<?php echo $total+$ship; ?></span></li>
			</ul>
		</div>
		<div class="cartbox__buttons">
			<a class="food__btn" href="cart.php"><span>View cart</span></a>
			<a class="food__btn" href="checkout.php"><span>Checkout</span></a>
		</div>


	<?php }?>

	<?php 
	if(isset($_POST["remove"])){

		$p_id = $_POST["proId"];


			/*if(isset($_SESSION["uid"])){
				$user_id = $_SESSION["uid"];

				$query = "DELETE from cart WHERE p_id='$p_id' and  user_id='{$user_id}'";


				mysqli_query($con,$query);

			}else{
				$query = "DELETE from cart WHERE p_id='$p_id' and user_id='{$ip_add}'";
				mysqli_query($con,$query);
			}*/
			unset($_SESSION['startech_cart'][$p_id]);



		}
		?>

		<?php 
		if (isset($_POST["count_item"])) {
//When user is logged in then we will count number of item in cart by using user session id
		/*if (isset($_SESSION["uid"])) {
			$user_id = $_SESSION['uid'];
			$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = '$user_id'";
		}else{
	//When user is not logged in then we will count number of item in cart by using users unique ip address
			$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id ='{$ip_add}'";
		}

		$query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($query);
		echo $row["count_item"];*/
		$items_in_cart = count($_SESSION['startech_cart']);
		echo $items_in_cart;
	} ?>

	<?php
	if(isset($_SESSION['startech_logout'])){
		$_SESSION['startech_uid']='';

		echo $_SESSION['startech_uid'];
	} 
	?>
	<?php 
	if(isset($_POST['count_total_amount'])){
		$total = 0;
		foreach($_SESSION['startech_cart'] as $productId){
        //Print out the product ID.
			$pro_id =  $productId['id'];
			$qty =  $productId['qty'];
			$sql = "SELECT * FROM products where product_id='$pro_id'";

			$get_cart = mysqli_query($con,$sql);
			$show_price = 0;
			$row = mysqli_fetch_assoc($get_cart);
			$date = date("Y-m-d");
			$offer_price = mysqli_query($con,"SELECT * FROM offers where product_id='$pro_id' and time>='$date'");
			if(mysqli_affected_rows($con)>0){
				$temp_total = mysqli_fetch_assoc($offer_price);
				$temp_total = $temp_total['new_price'];
				$show_price = $temp_total;
			}else{
				$temp_total  = $row['product_price'];
				$show_price = $temp_total;
			}
			$temp_total = $temp_total*$qty;
			$total +=$temp_total;
			
		}
		$ship = $_SESSION['startech_dc'];
		$total = $total+$ship;
		echo "৳ ".$total;



/*
		if (isset($_SESSION["uid"])) {
	//When user is logged in this query will execute
			$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
		}else{
	//When user is not logged in this query will execute
			$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id = '{$ip_add}'";
		} 
		$get_cart = mysqli_query($con,$sql);
		$total = 0;
		while($row = mysqli_fetch_assoc($get_cart)){
			$pro_id = $row['product_id'];
			$date = date("Y-m-d");
			$offer_price = mysqli_query($con,"SELECT * FROM offers where product_id='$pro_id' and time>='$date'");
			if(mysqli_affected_rows($con)>0){
				$temp_total = mysqli_fetch_assoc($offer_price);
				$temp_total = $temp_total['new_price'];
			}else{
				$temp_total  = $row['product_price'];
			}
			$qty = $row['qty'];
			$temp_total = $temp_total*$qty;
			$total +=$temp_total;
		}

		if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
			$get_delivery  = mysqli_query($con,"SELECT max(a.delivery_charge) delivery_charge,a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]' GROUP by b.id ORDER BY a.delivery_charge desc");
			$get_delivery = mysqli_fetch_assoc($get_delivery);
			$ship = $get_delivery['delivery_charge'];
		}else{
		//When user is not logged in this query will execute
			$get_delivery  =mysqli_query($con,"SELECT max(a.delivery_charge) delivery_charge,a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id = '{$ip_add}' GROUP by b.id ORDER BY a.delivery_charge desc");
			$get_delivery = mysqli_fetch_assoc($get_delivery);
			$ship = $get_delivery['delivery_charge'];

		}

		$total = $total+$ship;
		echo "৳ ".$total;

	}*/
}?>

<?php 
if(isset($_POST["addToCart_qty"])){

	$p_id = $_POST["proId"];
	$quantity = $_POST['qty'];

	if(array_key_exists($p_id, $_SESSION['startech_cart'])){
		$product = $_SESSION['startech_cart'][$p_id];
		$product['qty'] += $quantity;
	}else{
		$product = array(
			'id' =>$p_id,
			'qty' =>$quantity
		);
	}

	$_SESSION['startech_cart'][$p_id] = $product;
	echo "
	<div class='alert alert-success'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>Product is Added..!</b>
	</div>
	";




/*		if(isset($_SESSION["uid"])){
			$user_id = $_SESSION["uid"];

			$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
			$run_query = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run_query);
			if($count > 0){
				$get_qty = mysqli_fetch_assoc($run_query);
				$get_qty = $get_qty['qty'];
				$get_qty = $get_qty+$qty_data;
				mysqli_query($con,"UPDATE cart set qty = '{$get_qty}' WHERE p_id='{$p_id}' and user_id='{$user_id}'");
			} else {
				$sql = "INSERT INTO `cart`
				(`p_id`, `ip_add`, `user_id`, `qty`) 
				VALUES ('$p_id','$ip_add','$user_id','{$qty_data}')";
				if(mysqli_query($con,$sql)){
					echo "
					<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product is Added..!</b>
					</div>
					";
				}
			}
		}else{
			$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '{$ip_add}'";
			$run_query = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run_query);
			if($count > 0){
				$get_qty = mysqli_fetch_assoc($run_query);
				$get_qty = $get_qty['qty'];
				$get_qty = $get_qty+$qty_data;
				mysqli_query($con,"UPDATE cart set qty = '{$get_qty}' WHERE p_id='{$p_id}' and user_id='{$ip_add}'");
			} 
			else{
				$sql = "INSERT INTO `cart`
				(`p_id`, `ip_add`, `user_id`, `qty`) 
				VALUES ('$p_id','$ip_add','{$ip_add}','{$qty_data}')";
				if (mysqli_query($con,$sql)) {
					echo "
					<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Your product is Added Successfully..!</b>
					</div>
					";
					exit();
				}
			}

		}*/




	}
	?>
	<?php 
	if(isset($_POST['update_user_data'])){
		$user_id = $_SESSION['startech_uid'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$number = $_POST['number'];
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];

		mysqli_query($con,"UPDATE user_info set first_name='{$first_name}',last_name='{$last_name}',email='{$email}',user_info.password='{$password}',mobile='{$number}',address1='{$address1}',address2='{$address2}' where user_id='{$user_id}'");
	}
	?>
	<?php
	if(isset($_POST['convertpoints'])){ 
		$id = $_POST['id'];
		$get_point = mysqli_query($con,"SELECT * from user_info where user_id='$id'");
		$get_point = mysqli_fetch_assoc($get_point);
		$point = $get_point['point'];
		$amount_temp = $get_point['amount'];

		$get_point_divider = mysqli_query($con,"SELECT * FROM `apoint`");
		$get_point_divider = mysqli_fetch_assoc($get_point_divider);
		$point_divider = $get_point_divider['points'];

		if($point>0){
			$amount = $point/$point_divider;
			$amount += $amount_temp;
			mysqli_query($con,"UPDATE user_info set point='0',amount='$amount' where user_id='$id'");
		}
		?>
		<div class="my-account-download account-wrapper">
			<?php
			$host = $_SERVER['HTTP_HOST'];
			$link = "http://".$host."/affliationlogin.php?oh=".sha1($_SESSION['startech_uid'])."&afsignup=".$_SESSION['startech_uid']; 
			$afid = $id;
			$get_point = mysqli_query($con,"SELECT * from user_info where user_id='$afid'");
			$get_point = mysqli_fetch_assoc($get_point);
			$point = $get_point['point'];

			

			?>
			<h4 class="account-title">Affliate Option</h4>
			<div class="mt-30 table-responsive">
				<table class="table">
					<tr>
						<th>Affliate Point : &nbsp;<?php echo $point; ?> </th>
						<td><button class="button" onclick="convert(<?php echo $afid; ?>)">Convert to taka</button></td>
					</tr>
					<tr>
						<th>Affliate amount : &nbsp;<?php echo $get_point['amount']; ?>&nbsp;৳ </th>
						<td></td>
					</tr>
					<tr>
						<th><h4 style="color: #9F6D2D">Ask your friends to sign up with this link to get affliation point</h4></th>
						<td></td> 
					</tr>

					<tr>
						<th><input class="form-control" type="text" name="" value="<?php echo $link; ?>"  name="link" id="link"></th>
						<td><button class="button" onclick="copy()">Copy Link</button></td>
					</tr>
				</table>
			</div>
		</div>
	<?php } ?>
	<style>

		div.b {
			width: 190px; 
			word-wrap: break-word;
		}
	</style>


