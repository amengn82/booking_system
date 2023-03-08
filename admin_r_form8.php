<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
       
    include_once('./connect.php'); 
?>
<?php

    // รับมาตอนกดปุ่ม edit และ delete
    $id = isset($_GET['id'])?$_GET['id']:'';
    $action = isset($_GET['action'])?$_GET['action']:'';

    $booking_id = isset($_POST['booking_id'])?$_POST['booking_id']:'';
    $booking_date = isset($_POST['booking_date'])?$_POST['booking_date']:'';
    $user_id = isset($_POST['user_id'])?$_POST['user_id']:'';
    $room_id = isset($_POST['room_id'])?$_POST['room_id']:'';
    $check_in = isset($_POST['check_in'])?$_POST['check_in']:'';
    $check_out = isset($_POST['check_out'])?$_POST['check_out']:'';
    $booking_status = isset($_POST['booking_status'])?$_POST['booking_status']:'';
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
    <title>Admin zone - booking list</title>
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
        echo "<a href='a_bookinglist.php'>Back to booking list page</a>";
        }
    // Edit
    if(isset($_GET['id']) && $_GET['action'] == 'edit') {
        $sql_bookinglist_update = "
            UPDATE booking_list SET
                booking_list.user_id = '$user_id',
                booking_list.room_id = ' $room_id',
                booking_list.check_in = '$check_in',
                booking_list.check_out = '$check_out'
            WHERE
                booking_list.booking_id = $id
        ";
    $result = $conn->query($sql_bookinglist_update);
    echo "<br><h1>Edited successfully</h1><br>";
    echo "<a href='a_bookinglist.php'>Back to booking list page</a>";
    }
    // Delete
    if(isset($_GET['id']) && $_GET['action'] == 'delete') {
        $sql_bookinglist_delete = "
                    DELETE
                    FROM
                        room_list
                    WHERE
                    room_list.room_id = $id
        ";
    $result = $conn->query($sql_bookinglist_delete);
    echo "<br><h1>Deleted successfully</h1><br>";
    echo "<a href='a_bookinglist.php'>Back to booking list page</a>";
    }    
    ?> 
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>