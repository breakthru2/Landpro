<?php 
    require_once 'inc/config.php';

    if (isset($_GET['l_id'])) {
        $listing_id = $_GET['l_id'];

        $result = selectQuery('listings', 'listing_id', $listing_id);
        if ($result) {
            $listing_details = $result;
            foreach ($listing_details as $list) {
                extract($list);
            }
        }

    $response = selectQuery('agents', 'agent_id', $agent_id_fk);
    if ($response) {
        $agents = $response;
    }

    $props = fetchTabelData('listings');
    if ($props) {
        $allprops = $props;
    }









    if (isset($_POST['submit'])) {
        if (isset($_SESSION['client'])) {
            $client_id = $_SESSION['client'];

            $results = clientProp($_POST, $list['listing_id'], $client_id);
            if ($results === true) {
                echo "<script>alert('Property added to your List')</script>";
            } else {
                $errors = $results;
                echo "<script>alert('Ooops!!! Something went wrong, Property not added')</script>";
            }
        
        } else {
             echo "<script>alert('Please login to add property')</script>";
        }
    }



}
 ?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Real Estate html5 template">
    <link href="assets/images/favicon/favicon.png" rel="icon">

    <!-- Fonts
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Stylesheets
    ============================================= -->
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>Single Product</title>
</head>

<body>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
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
                                    <h1>Single Property</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Single Property</li>
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

        <!-- property single gallery
