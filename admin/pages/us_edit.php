<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
$query = 'SELECT * from admin_info WHERE admin_id = '.$_SESSION['MEMBER_ID'];
$result = mysqli_query($db, $query) or die (mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
  $Aa = $row['TYPE'];

  if ($Aa=='User'){
    ?>
    <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
  <?php
}           
}
// JOB SELECT OPTION TAB


$query = "SELECT * from admin_info 
WHERE admin_id =".$_GET['id'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));
while($row = mysqli_fetch_array($result))
{  
  $zz= $row['admin_id'];
  $a= $row['admin_name'];
  $b='';
  $c=$row['gender'];
  $d=$row['admin_email'];
  $e=$row['admin_password'];
  $g=$row['phone'];
  $l=$row['TYPE'];
}
$id = $_GET['id'];
?>

<center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Edit Admin/Editor Account</h4>
  </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="user.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
  <div class="card-body">


    <form role="form" method="post" action="us_edit1.php">
      <input type="hidden" name="id" value="<?php echo $zz; ?>" />

      <div class="form-group row text-left text-warning">
        <div class="col-sm-3" style="padding-top: 5px;">
         First Name:
       </div>
       <div class="col-sm-9">
        <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $a; ?>" required>
      </div>
    </div>
  <div class="form-group row text-left text-warning">
    <div class="col-sm-3" style="padding-top: 5px;">
     Gender:
   </div>
   <div class="col-sm-9">
    <select class='form-control' name='gender' required>
      <option value="" disabled selected hidden>Select Gender</option>
      <option value="Male" <?php if($c=='Male'){ echo 'selected';} ?>>Male</option>
      <option value="Female" <?php if($c=='Female'){ echo 'selected';} ?>>Female</option>
    </select>
  </div>
</div>
<div class="form-group row text-left text-warning">
  <div class="col-sm-3" style="padding-top: 5px;">
   Email:
 </div>
 <div class="col-sm-9">
  <input class="form-control" placeholder="Username" name="email" value="<?php echo $d; ?>" required>
</div>
</div>
<div class="form-group row text-left text-warning">
  <div class="col-sm-3" style="padding-top: 5px;">
   Password:
 </div>
 <div class="col-sm-9">
  <input type="password" class="form-control" placeholder="Password" name="password" value="" required>
</div>
</div>
<div class="form-group row text-left text-warning">
  <div class="col-sm-3" style="padding-top: 5px;">
   Contact #:
 </div>
 <div class="col-sm-9">
   <input class="form-control" placeholder="Contact #" name="phone" value="<?php echo $g; ?>" required>
 </div>
</div>

             <!-- <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Province:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Province" name="province" value="<?php //echo $j; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 City / Municipality:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="City / Municipality" name="city" value="<?php //echo $k; ?>" required>
                </div>
              </div> -->
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                  Account Type:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Account Type" name="type" value="<?php echo $l; ?>" readonly>
                </div>
              </div>
              <hr>

              <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
            </form>  
          </div>
        </div></center>

        <?php
        include'../includes/footer.php';
        ?>