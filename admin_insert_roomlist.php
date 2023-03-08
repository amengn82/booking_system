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
    <title>Admin zone - Insert room list</title>
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
        <h1>Room list insert form</h1><br>
        <form action="admin_r_form7.php" method="POST">

            <label for="room_number">Room number :</label><br>
            <input type="numnber" name="room_number" id="room_number" required><br><br>

            <label for="room_name_id">Room name id :</label><br>
            <input type="number" name="room_name_id" id="room_name_id" required><br><br>

            <label for="room_type_id">Room type id :</label><br>
            <input type="number" name="room_type_id" id="room_type_id" required><br><br>

            <label for="room_status_id">Room status id :</label><br>
            <input type="number" name="room_status_id" id="room_status_id" required><br><br>

            <label for="clean_date">Clean date :</label><br>
            <input type="date" name="clean_date" id="clean_date" required><br><br>

            <label for="maid_id">Maid id :</label><br>
            <input type="number" name="maid_id" id="maid_id" required><br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>
