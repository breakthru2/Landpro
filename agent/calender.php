<?php 
    require_once 'inc/config.php';

    if (isset($_GET['id'])) {
        $agent = $_GET['id'];

        $profile = profile($agent);
        if (isset($profile)) {
            extract($profile);
        }
    }
 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo "$firstname Calender" ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Plugin css -->
        <link href="css/vendor/fullcalendar.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <?php require_once 'inc/page-header.php'; ?>
        <div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php?id=<?php echo $agent_id; ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Calendar</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Calendar</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg font-16 btn-primary btn-block  ">
                                            <i class="mdi mdi-plus-circle-outline"></i> Create New Event
                                        </a>
                                        <div id="external-events" class="m-t-20">
                                            <br>
                                            <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                        </div>

                                        <!-- checkbox -->
                                        <div class="custom-control custom-checkbox mt-3">
                                            <input type="checkbox" class="custom-control-input" id="drop-remove">
                                            <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                        </div>

                                    </div> <!-- end col-->

                                    <div class="col-lg-9">
                                        <div id="calendar"></div>
                                    </div> <!-- end col -->

                                </div>  <!-- end row -->
                            </div> <!-- end card body-->
                        </div> <!-- end card -->

                        <!-- Add New Event MODAL -->
                        <div class="modal fade" id="event-modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header pr-4 pl-4 border-bottom-0 d-block">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Add New Event</h4>
                                    </div>
                                    <div class="modal-body pt-3 pr-4 pl-4">
                                    </div>
                                    <div class="text-right pb-4 pr-4">
                                        <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success save-event  ">Create event</button>
                                        <button type="button" class="btn btn-danger delete-event  " data-dismiss="modal">Delete</button>
                                    </div>
                                </div> <!-- end modal-content-->
                            </div> <!-- end modal dialog-->
                        </div>
                        <!-- end modal-->

                        <!-- Modal Add Category -->
                        <div class="modal fade" id="add-category" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0 d-block">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Add a category</h4>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form>
                                            <div class="form-group">
                                                <label class="control-label">Category Name</label>
                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Choose Category Color</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="primary">Primary</option>
                                                    <option value="success">Success</option>
                                                    <option value="danger">Danger</option>
                                                    <option value="info">Info</option>
                                                    <option value="warning">Warning</option>
                                                    <option value="dark">Dark</option>
                                                </select>
                                            </div>

                                        </form>

                                        <div class="text-right">
                                            <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary ml-1   save-category" data-dismiss="modal">Save</button>
                                        </div>

                                    </div> <!-- end modal-body-->
                                </div> <!-- end modal-content-->
                            </div> <!-- end modal dialog-->
                        </div>
                        <!-- end modal-->
                    </div>
                    <!-- end col-12 -->
                </div> <!-- end row -->

                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


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


        <!-- App js -->
        <script src="js/vendor.min.js"></script>
        <script src="js/app.min.js"></script>

        <!-- plugin js -->
        <script src="js/vendor/jquery-ui.min.js"></script>
        <script src="js/vendor/fullcalendar.min.js"></script>

        <!-- demo init -->
        <script src="js/pages/calendar.init.js"></script>

    </body>
</html>
