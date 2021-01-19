<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
if(isset($_POST['submit']))
{
  $notice = $_POST['notice'];

  mysqli_query($db,"SELECT * from notice");
  if(mysqli_affected_rows($db)>0){
    mysqli_query($db,"UPDATE notice set notice = '$notice'");
  }else{
    $sql=mysqli_query($db,"INSERT  into notice(id,notice) values(null,'$notice')");
  }

  
  $_SESSION['msg']="Notice Updated";

}

if(isset($_GET['del'])){
  mysqli_query($db,"DELETE from notice where id = '".$_GET['id']."'");
   $_SESSION['msg']="Notice Deleted";
}
 ?>
 
                  <!DOCTYPE html>
                  <html lang="en">
                  <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Admin| </title>
                    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
                    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
                    <link type="text/css" href="css/theme.css" rel="stylesheet">
                    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
                    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
                    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
                    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

                    <script>
                      function getSubcat(val) {
                        $.ajax({
                          type: "POST",
                          url: "get_sub.php",
                          data:'cat_id='+val,
                          success: function(data){
                            $("#subcategory").html(data);
                          }
                        });
                      }
                      function selectCountry(val) {
                        $("#search-box").val(val);
                        $("#suggesstion-box").hide();
                      }
                    </script> 


                  </head>
                  <body>
                    <?php
                    $get_info = mysqli_query($db,"SELECT * from notice") ;
                    $get_info = mysqli_fetch_assoc($get_info);
                    ?>
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h4 class="m-2 font-weight-bold text-primary">Notice&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> --></h4>
                      </div>

                      <div class="card-body">
                        <?php if(isset($_POST['submit']) || isset($_GET['del']))
                        {?>
                          <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                          </div>
                        <?php } ?>
                        <div class="table-responsive">
                         <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
                          <table class="table table-bordered" id="" width="100%" cellspacing="0">        


                          <tr>

                            <th>Notice</th>

                            <td> <textarea  name="notice"   placeholder="Notice" rows="10" cols="120" class="form-control"><?php echo $get_info['notice']; ?></textarea>
                            </td>
                          </tr>
                          <tr>
                            <th></th>
                            <td> <button type="submit" class="button" name="submit" class="btn">Insert</button></td>
                          </tr>

                        </table>
                      </form>
                    </div>
                  </div>
                </div>

                 <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-2 font-weight-bold text-primary">Notice&nbsp;</h4>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                      <thead>
                        <tr>
                          <tr>
                            <th>#</th>
                            <th>Notice</th>
                            <th>Action</th>
                          </tr>
                        </tr>
                      </thead>
                      <tbody>
                        <?php                  
                        $query = "SELECT * from notice";
                        $result = mysqli_query($db, $query) or die (mysqli_error($db));
                        $cnt=1;
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo '<tr>';
                          echo '<td>'. $cnt.'</td>';
                          echo '<td>'. $row['notice'].'"</td>';
                          echo '<td align="right">

                          <div class="btn-group">
                          <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                          ... <span class="caret"></span></a>
                          <ul class="dropdown-menu text-center" role="menu">

                          <li>
                          <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="notice.php?del='.$row['id']. ' & id='.$row['id']. '">
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

                <style type="text/css">
                  .button {
                    background-color: #4CAF50; /* Green */
                    border: none;
                    color: white;
                    border-radius: 15px;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                  }
                </style>
