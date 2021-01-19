<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                $query = 'SELECT * from admin_info WHERE admin_id = '.$_SESSION['MEMBER_ID'];
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <!--<script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script> -->
             <?php   }
                         
           
}   
  $query = 'SELECT * FROM user_info WHERE user_id ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz= $row['user_id'];
      $i= $row['first_name'];
      $a=$row['last_name'];
      $b=$row['mobile'];
    }
    $id = $_GET['id'];
?>
            
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Customer's Details</h4>
            </div>
            <a href="customer.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
                

                    <div class="form-group row text-left">

                      <div class="col-sm-3 text-primary">
                        <h5>
                          Full Name<br>
                        </h5>
                      </div>

                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $i; ?> <?php echo $a; ?> <br>
                        </h5>
                      </div>

                    </div>

                    <div class="form-group row text-left">

                      <div class="col-sm-3 text-primary">
                        <h5>
                          Contact #<br>
                        </h5>
                      </div>

                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $b; ?> <br>
                        </h5>
                      </div>
                      
                    </div>
            </div>
          </div>





          <!-- From Here onward -->

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transactions</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                        <thead>
                          <tr>
                            <th>#</th>
                            <th> Order ID</th>
                            <th>Customer Name</th>
                            <th>Email /Contact no</th>
                            <th>Shipping Address</th>
                            <th>Qty </th>
                            <th>Product Total </th>
                            <th>Delivery Charge </th>
                            <th>Total Amount </th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                    date_default_timezone_set('Asia/Dhaka');// change according timezone
                    $currentTime = date( 'Y-m-d', time () );                 
                    $query = "SELECT *,DATE(date) date FROM `orders_info` WHERE user_id=".$id;
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                    $cnt=1;
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. $cnt.'</td>';
                      echo '<td>'. $row['order_id'].'</td>';
                      echo '<td>'. $row['f_name'].'</td>';
                      echo '<td>'. $row['email'].'/<br>'.$row['phone'].'</td>';
                      echo '<td>'. $row['address'].' '. $row['city'].' '.$row['state'].' '. $row['zip'].'</td>';
                      echo '<td>'. $row['prod_count'].'</td>';
                      echo '<td>'. $row['product_total'].'</td>';
                      echo '<td>'. $row['delivery_charge'].'</td>';
                      echo '<td>'. $row['total_amt'].'</td>';
                      echo '<td>'. $row['date'].'</td>';
                      echo '<td>'. $row['status'].'</td>';
                       echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['order_id'] . '"><i class="fas fa-fw fa-th-list"></i> View Details</a>

                               <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" target="_blank" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="invoice.php?action=edit & id='.$row['order_id']. '">
                                    <i class="fas fa-fw fa-edit"></i> Print
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






          <!-- TO here -->





<?php
include'../includes/footer.php';
?>