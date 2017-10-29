    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Another core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #040404; font-family: 'Exo'">
        <!--Container Start-->
        <div class="container">
            <a href="index.php"><img href="#" src="https://theinstillery.com/wp-content/uploads/2015/11/logo.png" alt="Smiley face" height="45" width="120"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <!--Collapse In Able-->
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link nav-item"  data-toggle="dropdown" href="#">Tournament</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="tournament.php">Tournament</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#invitation" href="#">Invitation</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link nav-item" data-toggle="dropdown"  href="#">Leaderboards</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="nbaleaderboard.php">NBA</a>
                            <a class="dropdown-item" href="fifaleaderboard.php">FIFA</a>
                            <a class="dropdown-item" href="poolleaderboard.php">POOL</a>
                        </div>
                    </li>

                    <!--Login-->
                    <li class="dropdown nav-item" id="textlog">
                        <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown" >Log In</a>
                         <!--Login Content-->
                        <ul class="dropdown-menu dropdown-l" role="menu">
                            <!--Form Content-->
                            <div class="col-lg-12">
                                <div class="text-center"><h3><b>Log In</b></h3></div>
                                 <!--Username Input-->
                                <form method="post" role="form" autocomplete="off">
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Email" autocomplete="off">
                                    </div>
                                     <!--Password Input-->
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" autocomplete="off">
                                    </div>
                                    <!--Login Submit Button-->
                                    <div class="form-group">
                                        <div class="col-xs-5 pull-center">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Log In">
                                        </div>
                                    </div>
                                    <!--Not Registered Tab-->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="RegisterForm.php" tabindex="5" class="forgot-password">Not Registered?</a>
                                                    <a href="#" tabindex="5" class="forgot-password"  data-toggle="modal" data-target="#myModal">Forgot Account?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!--Form Content End-->
                        </ul>
                        <!--Login Content End-->
                    </li>
                    <!--EndLogin-->

                    <!--Logout-->
                    <li class="nav-item dropdown" id="beforeS">
                        <a class="nav-link nav-item" data-toggle="dropdown" href="#" id="show"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="userProfile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php">Log Out</a>
                        </div>
                    </li>
                    <!--End Logout-->
                </ul>
            </div>
            <!--Collapse End-->
        </div>
        <!--Container End-->
    </nav>
    <!--End Navbar-->

    <!-- Modal Forgot Passwod-->
    <div id="myModal" class="modal fade" role="dialog" style="font-family: 'Exo'">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header" style="background-color: #dd9933; font-family: 'Exo'">
                    <h4 class="modal-title" style="color: black">Password Recovery</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <!--Recovery Details-->
                    <form method="POST" id="recoveryform" style="color:black">
                        <div class="form-group">
                            <label for="email" >Email address:</label>
                            <input type="email" class="form-control" id="Email" name="Email">
                            <br>
                            <input type="submit" name="ps" id="ps" class="btn">
                        </div>
                        <div id="message" style="display:none"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Email Invitation-->
    <div id="invitation" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header" style="background-color: #dd9933">
                    <h4 class="modal-title" style="color: black">Tournament Announcement</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <!--Email Details-->
                    <form method="POST" id="invite" style="color:black">
                        <div class="form-group">
                            <label for="comment">Message:</label>
                            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                            <br>
                            <input type="submit" name="ps" id="ps" class="btn">
                        </div>
                        <div id="invitemsg" style="display:none"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Incorrect Password-->
    <div id="incorrect" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #dd9933">
                    <h4 class="modal-title" style="color: black">Access Denied</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <!--Message Details-->
                    <div class="form-group">
                        <label style="color: black">Invalid username or password</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--Own Style JavaScript -->
    <script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="js/login.js"></script>
    <script src="js/use.js"></script>
    <script src="js/invite.js"></script>
    <script src="js/recovery.js"></script>
