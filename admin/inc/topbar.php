<div class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="dropdown notification-list">
                                <a class="nav-link text-light dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                   <marquee><b>Welcome Admin</b></marquee>
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="dripicons-user rounded-circle bg-dark p-1 font-18"></span>
                                    <small class="pro-user-name ml-1">
                                        <?php echo $firstname . " " . $lastname; ?>
                                    </small>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome <?php echo $firstname; ?>!</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="calender.php?id=<?php echo $admin_id; ?>" class="dropdown-item notify-item">
                                        <i class="fe-user"></i>
                                        <span>My Calender</span>
                                    </a>

                                    <!-- item-->
                                    <a href="lockscreen.php?id=<?php echo $admin_id; ?>" class="dropdown-item notify-item">
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
                        <button class="button-menu-mobile open-left disable-btn">
                            <i class="fe-menu"></i>
                        </button>
                        <div class="app-search">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>