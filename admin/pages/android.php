<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
if(isset($_POST['submit']))
{
  $link = $_POST['link'];



  mysqli_query($db,"SELECT * from app_link");
  if(mysqli_affected_rows($db)>0){
    mysqli_query($db,"UPDATE app_link set link = '$link'");
  }else{
    $sql=mysqli_query($db,"INSERT  into app_link(link) values('$link')");
  }

  
  $_SESSION['msg']="App link Updated";

}

if(!isset($_SESSION['MEMBER_ID'])){
  ?>
  <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "login.php";
                    </script>
                    <?php
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
                    $get_info = mysqli_query($db,"SELECT * from app_link") ;
                    $get_info = mysqli_fetch_assoc($get_info);
                    ?>
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h4 class="m-2 font-weight-bold text-primary">Android App&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> --></h4>
                      </div>

                      <div class="card-body">
                        <?php if(isset($_POST['submit']))
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

                            <th>App Link</th>

                            <td> <input type="text" value="<?php echo $get_info['link'] ?>" placeholder="Enter android app link" name="link" id="phone" value="<?php echo $get_info['phone']; ?>" class="form-control">
                            </td>
                          </tr>
                          <tr>
                            <th></th>
                            <td> <button type="submit" class="button" name="submit" class="btn">Update</button></td>
                          </tr>

                        </table>
                      </form>
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