============================================= -->
        <section id="property-single-gallery" class="property-single-gallery">
            <div class="container">
                <div class="row">
                    <?php 
                        if (!empty($listing_details)) {
                            foreach ($listing_details as $listing) {
                                extract($listing); 
                                $rand = rand(1000, 2000); ?>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="property-single-gallery-info">
                            <div class="property--info clearfix">
                                <div class="pull-left">
                                    <h5 class="property--title"><?php echo "$rand $location Town"; ?></h5>
                                    <p class="property--location"><i class="fa fa-map-marker"></i><?php echo "$location Town PA $rand"; ?></p>
                                </div>
                                <div class="pull-right">
                                    <span class="property--status">For <?php echo $type; ?></span>
                                    <p class="property--price">$<?php echo $price; ?></p>
                                </div>
                            </div>
                            <!-- .property-info end -->
                            <div class="property--meta clearfix">
                                <div class="pull-left">
                                    <ul class="list-unstyled list-inline mb-0">
                                        <li>
                                            Property ID:<span class="value"> <?php echo "LP/00/$listing_id"; ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pull-right">
                                    <div class="property--meta-share">
                                        <span class="share--title">share</span>
                                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                        <a href="#" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                    <!-- .property-meta-share end -->
                                </div>
                            </div>
                            <!-- .property-info end -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <div class="property-single-carousel inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Gallery</h2>
                                    </div>
                                </div>
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="property-single-carousel-content">
                                        <div class="carousel carousel-thumbs slider-navs" data-slide="1" data-slide-res="1" data-autoplay="true" data-thumbs="true" data-nav="true" data-dots="false" data-space="30" data-loop="true" data-speed="800" data-slider-id="1">
                                            <img src="prop_uploads/thumb_01.jpg" alt="Property Image">
                                            <img src="prop_uploads/thumb_01.jpg" alt="Property Image">
                                            <img src="prop_uploads/thumb_01.jpg" alt="Property Image">
                                            <img src="prop_uploads/thumb_01.jpg" alt="Property Image">
                                            <img src="prop_uploads/thumb_01.jpg" alt="Property Image">
                                        </div>
                                        <!-- .carousel end -->
                                        <div class="owl-thumbs thumbs-bg" data-slider-id="1">
                                            <button class="owl-thumb-item">
								<img src="assets/images/properties/slider/thumbs/1.jpg" alt="Property Image thumb">
							</button>
                                            <button class="owl-thumb-item">
						   		<img src="assets/images/properties/slider/thumbs/2.jpg" alt="Property Image thumb">
						   </button>
                                            <button class="owl-thumb-item">
								<img src="assets/images/properties/slider/thumbs/3.jpg" alt="Property Image thumb">
							</button>
                                            <button class="owl-thumb-item">
								<img src="assets/images/properties/slider/thumbs/4.jpg" alt="Property Image thumb">
							</button>
                                            <button class="owl-thumb-item">
								<img src="assets/images/properties/slider/thumbs/5.jpg" alt="Property Image thumb">
							</button>
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->
                                </div>
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-desc end -->
                        <div class="property-single-desc inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Description</h2>
                                    </div>
                                </div>
                                <!-- feature-panel #1 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/1.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Area:</h5>
                                            <p>1270 sq ft</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <!-- feature-panel #2 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/2.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Beds:</h5>
                                            <p>4 Bedrooms</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <!-- feature-panel #3 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/3.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Baths:</h5>
                                            <p>2 Bathrooms</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <!-- feature-panel #4 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/4.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Rooms:</h5>
                                            <p>6 Rooms</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <!-- feature-panel #5 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/5.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Floors:</h5>
                                            <p>3 Floors</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <!-- feature-panel #6 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/6.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Garage:</h5>
                                            <p>2 Garages</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-desc end -->


                        <div class="property-single-features inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Features</h2>
                                    </div>
                                </div>
                                <!-- feature-item #1 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Center Cooling</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #2 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Balcony</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #3 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Pet Friendly</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #4 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Fire Alarm</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #5 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Modern Kitchen</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #6 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Storage</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #7 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Heating</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #8 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Pool</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #9 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Laundry</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #10 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Gym</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #11 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Elevator</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                                <!-- feature-item #12 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Dish Washer</p>
                                    </div>
                                </div>
                                <!-- feature-item end -->
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-features end -->

                        <div class="property-single-location inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Location</h2>
                                    </div>
                                </div>
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <ul class="list-unstyled mb-20">
                                        <li><span>Address:</span><?php echo "$rand $location Town"; ?></li>
                                        <li><span>City:</span><?php echo $location; ?></li>
                                        <li><span>State:</span><?php echo $location; ?></li>
                                        <li><span>Zip/Postal code:</span><?php echo rand(3000, 2000); ?></li>
                                    </ul>
                                </div>
                                <!-- .col-md-12 end -->

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <small>Google Map</small>
                                    <div id="googleMap" style="width:100%;height:380px;"></div>
                                </div>
                                <!-- .col-md-12 end -->
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-location end -->

                        <div class="property-single-video inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Video</h2>
                                    </div>
                                </div>
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="video--content text-center">
                                        <div class="bg-section">
                                            <img src="assets/images/video/1.jpg" alt="Background" />
                                        </div>
                                        <div class="video--button">
                                            <div class="video-overlay">
                                                <div class="pos-vertical-center">
                                                    <a class="popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                                            <i class="fa fa-youtube-play"></i>  
                                        </a>
                                                </div>
                                            </div>
                                            <!-- .video-player end -->
                                        </div>
                                    </div>
                                    <!-- .video-content end -->
                                </div>
                                <!-- .col-md-12 end -->
                            </div>
                            <!-- .row end -->
                        </div>
                    <?php } } ?>
                        <!-- .property-single-video end -->
                    </div>
                    <!-- .col-md-8 -->
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <!-- widget property agent
=============================-->
                        <?php 
                            if (!empty($agents)) {
                                foreach ($agents as $agent) {
                                    extract($agent); ?>
                        <div class="widget widget-property-agent">
                            <div class="widget--title">
                                <h5>About Agent</h5>
                            </div>
                            <div class="widget--content">
                                <a href="#">
                                    <div class="agent--img">
                                        <img src="prop_uploads/thumb_09.jpg" alt="agent" class="img-responsive">
                                    </div>
                                    <div class="agent--info">
                                        <h5 class="agent--title"><?php echo "$firstname $lastname"; ?></h5>
                                    </div>
                                </a>
                                <!-- .agent-profile-details end -->
                                <div class="agent--contact">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-phone"></i><?php echo $tel; ?></li>
                                        <li><i class="fa fa-envelope-o"></i><?php echo $email; ?></li>
                                        <li class="text-lowercase"><i class="fa fa-link"></i><?php echo "$firstname$lastname.com"; ?></li>
                                    </ul>
                                </div>
                                <!-- .agent-contact end -->
                                <div class="agent--social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                                <!-- .agent-social-links -->
                            </div>
                        </div>
                    <?php } } ?>
                        <!-- . widget property agent end -->

                        <!-- widget request
