<?php 
    require_once 'inc/config.php';

    if (isset($_POST['logsub'])) {
        $result = login($_POST);

        if ($result) {
            $client = $result;
            $client_id = $client['client_id'];
            redirect("my-properties.php?c_id=$client_id");
        } else {
            $errors = $result;
            echo "<script>alert('Not logged in')</script>";
        }
    }

    if (isset($_POST['regsub'])) {
        $response = register($_POST);

        if ($response === true) {
            $msg = "You can now login";
            redirect("index.php?logmsg=$msg");
        } else {
            $errors = $response;
            echo "<script>alert('Not Registered')</script>";
        }
    }

    if (isset($_GET['logmsg'])) {
        $log = $_GET['logmsg'];
         echo "<script>alert('$log')</script>";
    }

    if (isset($_GET['errmsg'])) {
        $logerr = $_GET['errmsg'];
         echo "<script>alert('$logerr')</script>";
    }

    $query = fetchTabelData('listings');
    if ($query) {
        $props = $query;
    }
 ?>

<?php require_once 'inc/page-header.php'; ?>
        <!-- Hero Search
============================================= -->
        <section id="heroSearch" class="hero-search mtop-100 pt-0 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="slider--content">
                            <div class="text-center">
                                <h1>Find Your Favorite Property</h1>
                            </div>
                            <form class="mb-0">
                                <div class="form-box search-properties">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-location" id="select-location">
                                        <option>Any Location</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Florida</option>
                                        <option>Mississippi</option>
                                        <option>Oregon</option>
                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-type" id="select-type">
                                        <option>Any Type</option>
                                        <option>Apartment</option>
                                        <option>House</option>
                                        <option>Office</option>
                                        <option>Villa</option>
                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-status" id="select-status">
                                        <option>Any Status</option>
                                        <option>For Rent</option>
                                        <option>For Sale</option>
                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <input type="submit" value="Search" name="submit" class="btn btn--primary btn--block">
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 option-hide">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-beds" id="select-beds">
                                        <option>Beds</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 option-hide">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-baths" id="select-baths">
                                        <option>Baths</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-6 option-hide">
                                            <div class="filter mb-30">
                                                <p>
                                                    <label for="amount">Price Range: </label>
                                                    <input id="amount" type="text" class="amount" readonly>
                                                </p>
                                                <div class="slider-range"></div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <a href="#" class="less--options">More options</a>
                                        </div>
                                    </div>
                                    <!-- .row end -->
                                </div>
                                <!-- .form-box end -->
                            </form>
                        </div>
                    </div>
                    <!-- .container  end -->
                </div>
                <!-- .slider-text end -->
            </div>
            <div class="carousel slider-navs" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="false" data-space="0" data-loop="true" data-speed="800">
                <!-- Slide #1 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/3.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
                <!-- Slide #2 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/1.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
                <!-- Slide #3 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/3.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
            </div>
        </section>
        <!-- #property-single-slider end -->

        <!-- properties-carousel
============================================= -->
        <section id="properties-carousel" class="properties-carousel pt-90 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2 text-center mb-70">
                            <h2 class="heading--title">Latest Properties</h2>
                            <p class="heading--desc">Duis aute irure dolor in reprehed in volupted velit esse dolore</p>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                            <!-- .property-item #1 -->
                        <?php 
                        if (!empty($props)) {
                            foreach ($props as $prop) {
                                extract($prop); ?>
                            <div class="property-item">
                                <div class="property--img">
                                    <a href="#">
                            <img src="prop_uploads/thumb_01.jpg" alt="property image" class="img-responsive">
                            <span class="property--status">For <?php echo $type; ?></span>
</a>
                                </div>
                                <div class="property--content">
                                    <div class="property--info">
                                        <h5 class="property--title"><a href="#">Apartment in <?php echo $location; ?></a></h5>
                                        <p class="property--location"><?php echo $location; ?></p>
                                        <p class="property--price">$<?php echo $price; ?></p>
                                    </div>
                                    <!-- .property-info end -->
                                    <div class="property--features">
                                        <ul class="list-unstyled mb-0">
                                            <li><span class="feature">Beds:</span><span class="feature-num">2</span></li>
                                            <li><span class="feature">Baths:</span><span class="feature-num">1</span></li>
                                            <li><span class="feature">Area:</span><span class="feature-num">200 sq ft</span></li>
                                        </ul>
                                    </div>
                                    <!-- .property-features end -->
                                </div>
                            </div>
                    <?php } } ?>
                            <!-- .property item end -->

                        </div>
                        <!-- .carousel end -->
                    </div>
                    <!-- .col-md-12 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #properties-carousel  end  -->

        <!-- Feature
============================================= -->
        <section id="feature" class="feature feature-1 text-center bg-white pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2 text-center mb-70">
                            <h2 class="heading--title">Simple Steps</h2>
                            <p class="heading--desc">Duis aute irure dolor in reprehed in volupted velit esse dolore</p>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <!-- feature Panel #1 -->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="feature-panel">
                            <div class="feature--icon">
                                <img src="assets/images/features/icons/5.png" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Search For Real Estates</h3>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eule pariate.</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <!-- feature Panel #2 -->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="feature-panel">
                            <div class="feature--icon">
                                <img src="assets/images/features/icons/6.png" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Select Your Favorite</h3>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eule pariate.</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <!-- feature Panel #3 -->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="feature-panel">
                            <div class="feature--icon">
                                <img src="assets/images/features/icons/7.png" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Take Your Key</h3>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eule pariate.</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- .feature end -->
        <!-- city-property
============================================= -->

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
