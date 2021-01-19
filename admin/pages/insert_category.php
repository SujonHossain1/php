<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 
if(isset($_POST['submit']))
{
  $category=$_POST['category'];
  $cat_slug = slug($category);
  /*$description=$_POST['description'];*/
  $category_image="images/cat_img/".$_FILES["categoryimage"]["name"];
  move_uploaded_file($_FILES["categoryimage"]["tmp_name"],"../../images/cat_img/".$_FILES["categoryimage"]["name"]);
  $sql=mysqli_query($db,"insert into categories(cat_title,image,cat_slug) values('$category','$category_image','$cat_slug')");
  $_SESSION['msg']="Category Created !!";

}

if(isset($_GET['del']))
{
  mysqli_query($con,"delete from categories where cat_id = '".$_GET['id']."'");
  $_SESSION['delmsg']="Category deleted !!";
}

?>  
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
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Insert Category&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> --></h4>
    &nbsp;&nbsp;600px X 600px
  </div>

  <div class="card-body">

    <div class="table-responsive">
     <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
      <table class="table table-bordered" id="" width="100%" cellspacing="0">        

        <tr>
          <th>Category Name</th>
          <td>
            <input type="text" style="width:400px;" placeholder="Enter category Name"  name="category" class="form-control" required></td>
          </tr>
          <tr>
            <th>Category Image</th>
            <td><input type="file" name="categoryimage" id="categoryimage" value="" class="form-control" required></td>
          </tr>
          <tr>
            <th></th>
            <td> <button type="submit" class="button" name="submit" class="btn">Create</button></td>
          </tr>

        </table>
      </form>
    </div>
  </div>
</div>

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