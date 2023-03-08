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
    <title>Home</title>
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
    <section class="info-car">
        <h1>Superior room - Twin standard</h1>
        <img src="./hotel_images/superior_twin_standard.jpg" alt="superior_twin_standard">
        <h1>Superior room - Queen standard</h1>
        <img src="./hotel_images/superior_queen_standard.jpg" alt="superior_queen_standard.jpg">    
        <h1>Superior room - King standard</h1>
        <img src="./hotel_images/superior_king_standard.jpg" alt="superior_king_standard"> 
        <h1>Deluxe room - Twin standard</h1>
        <img src="./hotel_images/deluxe_twin_standard.jpg" alt="deluxe_twin_standard">
        <h1>Deluxe room - Queen standard</h1>
        <img src="./hotel_images/deluxe_queen_standard.jpg" alt="deluxe_queen_standard">    
        <h1>Deluxe room - King standard</h1>
        <img src="./hotel_images/deluxe_king_standard.jpg" alt="deluxe_king_standard">
        <h1>VIP room - Twin standard</h1>
        <img src="./hotel_images/vip_twin_standard.jpg" alt="vip_twin_standard">
        <h1>VIP room - Queen standard</h1>
        <img src="./hotel_images/vip_queen_standard.jpg" alt="vip_queen_standard">    
        <h1>VIP room - King standard</h1>
        <img src="./hotel_images/vip_king_standard.jpg" alt="vip_king_standard">
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>