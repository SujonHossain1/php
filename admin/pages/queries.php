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
                    <h4 class="m-2 font-weight-bold text-primary">Queries&nbsp;</h4>
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                        <thead>
                          <tr>
                            <tr>
                              <th>#</th>
                              <th>Date</th>
                              <th>Subject</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Query</th>
                            </tr>
                          </tr>
                        </thead>
                        <tbody>
                          <?php                  
                          $query = "SELECT * FROM `messages` ORDER BY `messages`.`id` DESC";
                          $result = mysqli_query($db, $query) or die (mysqli_error($db));
                          $cnt=1;
                          while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>'. $cnt.'</td>';
                            echo '<td>'. $row['date'].'</td>';
                            echo '<td>'. $row['subject'].'</td>';
                            echo '<td>'. $row['name'].'</td>';
                            echo '<td>'. $row['email'].'</td>';
                            echo '<td>'. $row['msg'].'</td>';
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