<?php
include'../includes/connection.php';
?>
            <?php
              $fname = $_POST['firstname'];
              $phone = $_POST['phonenumber'];
              $area = $_POST['area'];
              
            
              mysqli_query($db,"INSERT INTO delivery_man
                              (id, name,phone_number, area)
                              VALUES (Null,'{$fname}','{$phone}','{$area}')");
              header('location:employee.php');
            ?>