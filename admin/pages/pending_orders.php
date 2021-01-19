<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 
if(isset($_GET['delete'])){
  $query = 'DELETE from orders_info WHERE order_id = '.$_GET['delete'];
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  $query = 'DELETE from order_products WHERE order_id = '.$_GET['delete'];
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
}
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
                    <h4 class="m-2 font-weight-bold text-primary">Pending Orders&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> --></h4>
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
                            <th>Total Amount </th>
                            <th>Order Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php            
                          $query = "SELECT *,DATE(date) date FROM `orders_info` WHERE status!='Under Review' and status!='Delivered' ORDER BY `orders_info`.`order_id` DESC";
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
                            echo '<td>'. $row['total_amt'].'</td>';
                            echo '<td>'. $row['date'].'</td>';
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
                            <li>
                            <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href=?delete='.$row['order_id']. '>
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