<?php include 'includes/header.php'; ?>
<?php
if(!isset($_SESSION['startech_uid'])){
	echo"<script>window.location.href='login.php'</script>";
}

$get_info = $dc->getcustomerinfo($_SESSION['startech_uid']);
$get_info = $get_info->fetch_assoc();

?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
<section class="after-header p-tb-10">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<ul class="breadcrumb">
					<li><a href=""><i class="fa fa-home" title="Home"></i></a></li>
					<li><a href="myaccount.php">My Account</a></li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="col-sm-4">
				<h6 class="page-heading">My Account</h6>
			</div>
		</div>
	</div>
</section>
<div class="container alert-container">
</div>
<div class="container account_layout account_registration body">

	<div class="row"><column id="column-left" class="col-sm-3">
		<span class="lc-close"><i class="fa fa-times" aria-hidden="true"></i></span>

	</column>
	<div id="content" class="col-sm-12 col-md-12">
		<div class="main_content">
			<h1>Order History</h1>
			<p class="ifHaveAccount"></p>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>SL.</th>
							<th>Date</th>
							<th>Order ID</th>
							<th>Product Count</th>
							<th>Total</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sl = 0;
						$getorder = $dc->getordersbyid($_SESSION['startech_uid']);
						if($getorder!='false'){
							while ($row = $getorder->fetch_assoc()) { 
								$sl++;
								?>
								<tr>
									<td><?php echo $sl; ?></td>
									<td><?php echo $row['order_date']; ?></td>
									<td><?php echo $row['order_id']; ?></td>
									<td><?php echo $row['prod_count']; ?></td>
									<td><?php echo $row['total_amt']; ?></td>
									<td><?php echo $row['status']; ?></td>
									<td><a href="view_invoice.php?order_id=<?php echo $row['order_id']; ?>&id=<?php echo md5($row['order_date']); ?>" class="btn btn-primary">Details</a></td>
								</tr>
							<?php }} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'includes/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#dataTable').DataTable();
	});
</script>

<style type="text/css">
	.pagination li.active{
		background-color: #fff;
	}
</style>
