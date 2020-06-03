<?php
error_reporting(0);
session_start();

$connect = new mysqli('localhost', 'root', '', 'bloodshed');
date_default_timezone_set("Asia/Kolkata");

if (isset($_POST['contactus'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $date_time = date("d-m-Y") . ' ' . date("h:i:sa");

    $insert = "INSERT INTO contact(name,email,contact,subject,message,submitted_at) VALUES ('$name','$email','$contact','$subject','$message','$date_time')";

    if ($connect->query($insert)) {
        echo 'Submitted';
    } else {
        echo $connect->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../static_css/contact1.css">
    <link rel="stylesheet" href="../static_css/header.css">
    <link rel="stylesheet" href="../static_css/hamburger.css">
    <link rel="stylesheet" href="../static_css/foot.css">
    <link rel="stylesheet" href="../Font/fontawesome-free-5.12.0-web/css/all.css">
    <script src="../Jquery/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.js"></script>
</head>

<body class="">

    <!-- Navbar -->
    <?php include 'header.php'; ?>

    <div>
        <div class="container">
            <div class="contact-parent">
                <div class="contact-child child1">
                    <p>
                        <i class="fas fa-map-marker-alt"></i> Address <br />
                        <span> Ash Lane 110
                            <br />
                            Mohali, Punjab
                        </span>
                    </p>

                    <p>
                        <i class="fas fa-phone-alt"></i> Let's Talk <br />
                        <span> 0099887766</span>
                    </p>

                    <p>
                        <i class=" far fa-envelope"></i> General Support <br />
                        <span>andreea@Playinggame.co.in</span>
                    </p>
                </div>

                <div class="contact-child child2">
                    <div class="inside-contact">
                        <h2>Contact Us</h2>
                        <h3>
                            <span id="confirm">
                        </h3>

                        <form action="" method="post">
                            <p>Name *</p>
                            <input id="txt_name" name="name" type="text" Required="required">

                            <p>Email *</p>
                            <input id="txt_email" name="email" type="text" Required="required">

                            <p>Phone *</p>
                            <input id="txt_phone" name="phone" type="text" Required="required">

                            <p>Subject *</p>
                            <input id="txt_subject" name="subject" type="text" Required="required">

                            <p>Message *</p>
                            <textarea id="txt_message" name="message" rows="4" cols="20" Required="required"></textarea>

                            <input type="submit" name="contactus" class="btn-dark" id="btn_send" value="SEND">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <?php include '../login_modal.php' ?>
    <script src="../login.js"></script>
    <script src="../JavaScript/Home.js"></script>

</body>

</html>