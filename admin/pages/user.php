<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
$query = 'SELECT * from admin_info WHERE admin_id = '.$_SESSION['MEMBER_ID'];
$result = mysqli_query($db, $query) or die (mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
  $Aa = $row['TYPE'];

  if ($Aa=='Editor'){
    ?>
   <script type="text/javascript">
    //then it will be redirected
    alert("You need to be an admin to access this page");
    window.location = "index.php";
  </script>
  <?php
}           
}
?>
<!-- ADMIN TABLE -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Admin Account(s)&nbsp;</h4>
  </div>
  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <thead>
         <tr>
           <th>Name</th>
           <th>Email ID</th>
           <th>Phone Number</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
        <?php                  
        $query = "SELECT * from admin_info Where TYPE='Admin'";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));

        while ($row = mysqli_fetch_assoc($result)) {

          echo '<tr>';
          echo '<td>'. $row['admin_name'].'</td>';
          echo '<td>'. $row['admin_email'].'</td>';
          echo '<td>'. $row['phone'].'</td>';
          echo '<td align="right"> <div class="btn-group">
          <a type="button" class="btn btn-primary bg-gradient-primary" href="us_searchfrm.php?action=edit & id='.$row['admin_id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
          <div class="btn-group">
          <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
          ... <span class="caret"></span></a>
          <ul class="dropdown-menu text-center" role="menu">
          <li>
          <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="us_edit.php?action=edit & id='.$row['admin_id']. '">
          <i class="fas fa-fw fa-edit"></i> Edit
          </a>
          </li>

          </li>
          </ul>
          </div>
          </div></td>';
          echo '</tr> ';
        }
        ?>         
      </tbody>
    </table>
  </div>
</div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Editor Accounts&nbsp;<a  href="#" data-toggle="modal" data-target="#supplierModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
  </div>
  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <thead>
         <tr>
           <th>Name</th>
           <th>Email ID</th>
           <th>Phone Number</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
        <?php                  
        $query = 'SELECT * from admin_info Where TYPE="Editor"';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));

        while ($row = mysqli_fetch_assoc($result)) {

          echo '<tr>';
          echo '<td>'. $row['admin_name'].'</td>';
          echo '<td>'. $row['admin_email'].'</td>';
          echo '<td>'. $row['phone'].'</td>';
          echo '<td align="right"> <div class="btn-group">
          <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
          ... <span class="caret"></span></a>
          <ul class="dropdown-menu text-center" role="menu">
          <li>
          <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="us_edit.php?action=edit & id='.$row['admin_id']. '">
          <i class="fas fa-fw fa-edit"></i> Edit
          </a>
          </li>
          <li>
          <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="us_del.php?action=edit & id='.$row['admin_id']. '">
          <i class="fas fa-fw fa-edit"></i> Delete
          </a>
          </li>
          </ul>
          </div>
          </div></td>';
          echo '</tr> ';
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

<!-- User Account Modal-->
<div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Account</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="us_transac.php?action=add">

          <div class="form-group">
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Name" name="username" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Email" name="email" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Phone" name="phone" required>
          </div>
          <div class="form-group">
            <select class='form-control' name='gender' required>
              <option value='' disabled selected hidden>Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
          </div>
          <hr>
          <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
          <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
        </form>  
      </div>
    </div>
  </div>
</div>