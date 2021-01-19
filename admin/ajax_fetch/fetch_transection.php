<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">Transaction Number</th>
                     <th>Customer</th>
                     <th width="13%"># of Items</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>
<?php
	include'../includes/connection.php';
	$type = $_POST['CustomerType'];
	$query = mysqli_query($db, "SELECT *, FIRST_NAME, LAST_NAME
              FROM transaction T
              JOIN customer C ON T.`CUST_ID`=C.`CUST_ID` WHERE T.CUSTOMER_TYPE='{$type}'
              ORDER BY TRANS_D_ID ASC ");
	while($row = mysqli_fetch_array($query)){
		echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                echo '<td>'. $row['NUMOFITEMS'].'</td>';
                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>

                               <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="invoice.php?action=edit & id='.$row['TRANS_D_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Print Invoice
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>

                          ';
                echo '</tr> ';
		
	}


?>