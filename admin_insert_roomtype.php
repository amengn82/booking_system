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
    <title>Admin zone - Insert room types</title>
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
        <h1>Room type insert form</h1><br>
        <form action="admin_r_form4.php" method="POST">

            <label for="room_type_name">Room type name :</label><br>
            <input type="text" name="room_type_name" id="room_type_name" required><br><br>

            <label for="room_type_point">Room point :</label><br>
            <input type="number" name="room_type_point" id="room_type_point" required><br><br>

            <label for="room_type_price">Room price :</label><br>
            <input type="number" name="room_type_price" id="room_type_price" required><br><br>

            <label for="max_capacity">Max capacity :</label><br>
            <input type="number" name="max_capacity" id="max_capacity" required><br><br>

            <label for="breakfast_option">Breakfast option</label><br>
            <input type="radio" name="breakfast_option" id="breakfast_option" value="Yes" checked> Yes
            <input type="radio" name="breakfast_option" id="breakfast_option" value="No" > No
            <br><br>

            <label for="smoke_option">Smoke option</label><br>
            <input type="radio" name="smoke_option" id="smoke_option" value="Yes" checked> Yes
            <input type="radio" name="smoke_option" id="smoke_option" value="No" > No
            <br><br>
    
            <label for="pickup_option">Pickup option</label><br>
            <input type="radio" name="pickup_option" id="pickup_option" value="Yes" checked> Yes
            <input type="radio" name="pickup_option" id="pickup_option" value="No" > No
            <br><br>

            <label for="refund_option">Refund option</label><br>
            <input type="radio" name="refund_option" id="refund_option" value="Yes" checked> Yes
            <input type="radio" name="refund_option" id="refund_option" value="No" > No
            <br><br>
           
            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>
