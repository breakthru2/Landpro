<?php 
require_once 'inc/config.php';
    if (!isset($_SESSION['agent'])) {
        redirect("index.php");
    }

    if (isset($_GET['id'])) {
        $agent = $_GET['id'];

        $profile = profile($agent);
        if ($profile) {
            extract($profile);
        }
    }

    $result = viewProperties($agent);
    if ($result) {
        $properties = $result;
    }
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $firstname; ?> Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

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
            .mystyle2{
                box-shadow: 1px 1px 1px lightgray;
                transition: all 0.7s ease-in-out;
            }
            .mystyle2:hover{
                box-shadow: 4px 4px 4px gray;
            }
        </style>

    </head>

    <body>
        <!-- Header File -->
        <?php require_once 'inc/page-header.php'; ?>
        <!-- End of Header File -->
        <div class="wrapper">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div class="row">
                    <div class="col-12">
                        <div class="card widget-flat mystyle">
                            <div class="card-body p-0">
                                <div class="p-3 pb-0">
                                    <div class="float-right">
                                        <i class="fe-layers text-primary widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mt-0">Total Property</h5>
                                    <h3 class="mt-2">3,543</h3>
                                </div>
                                <div id="sparkline1"></div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col--> 
            </div> <!-- end container --><br>


            <div class="row" id="allprop">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h1 class="header-title text-dark">My Properties</h1><br>

                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Location</th>
                                            <th>Video Link</th>
                                        </tr>
                                    </thead>

                                    <?php 
                                        if (isset($properties)) {
                                            foreach ($properties as $property) {
                                                extract($property); ?>
                                    <tbody>
                                        <tr>
                                            <td>Title</td>
                                            <td><img src="prop_uploads/thumb_01.jpg" class="image-responsive rounded mystyle2" style="width: 100px;"></td>
                                            <td><?php echo $type; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td><?php echo $location; ?></td>
                                            <td><?php echo $video_link; ?></td>
                                        </tr>
                                    </tbody>

                                    <?php } } ?>
                                </table>
                                
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        Agent Dashboard &copy; 2019 - Landprop.com
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->


<!-- App js -->
        <script src="js/vendor.min.js"></script>
        <script src="js/app.min.js"></script>

        <!-- third party js -->
        <script src="js/vendor/jquery.dataTables.js"></script>
        <script src="js/vendor/dataTables.bootstrap4.js"></script>
        <script src="js/vendor/dataTables.responsive.min.js"></script>
        <script src="js/vendor/responsive.bootstrap4.min.js"></script>
        <script src="js/vendor/dataTables.buttons.min.js"></script>
        <script src="js/vendor/buttons.bootstrap4.min.js"></script>
        <script src="js/vendor/buttons.html5.min.js"></script>
        <script src="js/vendor/buttons.flash.min.js"></script>
        <script src="js/vendor/buttons.print.min.js"></script>
        <script src="js/vendor/dataTables.keyTable.min.js"></script>
        <script src="js/vendor/dataTables.select.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="js/pages/datatables.init.js"></script>
        <!-- end demo js-->
</div>

    </body>
</html>
