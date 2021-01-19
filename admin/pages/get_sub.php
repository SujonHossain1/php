<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<?php
include('../includes/connection.php');
if(!empty($_POST["cat_id"])) 
{
	$id=intval($_POST['cat_id']);
	$query=mysqli_query($db,"SELECT * FROM sub_category WHERE cat_id=$id");
	?>
	<option value="">Select Subcategory</option>
	<?php
	while($row=mysqli_fetch_array($query))
	{
		?>
		<option value="<?php echo htmlentities($row['sub_cat_id']); ?>"><?php echo htmlentities($row['sub_cat_name']); ?></option>
		<?php
	}
}

if(!empty($_POST["sub_cat_id"])) 
{
	$id=intval($_POST['sub_cat_id']);
	$query=mysqli_query($db,"SELECT * FROM sub_sub_category WHERE sub_cat_id=$id");
	?>
	<option value="">Select Sub Sub Category</option>
	<?php
	while($row=mysqli_fetch_array($query))
	{
		?>
		<option value="<?php echo htmlentities($row['sub_sub_cat_id']); ?>"><?php echo htmlentities($row['name']); ?></option>
		<?php
	}
}
if(isset($_POST['update'])){
	$status = $_POST['status'];
	$get_order_id = $_POST['order_id'];
	$get_email = $_POST['email'];
	mysqli_query($db,"UPDATE orders_info set status = '{$status}' where order_id='{$get_order_id}'");

}
if(isset($_POST['update_delivery'])){
	$dm = $_POST['dm'];
	$get_order_id = $_POST['order_id'];
	mysqli_query($db,"UPDATE orders_info set dm = '{$dm}' where order_id='{$get_order_id}'");
	mysqli_query($db,"UPDATE orders_info set status = 'Dispatchd' where order_id='{$get_order_id}'");

	$getqty = mysqli_query($db,"SELECT * from delivery_man where id = '$dm'");
	$getqty = mysqli_fetch_assoc($getqty);

	$getqty = $getqty['total_delivery'];
	$getqty = $getqty+1;

	mysqli_query($db,"UPDATE delivery_man set total_delivery = '{$getqty}' where id='{$dm}'");

}
?>