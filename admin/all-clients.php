<?php 
    require_once 'inc/config.php';

    $result = fetchData('clients');
    if ($result) {
        $clients = $result;
    }
 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>All Clients</title>
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
                                                        <th>Client ID</th>
                                                        <th>Basic Info</th>
                                                        <th>Telephone</th>
                                                        <th>Address</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <?php 
                                                    if (!empty($clients)) {
                                                        foreach ($clients as $client) {
                                                            extract($client); ?>
                                                <tbody>
                                                    <tr>
                                                        <td><b>LPCID/00/<?php echo $client_id; ?></b></td>
                                                        <td>
                                                            <span class="mystyle text-light mdi mdi-account-check bg-dark rounded p-1 font-18 float-left mr-2"></span>
                                                            <p class="mb-0 font-weight-bold"><a href="javascript: void(0);"><?php echo $firstname . " " . $lastname; ?></a></p>
                                                            <span class="font-13"><?php echo $email; ?></span>
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
                                                                    <a class="dropdown-item" href="delete.php?client_id=<?php echo $client_id; ?>"><i class="mdi mdi-delete mr-1 text-muted"></i>Delete Client</a>
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
                                             <?php 
                                                if (isset($_GET['success'])) {
                                                    $success = $_GET['success'];
                                                    echo "<script>alert('$success')</script>";
                                                }
                                             ?>
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