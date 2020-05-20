@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')

<link rel="stylesheet" href="{{asset('static_css/style.css')}}">
<!-- Registratiojn error -->
@if($errors->any())
<div class="modal fade show" id="error">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-header">
            <a href="" class="close" data-dismiss="#error">&times</a>
        </div>
        <div class="modal-content">
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" style="height: 40vh">
                {{$error}}
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Successfull registration message -->
@if(session()->has('register_done'))
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center p-2 alert-success">
                {{$register_done}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Jumbotron -->
<div class="jumbotron p-0 m-0">
    <!-- Slider Section -->
    <div class="container-fluid">
        <!-- Row One -->
        <div class="row">
            <div class="col-md-12 px-0">
                <!-- Carousel -->
                <div class="carousel slide carousel-fade cc" data-ride="carousel" id="car">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#car" data-slide-to="0">1</li>
                        <li data-target="#car" data-slide-to="1">2</li>
                        <li data-target="#car" data-slide-to="2">3</li>
                        <li data-target="#car" data-slide-to="3">4</li>
                    </ol>
                    <!-- End of Indicators -->
                    <div class="carousel-inner text-center text-uppercase cimg">
                        <!-- Image1 -->
                        <div class="carousel-item active">
                            <div class="images">
                                <div class="img-fluid1" id="img-1">

                                </div>
                                <!-- <img class="img-fluid" src="images/cod1.jpg" alt=""> -->
                                <div class="overdiv"></div>
                                <!-- Carousel Caption -->
                                <div class="carousel-caption">
                                    <h3 class="d-block mx-auto text-center">
                                        BLOODSHED <br> GET READY FOR WAR
                                    </h3>
                                    <p class="text-center pbtn mt-4">
                                        <?php
                                        if (isset($_SESSION['username'])) {
                                        ?>

                                            <a href="" class="btn btn_red text-uppercase">
                                                <span class="s2">Browse Tournament</span>
                                            </a>

                                        <?php
                                        } else {
                                        ?>

                                            <a href="" class="btn btn_red text-uppercase">
                                                <span class="s2">Register Now!</span>
                                            </a>
                                            <a href="" class="btn btn_red text-uppercase">
                                                <span class="s2">Login</span>
                                            </a>

                                        <?php
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Image2 -->
                        <div class="carousel-item">
                            <div class="img-fluid1" id="img-2">

                            </div>
                            <!-- <img class="img-fluid" src="images/ff2.jpg" alt=""> -->
                            <div class="overdiv"></div>
                            <!-- Carousel Caption -->
                            <div class="carousel-caption">
                                <h3>BLOODSHED <br> GET READY FOR WAR</h3>
                                <p class="text-center pbtn">
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                    ?>

                                        <a href="" class="btn btn_red text-uppercase">
                                            <span class="s2">Browse Tournament</span>
                                        </a>

                                    <?php
                                    } else {
                                    ?>

                                        <a href="" class="btn btn_red text-uppercase">
                                            <span class="s2">Register Now!</span>
                                        </a>
                                        <a href="" class="btn btn_red text-uppercase">
                                            <span class="s2">Login</span>
                                        </a>

                                    <?php
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <!-- Image3 -->
                        <div class="carousel-item">
                            <div class="img-fluid1" id="img-3">

                            </div>
                            <!-- <img class="img-fluid" src="images/fortnite.jpg" alt=""> -->
                            <div class="overdiv"></div>
                            <!-- Carousel Caption -->
                            <div class="carousel-caption">
                                <h3>BLOODSHED <br> GET READY FOR WAR</h3>
                                <p class="text-center pbtn">
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                    ?>

                                        <a href="" class="btn btn_red text-uppercase">
                                            <span class="s2">Browse Tournament</span>
                                        </a>

                                    <?php
                                    } else {
                                    ?>

                                        <a href="" class="btn btn_red text-uppercase">
                                            <span class="s2">Register Now!</span>
                                        </a>
                                        <a href="" class="btn btn_red text-uppercase">
                                            <span class="s2">Login</span>
                                        </a>

                                    <?php
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <!-- Image4 -->
                        <div class="carousel-item">
                            <div class="img-fluid1" id="img-4">

                            </div>
                            <!-- <img class="img-fluid" src="images/pubg2.jpg" alt=""> -->
                            <div class="overdiv"></div>
                            <!-- Carousel Caption -->
                            <div class="carousel-caption">
                                <h3>BLOODSHED <br> GET READY FOR WAR</h3>
                                <p class="text-center pbtn">
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                    ?>

                                        <a href="" class="btn btn_red text-uppercase">
                                            <span class="s2">Browse Tournament</span>
                                        </a>

                                    <?php
                                    } else {
                                    ?>

                                        <a href="" class="btn btn_red text-uppercase">
                                            <span class="s2">Register Now!</span>
                                        </a>
                                        <a href="" class="btn btn_red text-uppercase">
                                            <span class="s2">Login</span>
                                        </a>

                                    <?php
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Carousel -->
            </div>
        </div>
        <!-- End of Row One -->
    </div>
</div>

<!-- Second Section -->
<div class="second-section">

    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <h1 class="text-center">HOW IT WORKS</h1><br>
            </div>
            <div class="col-lg-4">
                <img class="d-block mx-auto" src="images/sec-2-img-1red.png"><br><br>
                <h4>SIGN UP TODAY</h4>
                <hr>
                <p>Sign up using your email ID to participate and compete in a variety of tournaments across PC, Mobile and Console platforms</p>
            </div>
            <div class="col-lg-4">
                <img class="d-block mx-auto" src="images/sec-2-img-2red.png"><br><br>
                <h4>COMPLETE IN TOURNAMENTS</h4>
                <hr>
                <p>Compete for cash, trophies and bragging rights </p>
            </div>
            <div class="col-lg-4">
                <img class="d-block mx-auto" src="images/sec-2-img-3red.png"><br><br>
                <h4>WIN & EARN CASH</h4>
                <hr>
                <p>Use your winning coins to participate in paid tournaments or exchange them to make some serious cash!
                </p>
            </div>
        </div>
    </div>

    <!-- Second Section Button -->
    <p class="text-center pbtn">
        <?php
        if (isset($_SESSION['username'])) {
        ?>
            <a href="" class="btn btn_red text-uppercase">
                <span class="s2">Browse Tournament</span>
            </a>
        <?php
        } else {
        ?>
            <a href="" class="btn btn_red text-uppercase">
                <span class="s2">Register Now!</span>
            </a>
        <?php
        }
        ?>
    </p>

</div>

<!--Tabs Section / third-section -->
<section class="container-fluid third-section">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#pubg">PUBG</a></li>
                <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#fortnite-tab">FORTNITE</a></li>
                <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#cod-tab">COD MOBILE</a></li>
                <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#freefire-tab">FREE FIRE</a></li>
            </ul>

            <div class="tab-content">
                <!-- First Tab -->
                <div id="pubg" class="tab-pane active">

                    <div class="tab-inner_heading">
                        <h2 class="heading-secondary text-center pt-3 pb-3 display-4">
                            PLAYER'S UNKNOWN BATTLEGROUND
                        </h2>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">SPARTAN ON GROUNDS OF ERANGEL</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Date:- 10/05/2020</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Prize: OnePlus XT</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Premium: Solo</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Game: PUBG Mobile</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Team Joinded: 38/50</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">PLAYER UNKNOWN
                                                        BATTLEGROUND</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner third_card">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">PLAYER UNKNOWN
                                                        BATTLEGROUND</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab2 / Fortnite -->
                <div id="fortnite-tab" class="tab-pane fade">

                    <div class="tab-inner_heading">
                        <h2 class="heading-secondary text-center pt-3 pb-3 display-4">
                            FORTNITE BATTLE ROYALE
                        </h2>
                    </div>

                    <!-- cards -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">PLAYER UNKNOWN
                                                        BATTLEGROUND</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">PLAYER UNKNOWN
                                                        BATTLEGROUND</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner third_card">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">PLAYER UNKNOWN
                                                        BATTLEGROUND</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab3 / COD -->
                <div id="cod-tab" class="tab-pane fade">

                    <div class="tab-inner_heading">
                        <h2 class="heading-secondary text-center pt-3 pb-3 display-4">
                            CALL OF DUTY
                        </h2>
                    </div>

                    <!-- cards -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">PLAYER UNKNOWN
                                                        BATTLEGROUND</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">PLAYER UNKNOWN
                                                        BATTLEGROUND</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner third_card">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">PLAYER UNKNOWN
                                                        BATTLEGROUND</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab4 / FreeFire -->
                <div id="fortnite-tab" class="tab-pane fade">

                    <div class="tab-inner_heading">
                        <h2 class="heading-secondary text-center pt-3 pb-3 display-4">
                            FORTNITE BATTLE ROYALE
                        </h2>
                    </div>

                    <!-- cards -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">PLAYER UNKNOWN
                                                        BATTLEGROUND</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">PLAYER UNKNOWN
                                                        BATTLEGROUND</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="header">
                                    <div class="header-card-inner third_card">
                                        <div class="front">
                                            <div class="card_img">

                                            </div>
                                            <div class="card_heading">
                                                <h3 class="card_heading_text">
                                                    <span class="card_heading_text_inner">PLAYER UNKNOWN
                                                        BATTLEGROUND</span>
                                                </h3>
                                            </div>
                                            <div class="card_detail">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Home</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">

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
</section>


<!-- Fourth Section / Parallax -->
<section class="fourth-section">
    <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-0">
            <div class="col-md-6 pl-5">
                <div class="left-content">
                    <h5>PARTICIPATE IN FREE TOURNAMENTS</h5>
                    <h2>Play and Win Cash Prizes!</h2>
                    <p>
                        PlayMonk is offering its users a wide variety of free tournaments to participate in. All you have to do is register, browse and find tournament for your favorite game!
                    </p>
                    <p>
                        The best part? Entry for official PlayMonk tournaments is free! Drop into the battlegrounds today and start dominating your opponents! Win cash prizes in games like PUBG Mobile and Fortnite by playing for free!
                    </p>
                </div>
                <button class="btn text-white btn-lg" style="background: #fe0000;">Browse Tournament</button>
            </div>
            <div class="col-md-6">
                <div class="right-img">
                    <img src="images/characters-ghost.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LeaderBoards -->
<section class="leader">
    <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-0">
            <div class="col-md-12">
                <h2 class="display-4 pt-4 pb-4">LEADERBOARD TALENTS</h2>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="leader-card-1 mx-auto card">
                    <div class="card-header">
                        <div class='card-img d-inline-block'>
                            <img src="images/leader-1.jpg" class="" alt="">
                        </div>
                        <div class="card card-text">
                            <span class="d-block">Raghav Sharma</span>
                            <span class="d-block">[FFyh987]</span>
                            <span class="d-block">23 yrs, Amritsar</span>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="card-img-propic position-absolute">
                            <img src="../images/major-badge-7.png" alt="">
                        </div>
                        <div class="card-title mt-5">
                            <hr id="leader-hr" class="leader-hr-1">
                            <div class="card-title">
                                <span>
                                    <h5>1200</h5>
                                </span>
                            </div>
                            <div class="card-subtitle">
                                <span>
                                    <h5>RATING POINT</h5>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="leader-rank">
                    RANK <span>#2</span>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="leader-card-2 mx-auto card">
                    <div class="card-header">
                        <div class='card-img d-inline-block'>
                            <img src="../images/leader-1.jpg" class="" alt="">
                        </div>
                        <div class="card card-text">
                            <span class="d-block">Neeraj Khorishi</span>
                            <span class="d-block">[COD098uJ]</span>
                            <span class="d-block">21 yrs, Amritsar</span>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="card-img-propic position-absolute">
                            <img src="../images/major-badge-7.png" alt="">
                        </div>
                        <div class="card-title mt-5">
                            <hr id="leader-hr" class="leader-hr-2">
                            <div class="card-title">
                                <span>
                                    <h5>1300</h5>
                                </span>
                            </div>
                            <div class="card-subtitle">
                                <span>
                                    <h5>RATING POINT</h5>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="leader-rank-1">
                    RANK <span>#1</span>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="leader-card-3 mx-auto card">
                    <div class="card-header">
                        <div class='card-img d-inline-block'>
                            <img src="../images/leader-1.jpg" class="" alt="">
                        </div>
                        <div class="card card-text">
                            <span class="d-block">Amandeep Singh</span>
                            <span class="d-block">[PUNGuu8uJ]</span>
                            <span class="d-block">19 yrs, Mohali</span>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="card-img-propic position-absolute">
                            <img src="../images/major-badge-7.png" alt="">
                        </div>
                        <div class="card-title mt-5">
                            <hr id="leader-hr" class="leader-hr-3">
                            <div class="card-title">
                                <span>
                                    <h5>1090</h5>
                                </span>
                            </div>
                            <div class="card-subtitle">
                                <span>
                                    <h5>RATING POINT</h5>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="leader-rank-3">
                    RANK <span>#3</span>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Fifth Section -->
<section class="fifth-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="left-content-img">
                    <!-- <img src="../images/center-soldier-cod.png" height="100" alt=""> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-content">
                    <h5>
                        <span class="d-block display-4">Jump into the world of Gaming War.</span>
                        <span class="d-block pt-3 pb-3">Fight and Stay Alive !</span>
                        <span class="d-block">Till the end.</span>
                    </h5>
                </div>
                <?php
                if (isset($_SESSION['username'])) {
                ?>
                    <button class="btn">Let's go for Battle Royale</button>
                <?php
                } else {
                ?>
                    <button class="btn">Sign up for Battle Royale</button>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {
        $('#exampleModal').modal({
            show: true
        });
    });
</script>
@endsection

@section('footer')

@parent

@endsection