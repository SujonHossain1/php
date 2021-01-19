<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 
if(isset($_POST['submit']))
{
  $category=$_POST['category'];
  $designation=$_POST['designation'];
  $category_image="img/team/".$_FILES["categoryimage"]["name"];
  move_uploaded_file($_FILES["categoryimage"]["tmp_name"],"../../img/team/".$_FILES["categoryimage"]["name"]);
  $sql=mysqli_query($db,"INSERT into team(name,designation,img) values('$category','$designation','$category_image')");
  $_SESSION['msg']="Team Member Inserted !!";

}

if(isset($_GET['del']))
{
  mysqli_query($db,"delete from team where cat_id = '".$_GET['id']."'");
  $_SESSION['delmsg']="Team member deleted !!";
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
    <h4 class="m-2 font-weight-bold text-primary">Insert Team Member<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> --></h4>
    &nbsp;&nbsp;350px X 258px
  </div>

  <div class="card-body">

    <div class="table-responsive">
     <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
      <table class="table table-bordered" id="" width="100%" cellspacing="0">        

        <tr>
          <th>Name</th>
          <td>
            <input type="text" style="width:400px;" placeholder="Enter Name"  name="category" class="form-control" required></td>
          </tr>
          <tr>
            <th>Designation</th>
            <td>
              <input type="text" style="width:400px;" placeholder="Enter Designation"  name="designation" class="form-control" required></td>
            </tr>
            <tr>
              <th>Image</th>
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

                  <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h4 class="m-2 font-weight-bold text-primary">Team Members&nbsp;</h4>
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                        <thead>
                          <tr>
                            <tr>
                              <th>#</th>
                              <th>Sub Category Image</th>
                              <th>Sub Category</th>
                              <th>Category</th>
                              <th>Action</th>
                            </tr>
                          </tr>
                        </thead>
                        <tbody>
                          <?php                  
                          $query = "SELECT * FROM `team`";
                          $result = mysqli_query($db, $query) or die (mysqli_error($db));
                          $cnt=1;
                          while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>'. $cnt.'</td>';
                            echo '<td><img style="width: 50px;" src="../../'. $row['img'].'"</td>';
                            echo '<td>'. $row['name'].'</td>';
                            echo '<td>'. $row['designation'].'</td>';
                            echo '<td align="right">

                            <div class="btn-group">
                            <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                            ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                            <li>
                            <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="?del=delete & id='.$row['id']. '">
                            <i class="fas fa-fw fa-edit"></i> Delete
                            </a>
                            </li>
                            </ul>
                            </div>
                            </div> </td>

                            ';
                            echo '</tr> ';
                            $cnt++;
                          }
                          ?>
                        </tbody>
                      </table>
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