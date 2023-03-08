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
        ul {
            text-align: center;
        }
        ul li a {
            color: black;
            text-decoration: none;
        }
    </style>
    <title>Admin zone - Report</title>
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
    <section>
       <ul>
            <li>
                <a href="admin_r_roomlist_inf.php"><img width="150px" height="150px" src="./hotel_images/task-list.png" alt="task-list"></a><br><br>
                <p><a href="admin_r_roomlist_inf.php">Rooom information summary report</a></p>
            </li><br>
            <li>
                <a href="admin_incomenet_input.php"><img width="150px" height="150px" src="./hotel_images/income.jpg" alt="income"></a><br><br>
                <p><a href="admin_incomenet_input.php">Income net summary report</a></p>
            </li><br>
            <li>
                <a href="admin_r_point.php"><img width="150px" height="150px" src="./hotel_images/earning_point.png" alt="earning_point"></a><br><br>
                <p><a href="admin_r_point.php">Customer earning point summary report</a></p>
            </li><br>
            <li>
                <a href="admin_checkin_input.php"><img width="150px" height="150px" src="./hotel_images/checkin_customer_list.png" alt="checkin_customer_list"></a><br><br>
                <p><a href="admin_checkin_input.php">Check-in customer list</a></p>
            </li><br>
            <li>
                <a href="admin_payroll_input.php"><img width="150px" height="150px" src="./hotel_images/payroll.jpg" alt="payroll"></a><br><br>
                <p><a href="admin_payroll_input.php">Monthly payroll summary report</a></p>
            </li><br>
       </ul>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>