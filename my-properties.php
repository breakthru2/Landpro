<?php 
    require_once 'inc/config.php';
    if (!isset($_SESSION['client'])) {
        $msg = "Please login to access your property";
        redirect("index.php?errmsg=$msg");
    } else{
        $client = selectQuery('clients', 'client_id', $_SESSION['client']);
        if (!empty($client)) {
            foreach ($client as $profile) {
                extract($profile);
            }
        }
    }

    $result = selectQuery('client_properties', 'client_id_fk', $_SESSION['client']);
    if ($result) {
        $client_prop = $result;
    }

 ?>






<?php require_once 'inc/page-header.php'; ?>

        <!-- Page Title #1
============================================ -->
        <section id="page-title" class="page-title bg-overlay bg-overlay-dark2">
            <div class="bg-section">
                <img src="assets/images/page-titles/1.jpg" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>my properties</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">my properties</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- .title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #page-title end -->

        <!-- #my properties
============================================= -->
        <section id="my-properties" class="my-properties properties-list">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="edit--profile-area">
                            <ul class="edit--profile-links list-unstyled mb-0">
                                <li class="text-center text-dark text-uppercase"><h6><span class="fa fa-user"></span> <?php echo "$firstname $lastname"; ?></h6></li>
                                <li><a href="my-properties.html" class="active">My Properties</a></li>
                                <li><a href="properties-grid.php">Add Property</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- .col-md-4 -->
                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <!-- .property-item #1 -->
                        <?php 
                        if ($client_prop) {
                            foreach ($client_prop as $prop) {
                                extract($prop);

                                $list = selectQuery('listings', 'listing_id', $listing_id_fk);
                                if ($list) {
                                    $listings = $list;
                                    foreach ($listings as $ownedprop) { ?>
                        <div class="property-item">
                            <div class="property--img">
                                <a href="#">
                        <img src="prop_uploads/thumb_01.jpg" alt="property image" class="img-responsive">
                        <span class="property--status">For <?php echo $ownedprop['type']; ?></span>
						</a>
                            </div>
                            <div class="property--content">
                                <div class="property--info">
                                    <h5 class="property--title"><a href="#">House in <?php echo $ownedprop['location']; ?></a></h5>
                                    <p class="property--location"><?php echo $ownedprop['location']; ?></p>
                                    <p class="property--price">$<?php echo $ownedprop['price']; ?></p>
                                </div>
                                <!-- .property-info end -->
                                <div class="property--features">
                                    <ul>
                                        <li><span class="feature">Beds:</span><span class="feature-num">4</span></li>
                                        <li><span class="feature">Baths:</span><span class="feature-num">2</span></li>
                                        <li><span class="feature">Area:</span><span class="feature-num">2500 sq ft</span></li>

                                    </ul>
                                </div>
                                <!-- .property-features end -->
                            </div>
                        </div>
                    <?php } } } } ?>
                        <!-- .property item end -->
                    </div>
            
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #my properties  end -->

        <!-- cta #1
============================================= -->
        <section id="cta" class="cta cta-1 text-center bg-overlay bg-overlay-dark pt-90">
            <div class="bg-section"><img src="assets/images/cta/bg-1.jpg" alt="Background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <h3>Join our professional team & agents to start selling your house</h3>
                        <a href="#" class="btn btn--primary">Contact</a>
                    </div>
                    <!-- .col-md-6 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #cta1 end -->


        <!-- Footer #1
============================================= -->
        <footer id="footer" class="footer footer-1 bg-white">
            <!-- Widget Section
	============================================= -->
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 widget--about">
                            <div class="widget--content">
                                <div class="footer--logo">
                                    <img src="assets/images/logo/logo-dark2.png" alt="logo">
                                </div>
                                <p>86 Petersham town, New South Wales Wardll Street, Australia PA 6550</p>
                                <div class="footer--contact">
                                    <ul class="list-unstyled mb-0">
                                        <li>+61 525 240 310</li>
                                        <li><a href="mailto:contact@land.com">contact@land.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-3 col-md-2 col-md-offset-1 widget--links">
                            <div class="widget--title">
                                <h5>Company</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Properties</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-3 col-md-2 widget--links">
                            <div class="widget--title">
                                <h5>Learn More</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Account</a></li>
                                    <li><a href="#">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-12 col-md-4 widget--newsletter">
                            <div class="widget--title">
                                <h5>newsletter</h5>
                            </div>
                            <div class="widget--content">
                                <form class="newsletter--form mb-40">
                                    <input type="email" class="form-control" id="newsletter-email" placeholder="Email Address">
                                    <button type="submit"><i class="fa fa-arrow-right"></i></button>
                                </form>
                                <h6>Get In Touch</h6>
                                <div class="social-icons">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-vimeo"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- .col-md-4 end -->

                    </div>
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-widget end -->

            <!-- Copyrights
	============================================= -->
            <div class="footer--copyright text-center">
                <div class="container">
                    <div class="row footer--bar">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <span>© 2018 <a href="http://themeforest.net/user/zytheme">Zytheme</a>, All Rights Reserved.</span>
                        </div>

                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-copyright end -->
        </footer>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>
