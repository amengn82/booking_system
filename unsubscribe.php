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
        h1, h3 {
            text-align: center;
            color: black;
        }
        form {
            text-align: center;
            color: black;
            margin-top: 60px;
        }
    </style>
    <title>ABC Hotel</title>
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
    <h1>Welcome member</h1>
    <h1>Hello <?php echo $_SESSION['username']; ?></h1>
    <h3>Your user id : ..<?php echo $_SESSION['user_id']; ?>..</h3>

    <form action="r_unsubscribe_form.php" method="POST">
    <label for="unsubscribe">Unsubscribe</label><br>
    <input type="number" name="unsubscribe" id="unsubscribe" placeholder="your user id here" required>
    <input type="submit" value="unsubscribe">
    </form>
    <br>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>