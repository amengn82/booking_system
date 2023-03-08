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
        section {
            text-align: center;
            color: black;
        }
    </style>
    <title>Admin zone - Insert benefits</title>
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
        <h1>Information form of benefit</h1><br>
        <form action="admin_r_form10.php" method="POST">
            <label for="lunch_offer">Lunch offer (per month) :</label><br>
            <input type="number" name="lunch_offer" id="lunch_offer" required><br><br>

            <label for="renthouse_offer">Rent house offer (per month) :</label><br>
            <input type="number" name="renthouse_offer" id="renthouse_offer" required><br><br>

            <label for="traveling_offer">Traveling offer (per month) :</label><br>
            <input type="number" name="traveling_offer" id="traveling_offer" required><br><br>

            <label for="social_security">Social security pay (per month) :</label><br>
            <input type="number" name="social_security" id="social_security" required><br><br>

            <label for="withholding_tax">Withholding tax pay (per month) :</label><br>
            <input type="number" name="withholding_tax" id="withholding_tax" required><br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>