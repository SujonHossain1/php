<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <!--<script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script> -->
<?php
  }           
}

?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Extra Expenses</h4>
            </div>
            <a href="index.php" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">

            <form role="form" method="post" action="expense.php">
             
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Purpose:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Purpose" name="purpose" value="" required>
                  <input type="hidden" class="form-control" placeholder="Product Id" name="id" value="" required>
                </div>
              </div>
             
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Cost:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Cost" name="cost" value="" required>
                </div>
              </div>
               <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Remarks:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Remarks" name="remark" value="" required>
                </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block" name="addexpense"><i class="fa fa-check fa-fw"></i>Add</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/connection.php';
  if (isset($_POST['addexpense'])) {
    # code...
    date_default_timezone_set("Asia/Dhaka");
    $purpose = $_POST['purpose'];
    $cost = $_POST['cost'];
    $remark = $_POST['remark'];
    $today =date("Y-m-d H:i");


    $query = "INSERT INTO extrasepense VALUES(NULL,'{$purpose}','{$cost}','{$today}','{$remark}')";
    $result = mysqli_query($db,$query) or die(mysqli_error($db));
    if($result)
    {
      echo "<script>
      alert('Expense Added Successfully.');
      window.location = 'expense.php';
    </script>";
    }
  }
?>
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Extra Expense</h4>
            <div style="float: right; border-radius: 0px;">
        </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">Date</th>
                     <th width="25%">Purpose</th>
                     <th width="13%">Cost</th>
                     <th width="15%">Remarks</th>
                   </tr>
               </thead>
          <tbody>

<?php    
    include'../includes/connection.php';              
    $query = 'SELECT * FROM extrasepense';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['DATE'].'</td>';
                echo '<td>'. $row['purpose'].'</td>';
                echo '<td>'. $row['cost'].'</td>';
                echo '<td>'. $row['remark'].'</td>';
                echo '</tr> ';
                        }
?> 
                                    
                 </tbody>
                            </table>
                            <br><h4 style="color: blue;"><b>Daily Expense: 
<?php
include'../includes/connection.php';
    
    $query = "SELECT sum(extrasepense.cost) cost FROM extrasepense WHERE DATE(extrasepense.DATE) = CURRENT_DATE()";
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    echo $row['cost'];
?> Taka</b><h4>
                            
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>

            
           