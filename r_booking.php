<?php
    session_start();
    if(empty($_SESSION['username']) || empty($_SESSION['password'])) {
         header('location: login.php');
    }
    include_once('./connect.php'); 
    //echo $_GET['id'];
    //echo $_GET['action'];
?>
<?php
    $id = isset($_GET['id'])?$_GET['id']:'';
    $action = isset($_GET['action'])?$_GET['action']:'';
    $checkin = isset($_GET['check_in'])?$_GET['check_in']:'';
    $checkout = isset($_GET['check_out'])?$_GET['check_out']:'';
    $user_id = $_SESSION['user_id'];
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
       if(isset($_GET['id']) && $_GET['action'] == 'book') {
        $sql_booking_insert = "
                    INSERT INTO booking_list (
                        booking_list.user_id,
                        booking_list.room_id,
                        booking_list.check_in,
                        booking_list.check_out
                    )VALUES(
                         $user_id,
                         $id,
                        '$checkin',
                        '$checkout'
                    )
            ";
        $result = $conn->query($sql_booking_insert);
        echo "<br><h1>Booked successfully</h1><br>";
        echo "<a href='booking.php'>See your booking</a>";
        }
        if(isset($_GET['id']) && $_GET['action'] == 'cancel') {
            $sql_booking_delete = "
                        DELETE 
                        FROM 
                            booking_list
                        WHERE
                            booking_list.booking_id = $id
                ";
            $result = $conn->query($sql_booking_delete);
            echo "<br><h1>Canceled successfully</h1><br>";
            echo "<a href='booking.php'>See your booking</a>";
            }
        ?>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>