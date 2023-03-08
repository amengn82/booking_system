<?php
    session_start();
    if(empty($_SESSION['username']) || empty($_SESSION['password'])) {
          header('location: login.php');
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
        .check_availability {
            text-align: center;
            color: black;
            margin-top: 60px;
        }
    </style>
    <title>Check avaliability</title>
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
    </section>
    <section class="check_availability">
    <h1>Check availability</h1><br>
        <form action="r_room_form.php" method="POST">

        <label for="checkin">Check in :</label><br>
        <input type="date" name="checkin" id="checkin">
        <br><br>

        <label for="checkout">Check out :</label><br>
        <input type="date" name="checkout" id="checkout">
        <br><br>

        <input type="submit" name="submit" value="search">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>