=============================-->
                        <div class="widget widget-request">
                            <div class="widget--title">
                                <h5>Request a Showing</h5>
                            </div>
                            <div class="widget--content">
                                <form class="mb-0" action="property-single-gallery.php?l_id=<?php echo $_GET['l_id']; ?>" method="post">
                                    <div class="form-group">
                                        <label for="contact-name">Your Name*</label>
                                        <input type="text" class="form-control" name="name" id="contact-name" required>
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="contact-email">Email Address*</label>
                                        <input type="email" class="form-control" name="email" id="contact-email" required>
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="contact-phone">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" id="contact-phone" placeholder="(optional)">
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="message">Message*</label>
                                        <textarea class="form-control" name="message" id="message" rows="2" placeholder="(optional)"></textarea>
                                    </div>
                                    <!-- .form-group end -->
                                    <input type="submit" value="Send Request" name="submit" class="btn btn--primary btn--block">
                                </form>
                            </div>
                        </div>
                        <!-- . widget request end -->

                        <!-- widget featured property
=============================-->
                        <div class="widget widget-featured-property">
                            <div class="widget--title">
                                <h5>Featured Properties</h5>
                            </div>
                            <div class="widget--content">
                                <div class="carousel carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                                    <!-- .property-item #1 -->
                                    <?php 
                                        if (!empty($allprops)) {
                                            foreach ($allprops as $props) {
                                                extract($props); ?>
                                    <div class="property-item">
                                        <div class="property--img">
                                            <img src="prop_uploads/thumb_01.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">For <?php echo $type; ?></span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title">House in <?php echo $location; ?></h5>
                                                <p class="property--location"><?php echo $location; ?></p>
                                                <p class="property--price">$<?php echo $price; ?><span class="time">month</span></p>
                                            </div>
                                            <!-- .property-info end -->
                                        </div>
                                    </div>
                                <?php } } ?>
                                    <!-- .property item end -->
                                </div>
                                <!-- .carousel end -->
                            </div>
                        </div>
                        <!-- . widget featured property end -->

                        <!-- widget mortgage calculator
=============================-->
                        <div class="widget widget-mortgage-calculator">
                            <div class="widget--title">
                                <h5>Mortage Calculator</h5>
                            </div>
                            <div class="widget--content">
                                <form class="mb-0">
                                    <div class="form-group">
                                        <label for="sale-price">Sale Price</label>
                                        <input type="text" class="form-control" name="sale-price" id="sale-price" placeholder="$">
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="down-payment">Down Payment</label>
                                        <input type="text" class="form-control" name="down-payment" id="down-payment" placeholder="$">
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="term">Term</label>
                                        <input type="text" class="form-control" name="term" id="term" placeholder="years">
                                    </div>
                                    <!-- .form-group end -->
                                    <div class="form-group">
                                        <label for="interest-rate">Interest Rate</label>
                                        <input type="text" class="form-control" name="interest-rate" id="interest-rate" placeholder="%">
                                    </div>
                                    <!-- .form-group end -->
                                    <input type="submit" value="Calculate" name="submit" class="btn btn--primary btn--block">
                                </form>
                            </div>
                        </div>
                        <!-- . widget mortgage calculator end -->
                    </div>
                    <!-- .col-md-4 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #property-single end -->

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
    <script src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script>
        $('#googleMap').gMap({
            address: "121 King St,Melbourne, Australia",
            zoom: 12,
            maptype: 'ROADMAP',
            markers: [{
                address: "Melbourne, Australia",
                maptype: 'ROADMAP',
                icon: {
                    image: "assets/images/gmap/marker1.png",
                    iconsize: [52, 75],
                    iconanchor: [52, 75]
                }
            }]
        });

    </script>
    <script src="assets/js/map-custom.js"></script>
</body>

</html>