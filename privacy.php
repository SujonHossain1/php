<?php include "includes/header.php"; ?>
<section class="after-header p-tb-10">
  <div class="container">
    <div class="row m-b-15">
      <div class="col-sm-8">
        <ul class="breadcrumb">
            <li><a href=""><i class="fa fa-home" title="Home"></i></a></li>
            <li><a href="privacy.php">Privacy Policy</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="col-sm-4">
        <h6 class="page-heading">Privacy Policy</h6>
    </div>
</div>
</div>

</section>
<div class="container body">
   <div class="row">
      <div id="content" class="col-sm-12">
         <div class="main_content">
            <div style="">
               <h2 style="font-size: 14px;"><b>Privacy Policy : </b></h2>
               <?php
                    $getterms = $dc->policy();
                    if($getterms!='false'){
                        while ($row = $getterms->fetch_assoc()) {

                ?>
               <p style="font-size: 14px;">&gt;&gt; <?php echo $row['policy']; ?></p>
               <?php  }  }  ?>
               

            </div>
         </div>
      </div>
   </div>
</div>
<?php include 'includes/footer.php'; ?>
