<?php 
    session_start();
    if(empty($_SESSION['username']) || empty($_SESSION['password'])) {
        header('location: login.php');
    }
    
    include_once('./connect.php'); 

    // User subscribe

    $subscriber = isset($_POST['subscribe'])?$_POST['subscribe']:'';
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
        section {
            text-align: center;
            color: black;
        }
    </style>
    <title>Subscribe result</title>
</head>
<body>
    <?php require_once("nav_main.php"); ?>
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
        <?php
        // Add subscriber
            if($subscriber ==  $_SESSION['user_id']) {
                $sql_subscriber_insert = "
                            INSERT INTO subscribers (
                                subscribers.user_id
                            )VALUES(
                                $subscriber
                            )
                ";
                $result = $conn->query($sql_subscriber_insert);
                echo "<br><h1>You have been successfully subscribed</h1><br>";
                echo "<a href='home.php'>Back to find great deals for your next trip</a>";
            }else {
                echo "<br><h1>Your user id is not correct. Please try it again.</h1>";
            }
        ?>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>