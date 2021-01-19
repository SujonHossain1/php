<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
$query = 'SELECT * from admin_info WHERE admin_id = '.$_SESSION['MEMBER_ID'].'';
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
/* $query = 'SELECT *, FIRST_NAME, LAST_NAME, PHONE_NUMBER, EMPLOYEE, ROLE
              FROM transaction T
              JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
              JOIN transaction_details tt ON tt.`TRANS_D_ID`=T.`TRANS_D_ID`
              WHERE TRANS_ID ='.$_GET['id']; */
              $query = 'SELECT *,DATE(orders_info.date) date FROM orders_info,order_products,products WHERE orders_info.order_id = order_products.order_id and order_products.product_id=products.product_id and orders_info.order_id ='.$_GET['id'];

              $result = mysqli_query($db, $query) or die (mysqli_error($db));

          
              while ($row = mysqli_fetch_assoc($result)) {
                $fname = $row['f_name'];
                $lname = "";
                $pn = $row['phone'];
                $email = $row['email'];
                $date = $row['date'];
                $tid = $row['order_id'];
                $address = $row['address']." ".$row['city']." ".$row['state']." ".$row['zip'];
              }
              ?>



              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="form-group row text-left mb-0">
                    <div class="col-sm-9">
                      <h5 class="font-weight-bold">
                        Order Details
                      </h5>
                    </div>
                    <div class="col-sm-3 py-1">
                      <h6>
                        Order Date: <?php echo $date; ?>
                      </h6>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group row text-left mb-0 py-2">
                    <div class="col-sm-4 py-1">
                      <h6 class="font-weight-bold">
                        Customer Name: <?php echo $fname; ?> <?php echo $lname; ?>
                      </h6>
                      <h6 class="font-weight-bold">
                        Phone: <?php echo $pn; ?>
                      </h6>
                    </div>
                    <div class="col-sm-4 py-1"></div>
                    <div class="col-sm-4 py-1">
                      <h6 class="font-weight-bold">
                        Order ID : <?php echo $tid; ?>
                      </h6>
                      <h6 class="font-weight-bold">

                      </h6>
                      <h6>
                       Address : <?php echo $address; ?>
                     </h6>
                   </div>
                 </div>
                 <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Product ID</th>
                          <th>Product Image</th>
                          <th>Product Name</th>
                          <th>Order Quantity</th>
                          <th>Total Price</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $cnt=1;
                        $query = 'SELECT *,DATE(orders_info.date) date FROM orders_info,order_products,products WHERE orders_info.order_id = order_products.order_id and order_products.product_id=products.product_id and orders_info.order_id ='.$_GET['id'];
                        $result = mysqli_query($db, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {

                          echo '<tr>';
                          echo '<td>'. $cnt.'</td>';
                          echo '<td>'. $row['product_id'].'</td>';
                          echo '<td><img style="width: 50px;" src="../../'. $row['product_image'].'"</td>';
                          echo '<td>'. $row['product_title'].'</td>';
                          echo '<td>'. $row['qty'].'</td>';
                          echo '<td>'. $row['amt'].'</td>';
                          echo '</tr> ';
                          $cnt++;

                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <?php
                $query = 'SELECT * from orders_info where order_id ='.$_GET['id']; 
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
                $row = mysqli_fetch_assoc($result);
                $delivery_charge = $row['delivery_charge'];
                $grand = $row['total_amt'];
                $sub = $row['product_total'];
                ?>
                <div class="form-group row text-left mb-0 py-2">
                  <div class="col-sm-4 py-1"></div>
                  <div class="col-sm-3 py-1"></div>
                  <div class="col-sm-4 py-1">
                    <table width="100%">
                      <tr>
                        <td class="font-weight-bold">Product Total : </td>
                        <td class="text-right">&#2547; <?php echo $sub; ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Delivery Charge : </td>
                        <td class="text-right">&#2547; <?php echo $delivery_charge; ?></td>
                      </tr>
                      <tr>
                        <td class="font-weight-bold">Grand Total</td>
                        <td class="text-right">&#2547; <?php echo number_format($grand); ?></td>
                      </tr>
                   <!-- <tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="font-weight-bold text-right text-primary">&#2547; <?php //echo $grand; ?></td>
                    </tr> -->
                  </table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
          </div>
          
          <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h4 class="m-2 font-weight-bold text-primary">Status&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> --></h4>
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Status</th>
                            <th>New Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $get_order_id = $_GET['id'];
                    date_default_timezone_set('Asia/Dhaka');// change according timezone
                    $currentTime = date( 'Y-m-d', time () );                 
                    $query = "SELECT *,DATE(date) date FROM `orders_info` WHERE order_id='{$get_order_id}'";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                    $cnt=1;
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. $cnt.'</td>';
                      echo '<td>'. $row['status'].'</td>';
                      echo '<td><select class="form-control" id="get_status" onchange="update_status()">
                      <option>Select..</option>
                      <option value="Under Review">Under Review</option>
                      <option value="Processing">Processing</option>
                      <option value="Dispatched">Dispatched</option>
                      <option value="Delivered">Delivered</option>
                      </select></td>';
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
          
          <script type="text/javascript">
            function update_status(){
              var order_id = "<?php echo $get_order_id ?>";
              var status = $("#get_status").val();
              var email = $("#get_email").val();
              $.ajax({
                url : "get_sub.php",
                type : "POST",
                data: {
                  update:1,
                  status:status,
                  email:email,
                  order_id: <?php echo $get_order_id; ?>
                },
                cache:false,
                success:function(response){
                  console.log(response);
                  alert("Updated");
                  window.location = "trans_view.php?action=edit & id="+order_id;
                }

              });
            }

            function update_delivery(){
              var order_id = "<?php echo $get_order_id ?>";
              var dm = $("#dm").val();
              $.ajax({
                url : "get_sub.php",
                type : "POST",
                data: {
                  update_delivery:1,
                  dm:dm,
                  order_id: <?php echo $get_order_id; ?>
                },
                cache:false,
                success:function(response){
                  console.log(response);
                  alert("Updated");
                  window.location = "order_edit.php?action=edit & oid="+order_id;
                }

              });

            }
          </script>
