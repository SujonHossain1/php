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
include'../includes/connection.php';
$sql = "SELECT * FROM employee order by FIRST_NAME asc";
$res = mysqli_query($db,$sql) or die ("Error SQL: $sql");

$opt = "<select class='form-control' id='selectemployee' data-live-search='true' style='border-radius: 0px;' name='employee' required>
        <option value='' disabled selected hidden>Select Employee</option>";
  while ($row = mysqli_fetch_assoc($res)) {
    $opt .= "<option value='".$row['EMPLOYEE_ID']."'>".$row['PHONE_NUMBER'].'-'.$row['FIRST_NAME'].' '.$row['LAST_NAME']."</option>";
  }
$opt .= "</select>";

?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Salary</h4>
            </div>
            <a href="index.php" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">

            <form role="form" method="post" action="salary.php">
             
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Employee:
                </div>
                <div class="col-sm-9">
                 <!-- <input class="form-control" placeholder="Purpose" name="purpose" value="" required>-->
                 <?php echo $opt; ?>
                  <input type="hidden" class="form-control" placeholder="Product Id" name="id" value="" required>
                </div>
              </div>
             
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Salary Amount:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Salary Amount" name="cost" value="" required>
                </div>
              </div>
               <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Salay Month:
                </div>
                <div class="col-sm-9">
                  <select name="month" class='form-control' style='border-radius: 0px;' required="">
                    <option disabled selected value="">Select Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                  </select>
                </div>
              </div>
               <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Remarks:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Remarks" name="remark" value="">
                </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block" name="addsal"><i class="fa fa-check fa-fw"></i>Proceed to Payement</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/connection.php';
  if (isset($_POST['addsal'])) {
    # code...
    date_default_timezone_set("Asia/Dhaka");
    $emp_id = $_POST['employee'];
    $amount = $_POST['cost'];
    $month = $_POST['month'];
    $remark = $_POST['remark'];
    $today =date("Y-m-d H:i");


    $query = "INSERT INTO salary VALUES(NULL,'{$emp_id}','{$amount}','{$month}','{$today}','{$remark}')";
    $result = mysqli_query($db,$query) or die(mysqli_error($db));
    if($result)
    {
      echo "<script>
      alert('Salary Added Successfully.');
      window.location = 'salary.php';
    </script>";
    }
  }
?>
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Salary</h4>
            <div style="float: right; border-radius: 0px;">
        </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">Date</th>
                     <th width="25%">Employee Name</th>
                     <th width="13%">Phone Number</th>
                     <th width="15%">Salary Month</th>
                     <th width="15%">Amount</th>
                     <th width="15%">Remarks</th>
                   </tr>
               </thead>
          <tbody>

<?php    
    include'../includes/connection.php';              
    $query = 'SELECT * FROM salary,employee WHERE salary.EMPLOYEE_ID=employee.EMPLOYEE_ID GROUP BY salary.SAL_ID ORDER BY salary.sal_date';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['sal_date'].'</td>';
                echo '<td>'. $row['FIRST_NAME'].''.$row['LAST_NAME'].'</td>';
                echo '<td>'. $row['PHONE_NUMBER'].'</td>';
                echo '<td>'. $row['sal_month'].'</td>';
                echo '<td>'. $row['SALARY_AMOUNT'].'</td>';
                echo '<td>'. $row['remarks'].'</td>';
                echo '</tr> ';
                        }
?> 
                                    
                 </tbody>
                            </table>    
                        </div>
                    </div>
                  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<script>
  $("#selectemployee").chosen();
</script>

<?php
include'../includes/footer.php';
?>

            
           