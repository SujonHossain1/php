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
                     <th>Remarks</th>
                     <th>Employee</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>
<?php
	include'../includes/connection.php';
	$type = $_POST['CustomerType'];
  $day = $_POST['day'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $case = $_POST['case'];



 	if (!empty($day) && !empty($month) && !empty($year)) {



    $query = "SELECT *,T.employee as EMPLOYEE FROM customer C,transaction T,product P,due D WHERE Day(T.DATE)='{$day}' and month(T.DATE)='{$month}' and YEAR(T.DATE) = '{$year}' AND C.CUST_ID=T.CUST_ID and T.CUSTOMER_TYPE='{$type}' and T.TRANS_D_ID = D.TRANS_D_ID GROUP BY T.TRANS_D_ID";
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
              $netamount = $row['SUBTOTAL'];
              $sellamount = $row['GRANDTOTAL'];
              $profit = $sellamount-$netamount; 
              $due = $row['due_amount'];                                
                echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'.$row['DATE'].'</td>';
                echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $netamount.'</td>';
                echo '<td>'. $sellamount.'</td>';
                echo '<td>'. $profit.'</td>';
                echo '<td>'. $due.'</td>';
                echo '<td>'. $row['REMARK'].'</td>';
                echo '<td>'. $row['EMPLOYEE'].'</td>';



                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                                <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" target="_blank" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="invoice.php?action=edit & id='.$row['TRANS_D_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Print Invoice
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
                        }
    # code...
  }



  if(empty($day) && empty($month) && !empty($year))
  {

    $query = "SELECT *,T.employee as EMPLOYEE FROM customer C,transaction T,product P,due D WHERE YEAR(T.DATE) = '{$year}' AND C.CUST_ID=T.CUST_ID and T.CUSTOMER_TYPE='{$type}' and T.TRANS_D_ID = D.TRANS_D_ID GROUP BY T.TRANS_D_ID";
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
              $netamount = $row['SUBTOTAL'];
              $sellamount = $row['GRANDTOTAL'];
              $profit = $sellamount-$netamount; 
              $due = $row['due_amount'];                                
                echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'.$row['DATE'].'</td>';
                echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $netamount.'</td>';
                echo '<td>'. $sellamount.'</td>';
                echo '<td>'. $profit.'</td>';
                echo '<td>'. $due.'</td>';
                echo '<td>'. $row['REMARK'].'</td>';
                echo '<td>'. $row['EMPLOYEE'].'</td>';

                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                                <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" target="_blank" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="invoice.php?action=edit & id='.$row['TRANS_D_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Print Invoice
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
                        }

  }
  elseif (empty($day) && !empty($month) && !empty($year)) {
    $case = '2';
    $query = "SELECT *,T.employee as EMPLOYEE FROM customer C,transaction T,product P,due D WHERE month(T.DATE)='{$month}' and YEAR(T.DATE) = '{$year}' AND C.CUST_ID=T.CUST_ID and T.CUSTOMER_TYPE='{$type}' and T.TRANS_D_ID = D.TRANS_D_ID GROUP BY T.TRANS_D_ID";
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
              $netamount = $row['SUBTOTAL'];
              $sellamount = $row['GRANDTOTAL'];
              $profit = $sellamount-$netamount; 
              $due = $row['due_amount'];                                
                echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'.$row['DATE'].'</td>';
                echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $netamount.'</td>';
                echo '<td>'. $sellamount.'</td>';
                echo '<td>'. $profit.'</td>';
                echo '<td>'. $due.'</td>';
                echo '<td>'. $row['REMARK'].'</td>';
                echo '<td>'. $row['EMPLOYEE'].'</td>';


                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                                <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" target="_blank" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="invoice.php?action=edit & id='.$row['TRANS_D_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Print Invoice
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
		
	}
  
}
include'../includes/connection.php';
    if ($case>0) {
      if($case==1)
      {
        //$query = "SELECT sum(transaction.GRANDTOTAL - transaction.SUBTOTAL) profit FROM transaction where DayOfYear(DATE)='{$day}' and  month(DATE)='{$month}' and year(Date) = '{$year}' and transaction.CUSTOMER_TYPE='{$type}'";
        $query = "SELECT sum(transaction.GRANDTOTAL) profit FROM transaction where Day(DATE)='{$day}' and  month(DATE)='{$month}' and year(Date) = '{$year}' and transaction.CUSTOMER_TYPE='{$type}'";
      }
      else if ($case == 2) {
        //$query = "SELECT sum(transaction.GRANDTOTAL - transaction.SUBTOTAL) profit FROM transaction WHERE month(DATE)='{$month}' and year(Date) = '{$year}' and transaction.CUSTOMER_TYPE='{$type}'";
        $query = "SELECT sum(transaction.GRANDTOTAL) profit FROM transaction WHERE month(DATE)='{$month}' and year(Date) = '{$year}' and transaction.CUSTOMER_TYPE='{$type}'";
        # code...
      }
      else if($case == 3)
      {
        //$query = "SELECT sum(transaction.GRANDTOTAL - transaction.SUBTOTAL) profit FROM transaction WHERE year(Date) = '{$year}' and transaction.CUSTOMER_TYPE='{$type}'";
         $query = "SELECT sum(transaction.GRANDTOTAL) profit FROM transaction WHERE year(Date) = '{$year}' and transaction.CUSTOMER_TYPE='{$type}'";

      }
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    $profit = $row['profit'];
    $space = " ";
    echo "<tr>
            <td><h5 style='color: #F57423;'><b>Total Selling Amount: $profit Taka</b></h5></td>
            <td>";
    echo $space;
    echo "</td><td>";
    echo $space;
    echo "</td><td>";
    echo $space;
    echo "</td><td>";
    echo $space;
    echo "</td><td>";
    echo $space;
    echo "</td><td>";
    echo $space;
    echo "</td><td>";
    echo $space;
    echo "</td><td>";
    echo $space;
    echo "</td><td>";
    echo $space;
    echo "</td><td>";
    echo $space;
    echo "</td></tr>";
    echo "</tbody>";
    echo "</table>";
  }
	
	
?>