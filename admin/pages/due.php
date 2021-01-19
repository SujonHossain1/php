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
            ?>
            
           <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Due Transections</h4>
               <select id="filter" style="float: right;">
                <option value="regular">Select Customer Type</option>
                <option value="regular" name="" id="regular">Regular Customer</option>
                <option value="broker" id="broker">Sub-Agent</option>
            </select>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th >Transaction ID</th>
                     <th >Transaction Date</th>
                     <th>Customer Name</th>
                     <th>Service</th>
                     <th>Net Price</th>
                     <th>Selling Price</th>
                     <th>Profit/Loss</th>
                      <th>Due</th>
                      <th>Employee</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php    

    $query = "SELECT *,T.employee as EMPLOYEE FROM customer C,transaction T,product P,due D WHERE D.due_amount >'0' AND C.CUST_ID=T.CUST_ID and T.TRANS_D_ID = D.TRANS_D_ID GROUP BY T.TRANS_D_ID";
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
              $netamount = $row['SUBTOTAL'];
              $sellamount = $row['GRANDTOTAL'];
              $profit = $sellamount-$netamount; 
             // $due = $sellamount-$row['CASH'];                                
                echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'.$row['DATE'].'</td>';
                echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $netamount.'</td>';
                echo '<td>'. $sellamount.'</td>';
                echo '<td>'. $profit.'</td>';
                echo '<td>'. $row['due_amount'].'</td>';
                echo '<td>'. $row['EMPLOYEE'].'</td>';


                      echo  '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['TRANS_ID'] .'"><i class="fas fa-fw fa-list-alt"></i> View</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="due_edit.php?action=edit & id='.$row['TRANS_D_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';



                echo '</tr> ';
                        }
    # code...
  echo "</tbody>";
  echo "</table>";
  
              # code...            
    
        
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
      $('#filter').change(function(){
        var customertype = $(this).val();
        $.ajax({
          url : "../ajax_fetch/due_fetch.php",
          method : "POST",
          data : {CustomerType : customertype},
          dataType : "text",
          success : function(data)
          {
            $('#dataTable').html(data);
          }
        });
      });
    });
  </script>


<?php
include'../includes/footer.php';
?>