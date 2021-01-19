<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE,employee.FIRST_NAME,employee.LAST_NAME FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID JOIN employee on u.EMPLOYEE_ID= employee.EMPLOYEE_ID WHERE ID='.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
            $emp_name = $row['FIRST_NAME'].' '.$row['LAST_NAME'];
?>
  
<?php
  }           
?>

<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
            if (isset($_POST['save'])) {
              # code...
           
              $name = $_POST['name'];
              $pr = $_POST['price']; 
              $cat = $_POST['category'];
              $sub_cat = $_POST['sub_catagory']; 
        
              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO product
                              (NAME,NETPRICE,CATEGORY_ID,SUB_CATEGORY_ID,employee)
                              VALUES ('{$name}','{$pr}','{$cat}','{$sub_cat}','{$emp_name}')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                  }
                }
            
            ?>
              <script type="text/javascript">window.location = "product.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>