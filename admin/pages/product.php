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
                if(isset($_GET['del']))
                {
                  mysqli_query($db,"delete from products where product_id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
                }

                ?>  

                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h4 class="m-2 font-weight-bold text-primary">Products&nbsp;<a  href="insert_product.php" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                        <thead>
                          <tr>
                            <tr>
                              <th>#</th>
                              <th>Image</th>
                              <th>Product Name</th>
                              <th>Product Price</th>
                              <th>Category </th>
                              <th>Sub category</th>
                              <th>Sub sub category</th>
                              <th>Action</th>
                            </tr>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = "SELECT * FROM `products` ORDER BY `products`.`product_id` DESC";                  
                          $result = mysqli_query($db, $query) or die (mysqli_error($db));
                          $cnt=1;
                          while ($row = mysqli_fetch_assoc($result)) {
                            $cat = $row['product_cat'];
                            $subcat = $row['product_sub_cat'];
                            $subsubcat = $row['sub_sub_cat'];
                            $getcat = mysqli_query($db,"SELECT * from categories where cat_id = '$cat'");
                            $getcat = mysqli_fetch_assoc($getcat);
                            $getsubcat = mysqli_query($db,"SELECT * from sub_category where sub_cat_id = '$subcat'");
                            $getsubcat = mysqli_fetch_assoc($getsubcat);
                            $getsubbcat = mysqli_query($db,"SELECT * from sub_sub_category where sub_sub_cat_id = '$subsubcat'");
                            $getsubbcat = mysqli_fetch_assoc($getsubbcat);
                            echo '<tr>';
                            echo '<td>'. $cnt.'</td>';
                            echo '<td><img style="width: 50px;" src="../../'. $row['product_image'].'"</td>';
                            echo '<td>'. $row['product_title'].'</td>';
                            echo '<td>'. $row['product_price'].'</td>';
                            echo '<td>'. $getcat['cat_title'].'</td>';
                            echo '<td>'. $getsubcat['sub_cat_name'].'</td>';
                            echo '<td>'. $getsubbcat['name'].'</td>';
                            echo '<td align="right">

                            <div class="btn-group">
                            <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                            ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                            <li>
                            <a type="button" target="_blank" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id='.$row['product_id']. '">
                            <i class="fas fa-fw fa-edit"></i> Edit
                            </a>
                            </li>
                            <li>
                            <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="product.php?del=delete & id='.$row['product_id']. '">
                            <i class="fas fa-fw fa-edit"></i> Delete
                            </a>
                            </li>
                            </ul>
                            </div>
                            </div> </td>

                            ';
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