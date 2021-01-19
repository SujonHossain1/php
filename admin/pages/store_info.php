<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
if(isset($_POST['submit']))
{
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $youtube = $_POST['youtube'];
  $about = $_POST['about'];



  mysqli_query($db,"SELECT * from info");
  if(mysqli_affected_rows($db)>0){
    mysqli_query($db,"UPDATE info set phone = '$phone',address='$address',email='$email',facebook = '$facebook',instagram='$instagram',youtube='$youtube',about='$about'");
  }else{
    $sql=mysqli_query($db,"INSERT  into info(id,phone,address,email,facebook,instagram,youtube,about) values(null,'$phone','$address','$email','$facebook','$instagram','$youtube','$about')");
  }

  
  $_SESSION['msg']="About Us Updated";

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
                    $get_info = mysqli_query($db,"SELECT * from info") ;
                    $get_info = mysqli_fetch_assoc($get_info);
                    ?>
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h4 class="m-2 font-weight-bold text-primary">Store Info&nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> --></h4>
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

                            <th>Phone*</th>

                            <td> <input type="text" name="phone" id="phone" value="<?php echo $get_info['phone']; ?>" class="form-control" required>
                            </td>
                          </tr>
                          <tr>

                            <th>Address*</th>

                            <td> <input type="text" name="address" id="address" value="<?php echo $get_info['address']; ?>" class="form-control" required>
                            </td>
                          </tr>
                          <tr>

                            <th>Email*</th>

                            <td> <input type="email" name="email" id="email" value="<?php echo $get_info['email']; ?>" class="form-control" required>
                            </td>
                          </tr>
                          <tr>

                            <th>Facebook</th>

                            <td> <input type="text" name="facebook" id="facebook" value="<?php echo $get_info['facebook']; ?>" class="form-control">
                            </td>
                          </tr>
                          <tr>

                            <th>Instagram</th>

                            <td> <input type="text" name="instagram" id="instagram" value="<?php echo $get_info['instagram'] ?>" class="form-control">
                            </td>
                          </tr>
                          <tr>

                            <th>Youtube</th>

                            <td> <input type="text" name="youtube" id="youtube" value="<?php echo $get_info['youtube'] ?>" class="form-control">
                            </td>
                          </tr>
                          <tr>

                            <th>About Us</th>

                            <td> <textarea  name="about"   placeholder="About Us" rows="10" cols="120" class="form-control"><?php echo $get_info['about']; ?></textarea>
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
