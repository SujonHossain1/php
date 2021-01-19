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

  $query = 'SELECT * FROM customer C,transaction T, due WHERE C.CUST_ID = T.CUST_ID and due.TRANS_D_ID=T.TRANS_D_ID and T.TRANS_D_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $first_name = $row['FIRST_NAME'].' '.$row['LAST_NAME'];
      $last_name = $row['LAST_NAME'];
      $phonenumber = $row['PHONE_NUMBER'];
      $grandtotal = $row['GRANDTOTAL'];
      $due = $row['due_amount'];
      $paid = $row['CASH'];


    }

      $transactionid = $_GET['id'];
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Due Amount</h4>
            </div>
            <a href="due.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">

            <form role="form" method="post" action="due_edit1.php">
             
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Transection ID:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Product Name" name="trans" value="<?php echo $transactionid; ?>" required>
                  <input type="hidden" class="form-control" placeholder="Product Id" name="id" value="<?php echo $transactionid; ?>" required>
                </div>
              </div>
             
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Name" name="name" value="<?php echo $first_name; ?>" required>
                </div>
              </div>
                <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Phone Number:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Phone Number" name="phonenumber" value="<?php echo $phonenumber; ?>" required>
                </div>
              </div>
                <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Total Amount:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Total Amount" name="total" value="<?php echo $grandtotal; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Paid Amount:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" id="paidid" placeholder="Due AMount" name="paidamount" value="<?php echo $paid; ?>" required>
                </div>
              </div>
              
                <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Due Amount:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Due AMount" id="dueid" name="due" value="<?php echo $due; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 New Payment:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="New Payment" id="newpayid" name="newpay"required onchange="myFunction(this.value)">
                </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>

<script type="text/javascript">
   function myFunction(val) {
  var pre = document.getElementById('paidid').value;
  var due = document.getElementById('dueid').value;
  pre = parseInt(pre)+parseInt(val);
  due = parseInt(due)-parseInt(val);
  document.getElementById('paidid').value = pre;
  document.getElementById('dueid').value = due;

}
</script>

<?php
include'../includes/footer.php';
?>