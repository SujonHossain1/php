<?php
include'../includes/connection.php';
include'../includes/sidebar.php';

if(isset($_POST['submit']))
{
  $category=$_POST['category'];
  $cat_slug = slug($category);
  /*$description=$_POST['description'];*/
  $id=intval($_GET['id']);
  $sql=mysqli_query($db,"update categories set cat_title='$category',cat_slug='$cat_slug' where cat_id='$id'");
  $_SESSION['msg']="Category Updated !!";

}
if(!isset($_SESSION['MEMBER_ID'])){
  ?>
  <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "login.php";
                    </script>
                    <?php
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
                      function selectCountry(val) {
                        $("#search-box").val(val);
                        $("#suggesstion-box").hide();
                      }
                    </script> 


                  </head>
                  <body>
              <?php $id=intval($_GET['id']);// product id
              $query=mysqli_query($db,"select * from categories where cat_id='$id'");
              $row=mysqli_fetch_array($query); ?>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-2 font-weight-bold text-primary">Edit Category&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> --></h4>
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
                        <th>Category Name</th>
                        <td><input type="text" placeholder="Enter category Name"  name="category" value="<?php echo  htmlentities($row['cat_title']);?>" class="form-control" required></td>
                        </tr>
                      
                        <tr>

                          <th>Category Image</th>

                          <td> <img src="../../<?php echo $row['image'] ?>" width="200" height="100"> <a href="update-cat_img.php?id=<?php echo $row['cat_id'];?>">Change Image</a>
                          </td>
                        </tr>
                        <tr>
                          <th></th>
                          <td> <button type="submit" class="button" name="submit" class="btn">Update</button></td>
                        </tr>

                      </table>
                    </form>
                  </div>
                </div>
              </div>



<!-- <?php if(isset($_POST['submit']))
{?>
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php } ?> -->


    <?php if(isset($_GET['del']))
    {?>
      <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
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
