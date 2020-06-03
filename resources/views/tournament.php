<?php session_start();

$connect = new mysqli('localhost', 'root', '', 'bloodshed');

if (isset($_SESSION['username'])) {
    $current_username = $_SESSION['username'];
}

// Event page php for ajax use
// for event page where ajax check username exist or not
if (isset($_POST['check_username'])) {
    $username = $_POST['check_username'];
    $event_id = $_POST['event_id'];
    $current_event_time = $_POST['time'];
    // fetch user data for username and event list checking
    $select_all_username = "SELECT * FROM `register` WHERE `username` = '$username'";
    $query = $connect->query($select_all_username);
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $event_list = $row['event_list'];
        $role = $row['Role'];
        $list_of_event = explode(',', $event_list);
        if ($current_username === $username || $role == 'organizer' || $role == 'admin') {
            echo 'current';
            exit();
        } else {
            if (!empty($list_of_event) && $list_of_event != '') {
                if (in_array($event_id, $list_of_event)) {
                    echo 'denied';
                    exit();
                } else {
                    foreach ($list_of_event as $time) {
                        $fetch_time_from_event = "SELECT  * FROM `tournament_status` WHERE' `event_id` = '$time'";
                        $time_check = $connect->query($fetch_time_from_event);
                        $row = mysqli_fetch_assoc($query);
                        $event_time = $row['start_date'];
                        if ($current_event_time == $event_time) {
                            echo 'timematched';
                            exit();
                        } else {
                            echo 'notmatched';
                            exit();
                        }
                    }
                }
            } else {
                echo 'empty_list';
                exit();
            }
        }
    } else {
        echo 'not_exist';
        exit();
    }
}

if (isset($_POST['user_exist_in_event'])) {
}

// Event page PHP end here


$pubg = "SELECT * FROM tournament_status WHERE game='pubg' AND status='granted'";

$pubg_result = $connect->query($pubg);


$cod = "SELECT * FROM tournament_status WHERE game='cod' AND status='granted'";

$cod_result = $connect->query($cod);

$ff = "SELECT * FROM tournament_status WHERE game='ff' AND status='granted'";

$ff_result = $connect->query($ff);

$fortnite = "SELECT * FROM tournament_status WHERE game='fortnite' AND status='granted'";

$fortnite_result = $connect->query($fortnite);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournaments</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../Jquery/jquery-3.4.1.js"></script>
    <!-- <script src="../apache_stop.bat"></script> -->
    <script src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../Font/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="../static_css/tournament.css">
    <link rel="stylesheet" href="../static_css/header.css">
    <link rel="stylesheet" href="../static_css/foot.css">
    <link rel="stylesheet" href="../static_css/hamburger.css">
    <link rel="stylesheet" href="../static_css/login.css">
</head>

