<?php 
    require_once 'inc/config.php';

    if (isset($_POST['submit'])) {
        $result = add_property($_POST);

        if ($result === true) {
            echo "<script>alert('Added Successful')</script>";
        } else {
            $errors = $result;
            echo "<script>alert('Failed')</script>";
        }
    }

    if (isset($_GET['id'])) {
        $agent = $_GET['id'];
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
    <link href="../assets/images/favicon/favicon.png" rel="icon">

    <!-- Fonts
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Stylesheets
    ============================================= -->
    <link href="../assets/css/external.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>Add Property</title>
</head>

<body>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">

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
                                    <h1>Add Property</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="dashboard.php?id=<?php echo $agent; ?>">Dashboard</a></li>
                                    <li class="active">Add Property</li>
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

        <!-- #Add Property
============================================= -->
        <section id="add-property" class="add-property">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <form class="mb-0" action="add-property.php?id=<?php echo $agent; ?>" method="post">
                            <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Property Description</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="property-title">Property Title*</label>
                                            <input type="text" class="form-control" name="title" id="property-title" required>
                                        </div>
                                    </div> -->
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="property-description">Property Description*</label>
                                            <textarea class="form-control" name="description" id="property-description" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="select-type">Type</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                                <select id="select-type" name="type">
                                            <option>Rent</option>
                                            <option>Sale</option>
                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" name="location" id="location">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Sale-Rent-Price">Sale or Rent Price*</label>
                                            <input type="text" class="form-control" name="price" id="Sale-Rent-Price" required>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Video-URL">Video URL</label>
                                            <input type="text" class="form-control" name="video" id="Video-URL" placeholder="Youtube, Vimeo, Dailymotion, etc..">
                                        </div>
                                    </div>

                                     <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>
                                    </div>

                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="hide" id="hide" value="<?php echo $agent; ?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                                   <!-- <h4>Google Map</h4> -->
                                    <!-- .col-md-4 end -->
                                    <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div id="googleMap" style="width:100%;height:380px;"></div>
                                    </div> -->
                                    <!-- .col-md-12 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->
                            <input type="submit" value="Add Property" name="submit" class="btn btn--primary">
                        </form>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
        </section>
        <!-- #social-profile  end -->

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
    <script src="../assets/js/jquery-2.2.4.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/dropzone.js"></script>
    <script src="../assets/js/functions.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="../assets/js/plugins/jquery.gmap.min.js"></script>
    <script src="js/vendor/sweetalert2.min.js"></script>
    <script src="js/pages/sweet-alerts.init.js"></script>
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
    <script src="../assets/js/map-custom.js"></script>
</body>

</html>
