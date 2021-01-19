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
                ?>

                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h4 class="m-2 font-weight-bold text-primary">All Orders&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> --></h4>
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
                            <th>Delivery</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php            
                    $query = "SELECT *,DATE(date) date FROM `orders_info`";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                    $cnt=1;
                    while ($row = mysqli_fetch_assoc($result)) {
                      $dm = mysqli_query($db,"SELECT name from orders_info,delivery_man WHERE orders_info.dm = delivery_man.id and orders_info.order_id='$row[order_id]'");
                      $dm = mysqli_fetch_assoc($dm);
                      $dm = $dm['name'];
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
                      echo '<td>'. $dm.'</td>';
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
                                <li>
                                  <a type="button" target="_blank" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="order_edit.php?action=edit & oid='.$row['order_id']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit Status
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