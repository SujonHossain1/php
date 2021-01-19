<!-- SIDE PART NA SUMMARY -->
        <div class="card-body col-md-3">
        <?php   
        if(!empty($_SESSION['pointofsale'])):  
            
             $total = 0; 
             $subtotal = 0; 
        
             foreach($_SESSION['pointofsale'] as $key => $product): 
        ?>  
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);
                  $subtotal = $subtotal+($product['quantity']*$product['netprice']);
                  $lessvat = ($total / 1.12) * 0.12;
                  $netvat = ($total / 1.12);
                  $addvat = ($total / 1.12) * 0.12;

             endforeach;

//DROPDOWN FOR CUSTOMER
$sql = "SELECT CUST_ID,PHONE_NUMBER, FIRST_NAME, LAST_NAME
        FROM customer
        order by FIRST_NAME asc";
$res = mysqli_query($db, $sql) or die ("Error SQL: $sql");

$opt = "<select class='form-control' id='selectcustomer' data-live-search='true' style='border-radius: 0px;' name='customer' required>
        <option value='' disabled selected hidden>Select Customer</option>";
  while ($row = mysqli_fetch_assoc($res)) {
    $opt .= "<option value='".$row['CUST_ID']."'>".$row['PHONE_NUMBER'].'-'.$row['FIRST_NAME'].' '.$row['LAST_NAME']."</option>";
  }
$opt .= "</select>";
// END OF DROP DOWN
        ?>  
<?php 
          echo "Today's date is : ";
          date_default_timezone_set("Asia/Dhaka");
          $today = date("Y-m-d h:i a"); 
          $today1 =date("Y-m-d H:i"); 
        echo $today; 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <title></title>
    
</head>
<body>
    <input type="hidden" name="date" value="<?php echo $today1; ?>">
          <div class="form-group row text-left mb-3">
            <div class="col-sm-12 text-primary btn-group">
            <?php echo $opt; ?>
            <a  href="#" data-toggle="modal" data-target="#poscustomerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a>
            </div>

          </div>
          <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Net Total
              </h6>
            </div>
            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">taka</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php echo $subtotal; ?>" readonly name="subtotal">
              </div>
            </div>

          </div>
         <!-- <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Less VAT
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">taka</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php// echo number_format($lessvat, 2); ?>" readonly name="lessvat">
              </div>
            </div>

          </div>
          <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Net of VAT
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">taka</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php //echo number_format($netvat, 2); ?>" readonly name="netvat">
              </div>
            </div>

          </div> 
         <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Add VAT
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">taka</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php //echo number_format($addvat, 2); ?>" readonly name="addvat">
              </div>
            </div>

          </div> -->
          <div class="form-group row text-left mb-2">

            <div class="col-sm-5 text-primary">
              <h6 class="font-weight-bold py-2">
                Grand Total
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">taka</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php echo $total; ?>" readonly name="total">
              </div>
            </div>

          </div>

          <!--Remarks -->
           <div class="form-group row text-left mb-2">

            <div class="col-sm-5 text-primary">
              <h6 class="font-weight-bold py-2">
                Remarks
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">Info</span>
                </div>
                <input type="text" class="form-control text-right " name="remark">
              </div>
            </div>

          </div>
          <!--Remarks -->
<?php endif; ?>       
          <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#posMODAL">SUBMIT</button>

        <!-- Modal -->
        <div class="modal fade" id="posMODAL" tabindex="-1" role="dialog" aria-labelledby="POS" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">SUMMARY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group row text-left mb-2">

                    <div class="col-sm-12 text-center">
                      <h3 class="py-0">
                        GRAND TOTAL
                      </h3>
                      <h3 class="font-weight-bold py-3 bg-light">
                        taka <?php echo $total; ?>
                      </h3>
                    </div>

                  </div>

                    <div class="col-sm-12 mb-2">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text">taka</span>
                        </div>
                          <input class="form-control text-right" id="txtNumber" onkeypress="return isNumberKey(event)" type="text" name="cash" placeholder="ENTER CASH" name="cash" required>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">PROCEED TO PAYMENT</button>
              </div>
            </div>
          </div>
        </div>
        <!-- END OF Modal -->

        </form>
      </div> <!-- END OF CARD BODY -->

     </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<script>
  $("#selectcustomer").chosen();
</script>
  
</body>
</html>
          

