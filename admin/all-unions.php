<?php 
    require_once 'inc/config.php';

    $result = fetchData('unions');
    if ($result) {
        $unions = $result;
    }
 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>All Unions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/app.min.css" rel="stylesheet" type="text/css" />

        <style>
            .mystyle{
                transition: all 0.7s ease-in-out;
            }
            .mystyle:hover{
                color: lightseagreen;
                box-shadow: 3px 3px 3px gray;
            }
        </style>

    </head>
<body>
    <div id="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!-- LOGO -->
                    <a href="index.html" class="logo text-center mb-4">
                        <span class="logo-lg">
                            <h2>LandProp</h2>
                        </span>
                        <span class="logo-sm">
                            <h3>LandProp</h3>
                        </span>
                    </a>

                    <!--- Sidemenu -->
                    <?php require_once 'inc/sidemenu.php'; ?>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
            <div class="content-page">
                <div class="content">
    <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Recent Agents</h4>

                                        <div class="table-responsive mt-3">
                                            <table class="table table-hover table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Union ID</th>
                                                        <th class="text-center">Verification Code</th>
                                                    </tr>
                                                </thead>

                                                <?php 
                                                    if (!empty($unions)) {
                                                        foreach ($unions as $union) {
                                                            extract($union); ?>
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td>
                                                            <i>LPUID/00/<?php echo $union_id; ?></i>
                                                        </td>
            
                                                        <td>
                                                           <?php echo $verification_code; ?>
                                                        </td>
                                                        
                                                    </tr>
                                                </tbody>
                                            <?php } }  ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
    </div>












     <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                Simulor Admin &copy; 2018 - Coderthemes.com
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="#">About Us</a>
                                    <a href="#">Help</a>
                                    <a href="#">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- App js -->
        <script src="js/vendor.min.js"></script>
        <script src="js/app.min.js"></script>

        <!-- Plugins js -->
        <script src="js/vendor/Chart.bundle.js"></script>
        <script src="js/vendor/jquery.sparkline.min.js"></script>
        <script src="js/vendor/jquery.knob.min.js"></script>

        <script src="js/pages/dashboard.init.js"></script>

    </body>
</html>