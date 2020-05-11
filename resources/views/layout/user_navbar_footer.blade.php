<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Gaming Tournament</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <script src="{{asset('Jquery/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <link rel="stylesheet" href="{{asset('Font/fontawesome-free-5.12.0-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('static_css/header.css')}}">
    <link rel="stylesheet" href="{{asset('static_css/foot.css')}}">
    <link rel="stylesheet" href="{{asset('static_css/login_mobile.css')}}">
    <link rel="stylesheet" href="{{asset('static_css/hamburger.css')}}">
</head>

<body>

    @section('navbar')
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
                                            <img src="{{asset('images/login-icon.png')}}" alt="">
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

                                <li class="nav-item"><a href="#" class="nav-link d-lg-none">Login</a></li>
                                <li class="nav-item"><a href="#" class="nav-link d-lg-none">Register</a></li>
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
                <li class="navigation__item"><a href="#" class="navigation__link"><span>01</span>Home</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>02</span>Games</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>03</span>Events</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>04</span>Leaderboard</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>05</span>About us</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>06</span>Contact us</a></li>
            </ul>

            <ul class="navs mx-auto text-center">
                <li class="nav-item d-inline"><a href="#!" class="nav-link navigation__link" data-toggle="modal" id="modal_link" data-target="#login_modal">Login</a></li>
                <li class="nav-item d-inline"><a href="#!" class="nav-link navigation__link" data-toggle="modal" id="modal_link" data-target="#login_modal">Register</a></li>
            </ul>
        </nav>
    </div>

    @show

    @yield('main_content')

    @section('login_signup')



    <div class="modal fade" style="z-index: 111111;" id="login_modal">
        <div class="modal-dialog modal-dialog-centered" style="width: 80% !important; margin: 30px auto;">
            <div class="modal-content mt-5">
                <!-- tabs -->
                <!-- Nav tabs -->
                <div class="modal-c-tabs">
                    <!-- tabs -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="login_tab">
                            <div class="modal-body">

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12 px-0 mx-auto">
                                            <div class="main-container" id="main-container">
                                                <div class="button-box">
                                                    <div id="btn"></div>
                                                    <button type="button" class="toggle-btn" onclick="signIn()">Sign In</button>
                                                    <button type="button" class="toggle-btn" onclick="signUp()">Sign Up</button>
                                                </div>
                                                <div class="form-container signUp-container" id="signUp-container">

                                                    <form action="{{url('register_form')}}" method="POST">
                                                        @csrf()
                                                        <h2>Create Account</h2>
                                                        <div class="social-container">
                                                            <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
                                                            <a href="{{url('/redirect')}}" class="social"><i class="fab fa-google-plus-g"></i></a>
                                                            <a href="" class="social"><i class="fab fa-twitter"></i></a>
                                                        </div>
                                                        <span>or use your email for registration</span>
                                                        <div class="div">
                                                            <i class="fas fa-user-alt"></i><input type="text" name="username" placeholder="Username">
                                                        </div>
                                                        <div class="div">
                                                            <i class="fas fa-user-alt"></i>
                                                            <select name="user_type" id="user_type" class="form-control">
                                                            <option selected="selected" class="bg-dark text-dark text-center pl-2">Select Your Type</option>
                                                            <option value="user" class="bg-dark text-light pl-2">User</option>
                                                            <option value="organizer" class="bg-dark text-light pl-2">Organizer</option>
                                                            </select>
                                                        </div>
                                                        <div class="div">
                                                            <i class="fas fa-envelope"></i><input type="email" name="signup_email" id="" placeholder="Email">
                                                        </div>
                                                        <div class="div">
                                                            <i class="fas fa-lock"></i><input type="password" name="" id="signup_password" placeholder="Password">
                                                        </div>
                                                        <button type="submit" id="registeration">Sign Up</button>
                                                    </form>
                                                </div>
                                                <div class="form-container signIn-container" id="signIn-container">

                                                    <form action="#">
                                                        <h1>Sign In</h1>
                                                        <div class="social-container">
                                                            <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
                                                            <a href="" class="social"><i class="fab fa-google-plus-g"></i></a>
                                                            <a href="" class="social"><i class="fab fa-twitter"></i></a>
                                                        </div>
                                                        <span>or use your account</span>
                                                        <div class="div">
                                                            <i class="fas fa-envelope"></i><input type="email" name="login_email" id="" placeholder="Email">
                                                        </div>
                                                        <div class="div">
                                                            <i class="fas fa-lock"></i><input type="password" name="login_password" id="" placeholder="Password">
                                                        </div>
                                                        <a href="">Forgot your password?</a>
                                                        <button type="button" id="login_button">Sign In</button>
                                                    </form>
                                                </div>
                                                <div class="overlay-container">
                                                    <div class="overlay">
                                                        <div class="overlay-panel overlay-left">
                                                            <h1>Welcome Back!</h1>
                                                            <p>To keep connected with us, please login with your personal info.</p>
                                                            <button class="ghost" id="signIn">Sign In</button>
                                                        </div>
                                                        <div class="overlay-panel overlay-right">
                                                            <h1>Hello, Friend!</h1>
                                                            <p>Enter your personal details and start journey with us.</p>
                                                            <button class="ghost" id="signUp">Sign Up</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('JavaScript/login_mobile.js')}}"></script>

    @show


    @section('footer')

    <!-- Footer -->
    <footer>
        <!-- Icons -->
        <div class="icons text-white">
            <ul class="nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
        <hr>

        <!-- For lg snd up screen -->
        <div class="container-fluid">
            <div class="row p-0 m-0">
                <!-- First Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>OG TOURNAMENT</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Home</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -> Hide on large or wider screen -->
                    <div id="accordion" class="d-lg-none">
                        <div class="card">
                            <div class="card-header">
                                <a href="#OG" data-toggle="collapse" class="card-link d-block">OG TOURNAMENT</a>
                            </div>
                            <div id="OG" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a href="#" class="nav-link text-white pl-5">Home</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link pl-5 text-white">Home</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link pl-5 text-white">Home</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link pl-5 text-white">Home</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>COMMUNITY</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -->
                    <div id="accordion" class="d-lg-none">
                        <div class="card">
                            <div class="card-header">
                                <a href="#community" data-toggle="collapse" class="card-link d-block">COMMUNITY</a>
                            </div>
                            <div id="community" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a href="#" class="nav-link pl-5 text-white">About</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link pl-5 text-white">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>SUPPORT</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Legality</a></li>
                                <li><a href="#">Refund & Cancellation Policy</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -->
                    <div id="accordion" class="d-lg-none">
                        <div class="card">
                            <div class="card-header">
                                <a href="#support" data-toggle="collapse" class="card-link d-block">SUPPORT</a>
                            </div>
                            <div id="support" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Terms of
                                            Service</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Legality</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Refund &
                                            Cancellation Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fourth Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>FOLLOW US</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">YouTube</a></li>
                                <li><a href="#">Instagram</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -->
                    <div id="accordion" class="d-lg-none w-100 bg-danger">
                        <div class="card w-100 bg-danger">
                            <div class="card-header">
                                <a href="#follow" data-toggle="collapse" class="card-link d-block">FOLLOW US</a>
                            </div>
                            <div id="follow" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Twitter</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">YouTube</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @show
</body>

</html>