<body>
    <?php
    include 'header.php';
    ?>


    <!-- Page Content -->
    <div class="container-fluid bg-dark">
        <!-- Row One---------------------- -->
        <div class="row">
            <!-- BgImage -->
            <div class="col-12 px-0">
                <div class="bgimgEvents text-center"></div>
                <div class="textEvent">
                    <h1>Tournaments</h1>
                </div>
                <!-- ----Event Tabs---- -->
                <div class="trytabs">
                    <ul class="nav nav-tabs">
                        <li>
                            <a data-toggle="tab" href="#tab1">
                                <img class="img-fluid img-thumbnail" src="../images/event1tab.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab2">
                                <img class="img-fluid img-thumbnail" src="../images/event2tab.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab3">
                                <img class="img-fluid img-thumbnail" src="../images/event3tab.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab4">
                                <img class="img-fluid img-thumbnail" src="../images/eventTab4freefire.jpeg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End of Row One----------------- -->
        <!-- Row Two------------------------ -->
        <div class="row mt-3 text-white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                <!-- tab-content -->
                <div class="tab-content">
                    <!-- -------------Tab One-------------- -->
                    <div id="tab1" class="tab-pane active p-5">
                        <div class="container-fluid event_cards">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                                    <div class="main-div rounded" id="pubg-big-card">
                                        <div class="inner-div">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-4 col-sm-5 col-12">
                                                        <div class="img-box ml-5">
                                                            <h3>01:10:45</h3>
                                                            <img src="../images/event1tab.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-5 col-12">
                                                        <div class="context mt-5">
                                                            <h1>EU 2v2 Search and Destroy 02-13</h1>
                                                            <h4>Prize: $300 USD/10 Credits</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="startTime">
                                            <h5>Starts: Wed Feb 17 @ 08.25 PM IST</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (mysqli_num_rows($pubg_result) < 0) { ?>
                                <div class="no-event bg-dark rounded">
                                    <h1>PUBG Tournament Are Not Available For Now !</h1>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="row mt-5 event_card_box">
                                    <?php
                                    while ($row = mysqli_fetch_array($pubg_result)) {
                                        $start_date = $row['start_date'];
                                        $time = $row['time'];
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-0 card_main_div">

                                            <a href="<?php echo 'paytm_event.php?event_id=' . $row['event_id'] ?>" id="event_card">
                                                <div class="main-div2 rounded" id="pubg-small-card">
                                                    <div class="inner-div2">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                                                                    <div class="img-box2 ml-2">
                                                                        <h7 id="timer">

                                                                        </h7>
                                                                        <img src="<?php echo '../' . $row['logo']; ?>" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7 col-md-6 col-sm-6 col-12">
                                                                    <div class="context2 mt-5">
                                                                        <h4><?php echo $row['tournament_name']; ?></h4>
                                                                        <h6>Prize: <?php echo '₹' . $row['prize'] . ' / Entry Fee:- ' . $row['price'] ?></h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="startTime2">
                                                        <h6>Starts: Wed Feb 17 @ 08.25 PM IST</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                <?php   }
                                } ?>
                                </div>
                        </div>
                    </div>
                    <!-- ------------Eof Tab One----------- -->
                    <!-- ------------Tab Two--------------- -->
                    <div id="tab2" class="tab-pane fade p-5">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                                    <div class="main-div rounded" id="cod-big-card">
                                        <div class="inner-div">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-4 col-sm-5 col-12">
                                                        <div class="img-box ml-5">
                                                            <h3>01:10:45</h3>
                                                            <img src="../images/event2tab.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-5 col-12">
                                                        <div class="context mt-5">
                                                            <h1>EU 2v2 Search and Destroy 02-13</h1>
                                                            <h4>Prize: $300 USD/10 Credits</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="startTime">
                                            <h5>Starts: Wed Feb 17 @ 08.25 PM IST</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (mysqli_num_rows($cod_result) < 0) { ?>
                                <div class="no-event bg-dark rounded">
                                    <h1>PUBG Tournament Are Not Available For Now !</h1>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="row mt-5 event_card_box">
                                    <?php
                                    while ($row = mysqli_fetch_array($cod_result)) {
                                        $start_date = $row['start_date'];
                                        $time = $row['time'];
                                    ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-0 card_main_div">

                                            <a href="<?php echo 'paytm_event.php?event_id=' . $row['event_id'] ?>" id="event_card">
                                                <div class="main-div2 rounded" id="pubg-small-card">
                                                    <div class="inner-div2">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                                                                    <div class="img-box2 ml-2">
                                                                        <h7 id="timer">

                                                                        </h7>
                                                                        <img src="<?php echo '../' . $row['logo']; ?>" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7 col-md-6 col-sm-6 col-12">
                                                                    <div class="context2 mt-5">
                                                                        <h4><?php echo $row['tournament_name']; ?></h4>
                                                                        <h6>Prize: <?php echo '₹' . $row['prize'] . ' / Entry Fee:- ' . $row['price'] ?></h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="startTime2">
                                                        <h6>Starts: Wed Feb 17 @ 08.25 PM IST</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                <?php   }
                                } ?>
                                </div>
                        </div>
                    </div>
                    <!-- -------------Eof Tab Two--------- -->
                    <!-- ------------Tab Three--------------- -->
                    <div id="tab3" class="tab-pane fade p-5">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                                    <div class="main-div rounded" id="fortnite-big-card">
                                        <div class="inner-div">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-4 col-sm-5 col-12">
                                                        <div class="img-box ml-5">
                                                            <h3>01:10:45</h3>
                                                            <img src="../images/event3tab.jpg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-5 col-12">
                                                        <div class="context mt-5">
                                                            <h1>EU 2v2 Search and Destroy 02-13</h1>
                                                            <h4>Prize: $300 USD/10 Credits</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="startTime">
                                            <h5>Starts: Wed Feb 17 @ 08.25 PM IST</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <?php
                                while ($row = mysqli_fetch_array($fortnite_result)) {
                                    $start_date = $row['start_date'];
                                    $time = $row['time'];
                                ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-0">
                                        <a href="<?php echo 'paytm_event.php?event_id=' . $row['event_id'] ?>" id="event_card">
                                            <div class="main-div2 rounded" id="cod-small-card">
                                                <div class="inner-div2">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                                                                <div class="img-box2 ml-2">
                                                                    <h4 id="timer"></h4>
                                                                    <img src="<?php echo '../' . $row['logo']; ?>" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7 col-md-6 col-sm-6 col-12">
                                                                <div class="context2 mt-5">
                                                                    <h4>EU 2v2 Search and Destroy 02-13</h4>
                                                                    <h6>Prize: $300 USD/10 Credits</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="startTime2">
                                                    <h6>Starts: Wed Feb 17 @ 08.25 PM IST</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- ------------Eof Tab Three--------------- -->
                    <!-- ------------Tab four--------------- -->
                    <div id="tab4" class="tab-pane fade p-5">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 px-0">
                                    <div class="main-div rounded" id="freefire-big-card">
                                        <div class="inner-div">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-4 col-sm-5 col-12">
                                                        <div class="img-box ml-5">
                                                            <h3>01:10:45</h3>
                                                            <img src="../images/eventTab4freefire.jpeg" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-5 col-12">
                                                        <div class="context mt-5">
                                                            <h1>EU 2v2 Search and Destroy 02-13</h1>
                                                            <h4>Prize: $300 USD/10 Credits</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="startTime">
                                            <h5>Starts: Wed Feb 17 @ 08.25 PM IST</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <?php
                                while ($row = mysqli_fetch_array($ff_result)) {
                                    $start_date = $row['start_date'];
                                    $time = $row['time'];
                                ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-0">
                                        <a href="<?php echo 'paytm_event.php?event_id=' . $row['event_id'] ?>" id="event_card">
                                            <div class="main-div2 rounded" id="cod-small-card">
                                                <div class="inner-div2">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                                                                <div class="img-box2 ml-2">
                                                                    <h4 id="timer"></h4>
                                                                    <img src="<?php echo '../' . $row['logo']; ?>" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7 col-md-6 col-sm-6 col-12">
                                                                <div class="context2 mt-5">
                                                                    <h4>EU 2v2 Search and Destroy 02-13</h4>
                                                                    <h6>Prize: $300 USD/10 Credits</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="startTime2">
                                                    <h6>Starts: Wed Feb 17 @ 08.25 PM IST</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- ------------Eof Tab Four--------------- -->
                </div>
            </div>
        </div>
        <!-- Eof R2------------------------- -->
    </div>

    <?php
    include 'footer.php';
    ?>

    <?php include '../login_modal.php' ?>
    <script src="../login.js"></script>

    <script src="../JavaScript/Home.js"></script>
    <script>
        var countdown = <?php echo strtotime("$start_date $time") ?> * 1000;
        var now = <?php echo time() ?> * 1000;

        var x = setInterval(function() {
            // var now= new date().getTime();
            now = now + 1000;
            var distance = countdown - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('timer').innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

        }, 1000);
    </script>
</body>

</html>