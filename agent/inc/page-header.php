<!-- Navigation Bar-->
        <header id="topnav">
            <nav class="navbar-custom">

                <div class="container-fluid">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="dripicons-user rounded-circle bg-dark p-1 font-18"></span>
                                <small class="pro-user-name ml-1">
                                    <?php echo "$firstname $lastname"; ?>
                                </small>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome <?php echo $firstname; ?>!</h6>
                                </div>

                                <!-- item-->
                                <a href="calender.php?id=<?php echo $agent_id; ?>" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>My Calender</span>
                                </a>

                                <!-- item-->
                                <a href="lockscreen.php?id=<?php echo $agent_id; ?>" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="logout.php" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <a href="index.html" class="logo">
                                <span class="logo-lg">
                                    <img src="assets/images/logo.png" alt="" height="18">
                                </span>
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="28">
                                </span>
                            </a>
                        </li>
                        <li class="app-search">
                            <form>
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit" class="sr-only"></button>
                            </form>
                        </li>
                    </ul>
                </div>

            </nav>
            <!-- end topbar-main -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="dashboard.php?id=<?php echo $agent_id; ?>">
                                    <i class="fe-home"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="add-property.php?id=<?php echo $agent_id; ?>">
                                    <i class="fe-layers"></i>Add Property</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#allprop"> <i class="fe-bookmark"></i>View All Property</a>
                            </li>

                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->