
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <!-- 1ST TAB -->
                              <!-- 2ND TAB -->
                                <div class="tab-pane fade in mt-2" id="_1">
                                  <div class="row">
                                      <?php
                                      include'../includes/connection.php'; 
                                       $query = 'SELECT * FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=1';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                              <!-- 3rd TAB -->
                                <div class="tab-pane fade in mt-2" id="_2">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=2';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                              <!-- 4th TAB -->
                                <div class="tab-pane fade in mt-2" id="_3">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=3';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                              <!-- 5th TAB -->
                                <div class="tab-pane fade in mt-2" id="_4">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=4';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                              <!-- 6th TAB -->
                                <div class="tab-pane fade in mt-2" id="_5">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=5';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                              <!-- 7th TAB -->
                                <div class="tab-pane fade in mt-2" id="_6">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=6';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                              <!-- 8th TAB -->
                                <div class="tab-pane fade in mt-2" id="_7">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=7';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                              <!-- 8th TAB -->
                                <div class="tab-pane fade in mt-2" id="_8">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=8';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>

                                <!-- Ninth Tab -->
                                        <div class="tab-pane fade in mt-2" id="_9">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=9';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Ninth Tab -->


                                 <!-- Tenth Tab -->
                                        <div class="tab-pane fade in mt-2" id="_10">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=10';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Tenth Tab -->

                                 <!-- Eleventh Tab -->
                                        <div class="tab-pane fade in mt-2" id="_11">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=11';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Eleventh Tab -->

                                 <!-- Twelve Tab -->
                                        <div class="tab-pane fade in mt-2" id="_12">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=12';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Twelve Tab -->


                                 <!-- Thriteen Tab -->
                                        <div class="tab-pane fade in mt-2" id="_13">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=13';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Thriteen Tab -->

                                <!-- Fourteen Tab -->
                                        <div class="tab-pane fade in mt-2" id="_14">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=14';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Thriteen Tab -->

                                <!-- Fiftheen Tab -->
                                        <div class="tab-pane fade in mt-2" id="_15">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=15';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Fiftheen Tab -->

                                <!-- Sixtenth Tab -->
                                        <div class="tab-pane fade in mt-2" id="_16">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=16';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Sixteenth Tab -->

                                <!-- Sevententh Tab -->
                                        <div class="tab-pane fade in mt-2" id="_17">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=17';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Sevententh Tab -->

                                 <!-- Eightenth Tab -->
                                        <div class="tab-pane fade in mt-2" id="_18">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=18';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Eightenth Tab -->


                                 <!-- Ningtheth Tab -->
                                        <div class="tab-pane fade in mt-2" id="_19">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=19';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Ningtheth Tab -->

                                 <!-- Twenty Tab -->
                                        <div class="tab-pane fade in mt-2" id="_20">
                                  <div class="row">
                                      <?php  $query = 'SELECT *,sub_catagory.sub_id FROM product,sub_catagory WHERE product.SUB_CATEGORY_ID=sub_catagory.sub_id AND product.CATEGORY_ID=20';
                                        $result = mysqli_query($db, $query);

                                        if ($result):
                                            if(mysqli_num_rows($result)>0):
                                                while($product = mysqli_fetch_assoc($result)):
                                                //print_r($product);
                                      ?>
                                    <div class="col-sm-4 col-md-2" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                                          <div class="products">
                                              <h6 class="text-info"><?php echo $product['NAME'].'<br><br>'.$product['sub_cat_name']; ?></h6>
                                              <h6>taka <?php echo $product['NETPRICE']; ?></h6>
                                              <input type="text" name="quantity" class="form-control" value="1" />
                                              <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                                               <input type="hidden" name="netprice" value="<?php echo $product['NETPRICE']; ?>">
                                              <input type="text" name="price" class="form-control" 
                                              value="<?php echo $product['NETPRICE']; ?>" />
                                              <input type="hidden" name="sub_id" value="<?php echo $product['SUB_CATEGORY_ID']; ?>" />
                                               <input type="hidden" name="CATEGORY_ID" value="<?php echo $product['CATEGORY_ID']; ?>" />

                                              <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                          </div>
                                      </form>
                                  </div>
                                      <?php endwhile;
                                        endif;
                                    endif;   
                                    ?>
                                    </div>
                                </div>
                                <!-- Twenty Tab -->





<!-- wala na di nadala sa tab pane, dalom nana di na part -->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                      </div>
                    </div>
                  </div>