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
                    <h4 class="m-2 font-weight-bold text-primary">Customer&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> --></h4>
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                        <thead>
                          <tr>
                            <th>#</th>
                            <th> Name</th>
                            <th>Email </th>
                            <th>Contact no</th>
                            <th>Shippping Address</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php                  
                          $query = 'SELECT * FROM user_info';
                          $result = mysqli_query($db, $query) or die (mysqli_error($db));
                          $cnt=1;
                          while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>'. $cnt.'</td>';
                            echo '<td>'. $row['first_name'].' '.$row['last_name'].'</td>';
                            echo '<td>'. $row['email'].'</td>';
                            echo '<td>'. $row['mobile'].'</td>';
                            echo '<td>'. $row['address1'].' '.$row['address2'].' '. $row['city'].' '.$row['region'].' '. $row['post_code'].'</td>';
                            echo '<td align="right"> <div class="btn-group">
                            <a type="button" class="btn btn-primary bg-gradient-primary" href="cust_searchfrm.php?action=delete & id='.$row['user_id'] . '"><i class="fas fa-fw fa-list-alt"></i>View Orders</a>
                            </div> </td>';
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