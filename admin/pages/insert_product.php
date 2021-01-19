<?php
include'../includes/connection.php';
include'../includes/sidebar.php';


if(isset($_POST['submit']))
{
  $category=$_POST['category'];
  $subcat=$_POST['subcategory'];
  $subsubcat=$_POST['subsubcategory'];
  $productname=$_POST['productName'];
  $product_slug = slug($productname);
  mysqli_query($db,"SELECT * from products where product_title = '$productname'");
  if(mysqli_affected_rows($db)>0){
      $row = mysqli_affected_rows($db);
      $product_slug .= $row;
  }
  $productprice=$_POST['productprice'];
  $previousprice=$_POST['previousprice'];
  $productdescription=$_POST['productDescription'];
  $productscharge=$_POST['product_alt'];

  $productimage1="images/products/".$_FILES["productimage1"]["name"];


  move_uploaded_file($_FILES["productimage1"]["tmp_name"],"../../images/products/".$_FILES["productimage1"]["name"]);

  $sql=mysqli_query($db,"INSERT into products(product_cat,product_sub_cat,sub_sub_cat,product_title,product_slug,product_price,product_previous_price,product_desc,product_image,product_alt)
                                     values('$category','$subcat','$subsubcat','$productname','$product_slug','$productprice','$previousprice','$productdescription','$productimage1','$productscharge')");

  $_SESSION['msg']="Product Inserted Successfully !!";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin| Insert Product</title>
  <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link type="text/css" href="css/theme.css" rel="stylesheet">
  <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
  <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
  <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

  <script>
    function getSubcat(val) {
      $.ajax({
        type: "POST",
        url: "get_sub.php",
        data:'cat_id='+val,
        success: function(data){
          $("#subcategory").html(data);
        }
      });
    }
    function getSubSubcat(val) {
      $.ajax({
        type: "POST",
        url: "get_sub.php",
        data:'sub_cat_id='+val,
        success: function(data){
          $("#sububcategory").html(data);
        }
      });
    }
    function selectCountry(val) {
      $("#search-box").val(val);
      $("#suggesstion-box").hide();
    }
  </script> 


</head>
<body>

 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Insert Product&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> --></h4>
    &nbsp; 500px X 500px (product image)
  </div>

  <div class="card-body">
    <?php if(isset($_POST['submit']))
    {?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
      </div>
    <?php } ?>
    <div class="table-responsive">
     <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
      <table class="table table-bordered" id="" width="100%" cellspacing="0">        

        <tr>
          <th>Category *</th>
          <td><select name="category" class="form-control" onChange="getSubcat(this.value);" style="width:400px;" required>
            <option value="">Select Category</option> 
            <?php $query=mysqli_query($db,"select * from categories");
            while($row=mysqli_fetch_array($query))
              {?>

                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_title'];?></option>
              <?php } ?>
            </select></td>
          </tr>
          <tr>
            <th>Sub Category</th>
            <td><select   name="subcategory"  id="subcategory" onChange="getSubSubcat(this.value);" style="width:400px;" class="form-control">
              <option>Select Sub Category</option>
            </select></td>
          </tr>
          <tr>
            <th>Sub Sub Category</th>
            <td><select   name="subsubcategory"  id="sububcategory" style="width:400px;" class="form-control">
              <option>Select Sub Sub Category</option>
            </select></td>
          </tr>
          <tr>
            <th>Product Name</th>
            <td> <input type="text" name="productName" style="width:400px;"  placeholder="Enter Product Name" class="form-control" required></td>
          </tr>
          <tr>
            <th>Product Price</th>
            <td><input type="text"    name="productprice" style="width:400px;"  placeholder="Enter Product Price" class="form-control" required></td>
          </tr>
          <tr>
            <th>Previous Price (to show discount)</th>
            <td><input type="text"    name="previousprice" style="width:400px;"  placeholder="Enter Previous Price" class="form-control"></td>
          </tr>
          <tr>
            <th>Product Description</th>
            <td><textarea  name="productDescription"   placeholder="Enter Product Description" rows="10" id="editor1" cols="120" class="form-control"></textarea></td>
          </tr>
          <tr>
            <th>Product Image</th>
            <td><input type="file" name="productimage1" id="productimage1"  value="" class="form-control" required></td>
          </tr>
           <tr>
            <th>Alt</th>
            <td><input type="text"    name="product_alt" style="width:400px;"  placeholder="Alt" class="form-control"></td>
          </tr>
          <tr>
            <th></th>
            <td> <button type="submit" class="button" name="submit" class="btn">Insert</button></td>
          </tr>

        </table>
      </form>
    </div>
  </div>
</div>



<?php if(isset($_POST['submit']))
{?>
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
  </div>
<?php } ?>


<?php if(isset($_GET['del']))
{?>
  <div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Oh snap!</strong>   <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
  </div>
<?php } ?>

<br />



</div><!--/.content-->
</div><!--/.span9-->
</div>
</div><!--/.container-->
</div><!--/.wrapper-->


    <!-- <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script> -->
    <script>
      $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
      } );
    </script>
  </body>
  </html>

  <?php
  include'../includes/footer.php';
  ?>

  <style type="text/css">
    .button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      border-radius: 15px;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
    }
  </style>
