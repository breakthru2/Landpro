<?php 
require_once 'inc/config.php';
    if (isset($_POST['submit'])) {
        $result = register($_POST);

        if ($result === true) {
            echo "<script>alert('Registration Successful')</script>";
            redirect("index.php");
        } else {
            $errors = $result;
            echo "<script>alert('Registration Failed')</script>";
        }
    }
 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Agent Register</title>
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
                                        <span><span><h2>LandProp</h2></span></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Don't have an account? Create free account</p>
                                </div>

                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <div class="form-group mb-3">
                                        <label for="fullname">Firstname Name</label>
                                        <input class="form-control" name="firstname" type="text" id="fullname" placeholder="Enter your firstname" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="lastname">Last Name</label>
                                        <input class="form-control" name="lastname" type="text" id="lastname" placeholder="Enter your lastname" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" name="email" type="email" id="emailaddress" required placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="password" type="password" required id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="tel">Telephine</label>
                                        <input class="form-control" name="tel" type="tel" id="tel" placeholder="Enter your tel" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control" id="address" placeholder="Enter your address" required></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                            <label class="custom-control-label" for="checkbox-signup">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" name="submit" type="submit"> Sign Up </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Already have account? <a href="index.php" class="text-dark ml-1"><b>Log In</b></a></p>
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