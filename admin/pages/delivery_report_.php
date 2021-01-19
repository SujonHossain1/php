<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

$query = 'SELECT * from admin_info WHERE admin_id = '.$_SESSION['MEMBER_ID'];
$result = mysqli_query($db, $query) or die (mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
  $Aa = $row['TYPE'];

  if ($Aa=='User'){

             ?>    <!-- <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                    </script> -->
                  <?php   }


                }   
                ?>

                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h4 class="m-2 font-weight-bold text-primary">Delivery Man Report&nbsp;<a target="_blank" href="delivery_report.php" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-print"></i></a></h4>
                  </div>


                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Area</th>
                            <th>Total Delivery</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                          $month = date("m");                
                          $query = 'SELECT * FROM `delivery_man`';
                          $result = mysqli_query($db, $query) or die (mysqli_error($db));
                          while ($row = mysqli_fetch_assoc($result)) {
                            $did = $row['id'];
                            $count = mysqli_query($db,"SELECT * from orders_info where dm='$did' and month(date)='{$month}'");
                            $count = mysqli_affected_rows($db);
                            echo '<tr>';
                            echo '<td>'. $row['name'].'</td>';
                            echo '<td>'. $row['phone_number'].'</td>';
                            echo '<td>'. $row['area'].'</td>';
                            echo '<td>'. $count.'</td>';

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