<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th >Transaction ID</th>
                     <th >Transaction Date</th>
                     <th>Customer Name</th>
                     <th >Service</th>
                     <th >Net Price</th>
                     <th>Selling Price</th>
                     <th>Profit/Loss</th>
                      <th>Due</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php
	include'../includes/connection.php';
	$type = $_POST['CustomerType'];
	$query = mysqli_query($db, "SELECT * FROM customer C,transaction T,product P,due D WHERE D.due_amount >'0' AND C.CUST_ID=T.CUST_ID and T.TRANS_D_ID = D.TRANS_D_ID and T.CUSTOMER_TYPE='{$type}' GROUP BY T.TRANS_D_ID");
	while($row = mysqli_fetch_array($query)){
		 $netamount = $row['SUBTOTAL'];
              $sellamount = $row['GRANDTOTAL'];
              $profit = $sellamount-$netamount; 
              $due = $sellamount-$row['CASH'];                                
                echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'.$row['DATE'].'</td>';
                echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $netamount.'</td>';
                echo '<td>'. $sellamount.'</td>';
                echo '<td>'. $profit.'</td>';
                echo '<td>'. $row['due_amount'].'</td>';


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
	
	
?>