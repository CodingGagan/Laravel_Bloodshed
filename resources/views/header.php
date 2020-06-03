    <!-- Jumbotron -->
    <div class="p-0 m-0">

        <!-- Navbar -->
        <div class="header_img_area d-none d-lg-block position-fixed w-100" style="z-index: 10000;">
            <!-- upper navbar icon -->

            <div class="primary-navbar" id="primary-navbar">
                <div class="header-icon">
                    <!-- Social Icon -->
                    <div class="header_social d-inline-block">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>

                    <!-- Login and register place -->
                    <div class="access navbar p-0 pr-5 navbar-expand d-inline-block">
                        <ul class="navbar-nav">
                            <!-- Login -->
                            <li class="nav-item">


                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo "<a href='#!' class='nav-link'><span class=''>" . $_SESSION['username'] . "</span></a>";
                                } else {
                                ?>
                                    <a href="" data-toggle="modal" id="modal_link" data-target="#login_modal" class="nav-link">
                                        <span class="login_icon p-0 pr-3">
                                            <img src="../slider_img/login-icon.png" alt="">
                                        </span>
                                        <span class='login_button'>Login</span>
                                    </a>
                                <?php }
                                ?>
                            </li>

                            <li class="nav-item">
                                <?php
                                if (isset($_SESSION['username'])) { ?>

                                    <a href='../logout.php' class="nav-link"><span class=''>Logout</span></a>
                                <?php
                                } else { ?>
                                    <a href="" data-toggle="modal" id="modal_link" data-target="#login_modal" class="nav-link">
                                        <span class="reg_icon p-0 pr-3">
                                            <img src="../slider_img/reg-icon.png" alt="">
                                        </span>
                                        <span class='login_button'>Register</span>
                                    </a>
                                <?php
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Upper Navbar Icon's -->
            <!-- This div use for left and right image -->
            <div class="bg-pos"></div>
            <div class="header_outer_area" id="header_outer_area">
                <a id="xs-navbar-brand" href="#" class="navbar-brand nav-brand-xs w-100 d-block position-fixed d-lg-none">
                    <img src="https://www.iglnetwork.com/assets/images/logo.png" class="d-block mx-auto" alt="Brand Image">
                </a>
                <header id="navbar-header" class="main-navbar navbar navbar-expand-lg ">
                    <button id="navbar-toggle" class="navbar-toggler navbar-light" data-target='#navbar-hide' data-toggle="collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" style="top: 54px;" id="navbar-hide">
                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                        <ul class="navbar-nav first w-100 m-0" id="left-navbar">
                            <div class="left-navbar mx-auto navbar-nav">
                                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                                <li class="nav-item"><a href="game_page.php" class="nav-link">Games</a></li>
                                <li class="nav-item"><a href="tournament.php" class="nav-link">Events</a></li>
                            </div>
                        </ul>
                        <!-- Navbar Brand  -->
                        <div class="nav-brand-div">
                            <a href="index.php" class="brnd-pos navbar-brand d-none position-absolute d-lg-block mx-auto">
                                <img src="https://www.iglnetwork.com/assets/images/logo.png" alt="">
                            </a>
                        </div>
                        <!-- Navbar Right Content when large screen appear -->

                        <ul class="navbar-nav first w-100 m-0" id="right-navbar">
                            <div class="right-navbar mx-auto navbar-nav">
                                <li class="nav-item"><a href="leaderboard.php" class="nav-link">Leaderboard</a></li>
                                <li class="nav-item"><a href="about_us.php" class="nav-link">About Us</a></li>
                                <li class="nav-item"><a href="contactUs.php" class="nav-link">Contact</a></li>
                                <?php if (isset($_SESSION['username'])) { ?>
                                    <li class="nav-item dropdown">
                                        <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">Gagandeep
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="../user_module/userprofile.php">My Profile</a>
                                            <a class="dropdown-item" href="../user_module/mymatches.php">My Matches</a>
                                            <a class="dropdown-item" href="../user_module/user_info.php">Edit Profile</a>
                                        </div>
                                    </li>
                                    <li class="nav-item"><a href="../logout.php" class="nav-link">Logout</a></li>

                                <?php } ?>
                                <!-- <li class="nav-item"><a href="#" class="nav-link">Login</a></li> -->
                            </div>
                        </ul>
                    </div>
                </header>
            </div>
        </div>
    </div>

    <!-- Hamburger For Small Screen -->
    <!-- Hamburger menu for small screen -->
    <div class="navigation d-lg-none d-block">
        <!-- navigation checkbox illusion -->
        <input type="checkbox" class="navigation__checkbox" id="navi-toggle">
        <label for="navi-toggle" class="navigation__button">
            <span class="navigation__icon">&nbsp;</span>
        </label>

        <!-- Navigation Background -->
        <div class="navigation__background">&nbsp;</div>
        <!-- Navigation List -->
        <nav class="navigation__nav">

            <ul class="navigation__list">
                <li class="navigation__item"><a href="http://localhost/bloodshed_core/static/index.php" class="navigation__link"><span>01</span>Home</a></li>
                <li class="navigation__item"><a href="http://localhost/bloodshed_core/static/game_page.php" class="navigation__link"><span>02</span>Games</a></li>
                <li class="navigation__item"><a href="http://localhost/bloodshed_core/static/tournament.php" class="navigation__link"><span>03</span>Events</a></li>
                <li class="navigation__item"><a href="http://localhost/bloodshed_core/static/leaderboard.php" class="navigation__link"><span>04</span>Leaderboard</a></li>
                <li class="navigation__item"><a href="http://localhost/bloodshed_core/static/about_us.php" class="navigation__link"><span>05</span>About us</a></li>
                <li class="navigation__item"><a href="http://localhost/bloodshed_core/static/contactUs.php" class="navigation__link"><span>06</span>Contact us</a></li>
                
            </ul>

            <ul class="navs mx-auto text-center mt-5">
                <li class="nav-item d-inline"><a href="#!" class="nav-link navigation__link" data-toggle="modal" id="modal_link" data-target="#login_modal">Login</a></li>
                <li class="nav-item d-inline"><a href="#!" class="nav-link navigation__link" data-toggle="modal" id="modal_link" data-target="#login_modal">Register</a></li>
            </ul>
        </nav>
    </div>

    <!-- user profile bottom menu -->
    <?php if (isset($_SESSION['username'])) { ?>
        <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <nav class="nav user_profile" style="z-index: 11111">
            <a href="#" class="nav__link">
                <i class="material-icons nav__icon">dashboard</i>
                <span class="nav__text">Dashboard</span>
            </a>
            <a href="#" class="nav__link nav__link--active">
                <i class="material-icons nav__icon">person</i>
                <span class="nav__text">Profile</span>
            </a>
            <a href="#" class="nav__link">
                <i class="material-icons nav__icon">devices</i>
                <span class="nav__text">Devices</span>
            </a>
            <a href="#" class="nav__link">
                <i class="material-icons nav__icon">lock</i>
                <span class="nav__text">Privacy</span>
            </a>
        </nav> -->
    <?php } ?>