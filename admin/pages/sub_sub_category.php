<?php
   include'../includes/connection.php';
   include'../includes/sidebar.php';
   ?><?php 
   if(isset($_GET['del']))
   {
     mysqli_query($db,"delete from sub_sub_category where sub_sub_cat_id = '".$_GET['id']."'");

      mysqli_query($db,"delete from products where sub_sub_cat = '".$_GET['id']."'");
     $_SESSION['delmsg']="Sub Sub Category deleted !!";
   }
   
   $query = 'SELECT * from admin_info WHERE admin_id = '.$_SESSION['MEMBER_ID'];
   $result = mysqli_query($db, $query) or die (mysqli_error($db));
   
   while ($row = mysqli_fetch_assoc($result)) {
     $Aa = $row['TYPE'];
   
     if ($Aa=='User'){
   
                ?> 
<?php   }
   } 
   
   ?>  
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h4 class="m-2 font-weight-bold text-primary">Sub Sub Category&nbsp;<a  href="insert_sub_sub_category.php" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
               <tr>
                  <th>#</th>
                  <th>Sub Sub Category</th>
                  <th>Sub Category</th>
                  <th>Action</th>
               </tr>
               </tr>
            </thead>
            <tbody>
               <?php                  
                  $query = "SELECT * from sub_sub_category,sub_category where sub_category.sub_cat_id = sub_sub_category.sub_cat_id";
                  $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  $cnt=1;
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>'. $cnt.'</td>';
                    echo '<td>'. $row['name'].'</td>';
                    echo '<td>'. $row['sub_cat_name'].'</td>';
                    echo '<td align="right">
                  
                    <div class="btn-group">
                    <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                    ... <span class="caret"></span></a>
                    <ul class="dropdown-menu text-center" role="menu">
                    <li>
                    <a type="button"  class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="sub_sub_cat_edit.php?action=edit & id='.$row['sub_sub_cat_id']. '">
                    <i class="fas fa-fw fa-edit"></i> Edit
                    </a>
                    </li>
                    <li>
                    <a type="button"  class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="sub_sub_category.php?del=delete & id='.$row['sub_sub_cat_id']. '">
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