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
  <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script>
<?php
  }           
}
            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Request</h4>
            <div style="float: right; border-radius: 0px;">

        </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">SL</th>
                     <th>Message</th>
                     <th width="13%">Query</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT * FROM permission order BY permission.id';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            $serial = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $serial.'</td>';
                echo '<td>'. $row['query'].' '.$row['query1'].'</td>';
                echo '<td>'. $row['message'].'</td>';
                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="per_execute.php?action=edit&id='.$row['id'] . '"><i class="fas fa-fw fa-th-list"></i>Accept</a>

                               <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="per_execute.php?action=delete&id='.$row['id']. '">
                                    <i class="fas fa-fw fa-edit"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>

                          ';
                echo '</tr> ';
                $serial++;
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
