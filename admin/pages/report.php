<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
$case = '0';
$query = 'SELECT * from admin_info WHERE admin_id = '.$_SESSION['MEMBER_ID'];
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
                <!DOCTYPE html>
                <html lang="en">
                <head>
                 <meta charset="UTF-8">
                 <title></title>
               </head>
               <body>

                 <h4 align="center">Sales Report</h4>

                 <div style="margin-left: 20%; margin-right: 20%">
                   <form action="#" method="POST" class="form-inline" role="form">
                    <div class="form-group">
                      <select name="day" class="form-control">
                       <option value="">Choose Day</option>
                       <option  value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                       <option value="8">8</option>
                       <option value="9">9</option>
                       <option value="10">10</option>
                       <option value="11">11</option>
                       <option value="12">12</option>
                       <option value="13">13</option>
                       <option value="14">14</option>
                       <option value="15">15</option>
                       <option value="16">16</option>
                       <option value="17">17</option>
                       <option value="18">18</option>
                       <option value="19">19</option>
                       <option value="20">20</option>
                       <option value="21">21</option>
                       <option value="22">22</option>
                       <option value="23">23</option>
                       <option value="24">24</option>
                       <option value="25">25</option>
                       <option value="26">26</option>
                       <option value="27">27</option>
                       <option value="28">28</option>
                       <option value="29">29</option>
                       <option value="30">30</option>
                       <option value="31">31</option>
                     </select>
                   </div>
                   <div class="form-group">
                    <select name="month" class="form-control" >
                     <option value="">Choose Month</option>
                     <option value="01">January</option>
                     <option value="02">February</option>
                     <option value="03">March</option>
                     <option value="04">April</option>
                     <option value="05">May</option>
                     <option value="06">June</option>
                     <option value="07">July</option>
                     <option value="08">August</option>
                     <option value="09">September</option>
                     <option value="10">October</option>
                     <option value="11">Movember</option>
                     <option value="12">December</option>
                   </select>
                 </div>
                 <div class="form-group">
                  <select name="year" class="form-control" required="tr">
                   <option value="">Choose Year</option>
                   <option value="2015">2015</option>
                   <option value="2016">2016</option>
                   <option value="2017">2017</option>
                   <option value="2018">2018</option>
                   <option value="2019">2019</option>
                   <option value="2020">2020</option>
                   <option value="2021">2021</option>
                   <option value="2022">2022</option>
                   <option value="2023">2023</option>
                   <option value="2024">2024</option>
                   <option value="2025">2025</option>
                   <option value="2026">2026</option>
                   <option value="2027">2027</option>
                   <option value="2028">2028</option>
                   <option value="2029">2029</option>
                   <option value="2030">2030</option>
                   <option value="2031">2031</option>
                   <option value="2032">2032</option>
                   <option value="2033">2033</option>
                   <option value="2034">2034</option>
                   <option value="2035">2035</option>
                   <option value="2036">2036</option>
                   <option value="2037">2037</option>
                   <option value="2038">2038</option>
                   <option value="2039">2039</option>
                   <option value="2040">2040</option>

                 </select>
               </div>
               <div class="form-group">
                <input type="submit" value="View Report" name="view" class="btn btn-info">&nbsp;
              </div>
            </form>
          </div>
        </body>
        </html>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Sales Report</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                 <tr>
                  <th>#</th>
                  <th >Order ID</th>
                  <th >Order Date</th>
                  <th>Customer Name</th>
                  <th >Selling Product quantity</th>
                  <th >Product Total Price</th>
                  <th>Delivery Charge</th>
                  <th>Total Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php    
                if (isset($_POST['view'])) {
                 $day = $_POST['day'];
                 $month = $_POST['month'];
                 $year = $_POST['year'];

                 $case = '0';
                 if (!empty($day) && !empty($month) && !empty($year)) {
                   $case = '1';
                   $query = "SELECT * from orders_info WHERE DAY(date)='{$day}' and MONTH(date) = '{$month}' and YEAR(date) = '{$year}'";

                   $result = mysqli_query($db, $query) or die (mysqli_error($db));
                   $cnt = 1;
                   while ($row = mysqli_fetch_assoc($result)) {                               
                    echo '<tr>';
                    echo '<td>'. $cnt.'</td>';
                    echo '<td>'. $row['order_id'].'</td>';
                    echo '<td>'.$row['date'].'</td>';
                    echo '<td>'. $row['f_name'].'</td>';
                    echo '<td>'. $row['prod_count'].'</td>';
                    echo '<td>'. $row['product_total'].'</td>';
                    echo '<td>'. $row['delivery_charge'].'</td>';
                    echo '<td>'. $row['total_amt'].'</td>';
                    echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['order_id'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                    <div class="btn-group">
                    <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                    ... <span class="caret"></span></a>
                    <ul class="dropdown-menu text-center" role="menu">
                    <li>
                    <a type="button" target="_blank" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="invoice.php?action=edit & id='.$row['order_id']. '">
                    <i class="fas fa-fw fa-edit"></i> Print Invoice
                    </a>
                    </li>
                    </ul>
                    </div>
                    </div> </td>';
                    echo '</tr> ';
                    $cnt++;
                  }
                }
                if(empty($day) && empty($month) && !empty($year))
                {
                  $case = '3';
                  $query = "SELECT * from orders_info WHERE YEAR(date) = '{$year}'";
                  $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                  $cnt = 1;
                  while ($row = mysqli_fetch_assoc($result)) {                               
                    echo '<tr>';
                    echo '<td>'. $cnt.'</td>';
                    echo '<td>'. $row['order_id'].'</td>';
                    echo '<td>'.$row['date'].'</td>';
                    echo '<td>'. $row['f_name'].'</td>';
                    echo '<td>'. $row['prod_count'].'</td>';
                    echo '<td>'. $row['product_total'].'</td>';
                    echo '<td>'. $row['delivery_charge'].'</td>';
                    echo '<td>'. $row['total_amt'].'</td>';
                    echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['order_id'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                    <div class="btn-group">
                    <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                    ... <span class="caret"></span></a>
                    <ul class="dropdown-menu text-center" role="menu">
                    <li>
                    <a type="button" target="_blank" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="invoice.php?action=edit & id='.$row['order_id']. '">
                    <i class="fas fa-fw fa-edit"></i> Print Invoice
                    </a>
                    </li>
                    </ul>
                    </div>
                    </div> </td>';
                    echo '</tr> ';
                    $cnt++;
                  }

                }
                elseif (empty($day) && !empty($month) && !empty($year)) {
                  $case = '2';
                  $query = "SELECT * from orders_info WHERE MONTH(date) = '{$month}' and YEAR(date) = '{$year}'";
                  $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                  $cnt = 1;
                  while ($row = mysqli_fetch_assoc($result)) {                               
                    echo '<tr>';
                    echo '<td>'. $cnt.'</td>';
                    echo '<td>'. $row['order_id'].'</td>';
                    echo '<td>'.$row['date'].'</td>';
                    echo '<td>'. $row['f_name'].'</td>';
                    echo '<td>'. $row['prod_count'].'</td>';
                    echo '<td>'. $row['product_total'].'</td>';
                    echo '<td>'. $row['delivery_charge'].'</td>';
                    echo '<td>'. $row['total_amt'].'</td>';
                    echo '<td align="right">
                    <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['order_id'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                    <div class="btn-group">
                    <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                    ... <span class="caret"></span></a>
                    <ul class="dropdown-menu text-center" role="menu">
                    <li>
                    <a type="button" target="_blank" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="invoice.php?action=edit & id='.$row['order_id']. '">
                    <i class="fas fa-fw fa-edit"></i> Print Invoice
                    </a>
                    </li>
                    </ul>
                    </div>
                    </div> </td>';
                    echo '</tr> ';
                    $cnt++;
                  }
		# code...
                }
                
                echo "</tbody>";
                echo "</table>";
                echo "<a target = '_blank' href=print_report.php?day=$day&month=$month&year=$year><button class='btn btn-info'>Print Report</button></a>";
                echo "<hr>";
                
              }
              else if (isset($_POST['print_report'])) {
              }
              ?>                                     
            </tbody>

          </table>
          <br><h4 style="color: #9F6D2D;"><b>Total Selling Amount:  
            <?php
            include'../includes/connection.php';
            if ($case>0) {
              if($case==1)
              {
               
                $query = "SELECT sum(product_total) sell from orders_info WHERE DAY(date)='{$day}' and MONTH(date) = '{$month}' and YEAR(date) = '{$year}'";
              }
              else if ($case == 2) {
                
         $query = "SELECT sum(product_total) sell from orders_info WHERE MONTH(date) = '{$month}' and YEAR(date) = '{$year}'"; # code...
       }
       else if($case == 3)
       {
        //$query = "SELECT sum(transaction.GRANDTOTAL - transaction.SUBTOTAL) profit FROM transaction WHERE year(Date) = '{$year}'";
        $query="SELECT sum(product_total) sell from orders_info WHERE YEAR(date) = '{$year}'";

      }
      $result = mysqli_query($db, $query) or die (mysqli_error($db));
      $row = mysqli_fetch_assoc($result);
      
      echo $row['sell'];
    }
    ?> Taka</b><h4>
      
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('#filter').change(function(){
      var customertype = $(this).val();
      $.ajax({
        url : "../ajax_fetch/report_fetch.php",
        method : "POST",
        data : 
        {
          CustomerType : customertype,
          day: "<?php echo $day?>",
          month:"<?php echo $month?>",
          year:"<?php echo $year?>",
          case:"<?php echo $case?>"
        },
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
