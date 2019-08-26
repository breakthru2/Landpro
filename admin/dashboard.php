<?php 
    require_once 'inc/config.php';
    if (!isset($_SESSION['admin'])) {
        redirect("index.php");
    }

    if (isset($_GET['id'])) {
        $admin = $_GET['id'];

        $profile = profile($admin);
        if ($profile) {
            extract($profile);
        }
    }
 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $firstname ?>'s Admin Dashboard</title>
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
                box-shadow: 1px 1px 1px lightgray;
                transition: all 0.7s ease-in-out;
            }
            .mystyle:hover{
                color: lightseagreen;
                box-shadow: 7px 7px 7px lightgray;
            }
        </style>

    </head>

    <body>

        <!-- Begin page -->
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

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Topbar Start -->
                    <?php require_once 'inc/topbar.php'; ?>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-xl-3 col-lg-6">
                                <div class="card widget-flat mystyle">
                                    <div class="card-body p-0">
                                        <div class="p-3 pb-0">
                                            <div class="float-right">
                                                <i class="mdi mdi-home-variant text-primary widget-icon"></i>
                                            </div>
                                            <?php 
                                                $result = getTotal('listings');
                                             ?>
                                            <h5 class="text-muted font-weight-normal mt-0">Total Properties</h5>
                                            <h3 class="mt-2"><?php echo $result; ?></h3>
                                        </div>
                                        <div id="sparkline1"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-xl-3 col-lg-6">
                                <div class="card widget-flat mystyle">
                                    <div class="card-body p-0">
                                        <div class="p-3 pb-0">
                                            <div class="float-right">
                                                <i class="mdi mdi-account-multiple-plus text-danger widget-icon"></i>
                                            </div>
                                            <?php 
                                                $result = getTotal('clients');
                                             ?>
                                            <h5 class="text-muted font-weight-normal mt-0">Total Clients</h5>
                                            <h3 class="mt-2"><?php echo $result; ?></h3>
                                        </div>
                                        <div id="sparkline2"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-xl-3 col-lg-6">
                                <div class="card widget-flat mystyle">
                                    <div class="card-body p-0">
                                        <div class="p-3 pb-0">
                                            <div class="float-right">
                                                <i class="mdi mdi-account-group text-primary widget-icon"></i>
                                            </div>
                                            <?php 
                                                $result = getTotal('unions');
                                             ?>
                                            <h5 class="text-muted font-weight-normal mt-0">Total Unions</h5>
                                            <h3 class="mt-2"><?php echo $result; ?></h3>
                                        </div>
                                        <div id="sparkline3"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-xl-3 col-lg-6">
                                <div class="card widget-flat mystyle">
                                    <div class="card-body p-0">
                                        <div class="p-3 pb-0">
                                            <div class="float-right">
                                                <i class="mdi mdi-account-multiple text-danger widget-icon"></i>
                                            </div>
                                            <?php 
                                                $result = getTotal('agents');
                                             ?>
                                            <h5 class="text-muted font-weight-normal mt-0">Total Agents</h5>
                                            <h3 class="mt-2"><?php echo $result; ?></h3>
                                        </div>
                                        <div id="sparkline4"></div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Recent Agents</h4>

                                        <div class="table-responsive mt-3">
                                            <table class="table table-hover table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>User ID</th>
                                                        <th>Basic Info</th>
                                                        <th>Phone</th>
                                                        <th>Location</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                
                                                <?php 
                                                    $result = fetchData('agents');
                                                    if ($result) {
                                                        $agents = $result;
                                                        foreach ($agents as $agent) {
                                                            extract($agent); ?>
                                                <tbody>
                                                    <tr>
                                                        <td><b>lp/0/<?php echo $agent_id; ?></b></td>
                                                        <td>
                                                            <img src="assets/images/users/avatar-2.jpg" alt="contact-img" height="36" title="contact-img" class="rounded-circle float-left mr-2" />
                                                            <p class="mb-0 font-weight-bold"><a href="javascript: void(0);"><?php echo "$firstname $lastname"; ?></a></p>
                                                            <span class="font-13"><?php echo $email ?></span>
                                                        </td>
            
                                                        <td>
                                                            <?php echo $tel; ?>
                                                        </td>
            
                                                        <td>
                                                            <?php echo $address; ?>
                                                        </td>
            
                                                        <td>
                                                            <div class="btn-group dropdown">
                                                                <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="delete.php?a_id=<?php echo $agent_id; ?>&adm_id=<?php echo $profile['admin_id']; ?>"><i class="mdi mdi-delete mr-1 text-muted"></i>Remove</a>
                                                                    <a class="dropdown-item" href="#"><i class="mdi mdi-email mr-1 text-muted"></i>Send Email</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php } }  ?>
                                            </table>
                                            <?php 
                                                if (isset($_GET['err_msg'])) {
                                                    $msg = $_GET['err_msg'];
                                                    echo "<script>alert('$msg')</script>";
                                                }
                                             ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->

                </div> <!-- content -->

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