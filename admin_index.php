<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/tinyslide.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/tinyslide.js"></script>
    <style>
        h1.hh1 {
            text-align: center;
            color: black;
        }
        button {
           margin: auto;
           display: block;
        }
    </style>
    <title>Admin zone</title>
</head>
<body>
    <?php require_once("nav_main_admin.php"); ?>
    <section id="tiny" class="tinyslide">
        <aside class="slides">
            <figure> <img src="./hotel_images/pic1.jpg" alt="pic1">
                <figcaption> ABC Hotel </figcaption>
            </figure>
            <figure> <img src="./hotel_images/pic2.jpg" alt="pic2">
                <figcaption> Luxury </figcaption>
            </figure>
            <figure> <img src="./hotel_images/pic3.jpg" alt="pic3">
                <figcaption> Your dream place </figcaption>
            </figure>
        </aside>
    </section><br><br>
    <h1 class="hh1">Welcome back</h1>
    <h1 class="hh1">Hello : <?php echo $_SESSION['username']; ?></h1><br>
    <button><a href="admin_logout.php">Log out</a></button>
    <section class="info-car">
        <h1>Payment list</h1>
        <a href="a_paymentlist.php">
            <img src="./hotel_images/online_payment.png" alt="online_payment"> 
        </a>  
        <h1>Send newsletter</h1>
        <a href="a_emailform.php">
            <img src="./hotel_images/newsletter_icon.png" alt="newsletter_icon"> 
        </a>
        <h1>Benefits</h1>
        <a href="a_benefit.php">
            <img src="./hotel_images/benefits.png" alt="benefits"> 
        </a>
        <h1>Report</h1>
        <a href="a_report.php">
            <img src="./hotel_images/report_icon.png" alt="report_icon"> 
        </a>   
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>