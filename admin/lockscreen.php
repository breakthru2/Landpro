<?php 
    require_once 'inc/config.php';

    // if (isset($_POST['submit'])) {
    //     $result = lockscreen($_POST);

    //     if ($result === true) {
    //         redirect("dashboard.php");
    //     }
    // }
    if (isset($_GET['id'])) {
        $admin = $_GET['id'];

        $profile = profile($admin);
        if (isset($profile)) {
            extract($profile);
        }
    }

    if (isset($_POST['submit'])) {
        $result = lockscreen($_POST);

        if ($result === true) {
            redirect("dashboard.php?id=$admin_id");
        } else {
            echo "<script>alert('Login not successful')</script>";
        }
    }
 ?> 


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin ScreenLock</title>
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

    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><h2>LandProp</h2></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your password to access the admin dashboard</p>
                                </div>

                                <div class="text-center w-75 m-auto">
                                    <span class="mdi mdi-account-heart mr-2" style="font-size: 50px;"></span>
                                    <h4 class="text-dark-50 text-center mt-2 font-weight-bold"><?php echo "$firstname $lastname"; ?> </h4>
                                    <h6><?php echo $email; ?></h6>
                                </div>

                                <form action="lockscreen.php?id=<?php echo $admin_id; ?>" method="post" class="mt-3">
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" name="submit" type="submit">Log In</button>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Not you? return <a href="index.php" class="text-dark ml-1"><b>Sign In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <!-- App js -->
        <script src="js/vendor.min.js"></script>
        <script src="js/app.min.js"></script>
        
    </body>
</html>