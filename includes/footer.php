        <div class="sliding_text_wrap">
            <marquee direction="left"><?php echo $notice; ?></marquee>
        </div>
        <footer>
            <div class="container">
                <div class="row footer-row">
                    <div class="col-md-3 col-sm-12">
                        <div class="featured-info">
                            <div class="text">
                                <a href="tel:<?php echo $getstoreinfo['phone']; ?>"><i class="fa fa-phone"></i>&nbsp;<?php echo $getstoreinfo['phone']; ?></a>
                            </div>
                        </div>
                        <div class="featured-info">
                            <div class="text email">
                                <a href="mailto:<?php echo $getstoreinfo['email']; ?>"><i class="fa fa-envelope-o"></i>&nbsp;<?php echo $getstoreinfo['email']; ?></a>
                            </div>
                        </div>
                        <div class="featured-info">
                            <div class="text email">
                                <i style="color: white !important; "  class="fa fa-map-marker" ></i>&nbsp;<?php echo $getstoreinfo['address']; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 col-sm-12">
                        <div class="row show-rooms">
                            <div class="col-sm-12 col-md-4">
                                <div class="social-icons">
                                    <h5 class="label">Quick Links</h5>
                                    <hr>
                                    <ul class="nav">
                                        <li><a href="login.php" style="color: white;">Login</a></li>
                                        <li><a href="cart.php" style="color: white;">Cart</a></li>
                                        <li><a href="forgotten.php" style="color: white;">Forgot Password</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="social-icons">
                                    <h5 class="label">Policies</h5>
                                    <hr>
                                    <ul class="nav">
                                        <li><a href="privacy.php" style="color: white;">Privacy Policy</a></li>
                                        <li><a href="warranty-policy.php" style="color: white;">Terms and Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="social-icons">
                                    <h5 class="label">Find Us:</h5>
                                    <hr>
                                    <ul>
                                        <li class="icon"><a href="<?php echo $getstoreinfo['facebook'] ?>" target="_blank" rel="noopener"><span class="fa fa-facebook" ></span></a></li>
                                        <li class="icon"><a href="<?php echo $getstoreinfo['youtube'] ?>" target="_blank" rel="noopener"><span class="fa fa-youtube-play"></span></a></li>
                                        <li class="icon"><a href="<?php echo $getstoreinfo['instagram'] ?>" target="_blank" rel="noopener"><span class="fa fa-instagram"></span></a></li>
                                    </ul>
                                    <?php
                                        $getapp = $dc->getapplink();
                                        $getapp = $getapp->fetch_assoc();
                                    ?>
                                    <span><a target="_blank" href="<?php echo $getapp['link'] ?>"><img style="max-width:200px;margin-top:10px;" src="images/playstore.png"></a></span>
                                </div>
                            </div>


                            <div class="clearfix invisible-md"></div>
                        </div>
                    </div>
                </div>
                <div class="copyright-text">
                    <h6>&copy; Developed By : Techdyno BD <br/></h6>
                </div>
            </div>
            <a class="to-top" href="#"><i class="fa fa-arrow-up"></i></a>
        </footer>
        <div class="overlay"></div>
    <script async src="catalog/view/theme/koyla/javascript/site.min.49.js" type="text/javascript"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/action.js"></script>

    </body>

    </html>
    <?php include 'includes/cart_view.php'; ?>

    <style type="text/css">
        footer .fa-map-marker:before{
            color:  white !important;
            font-size: 20px;
        }
    </style>