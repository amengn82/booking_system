<?php
    session_start();
    if(empty($_SESSION['username']) || empty($_SESSION['password'])) {
          header('location: login.php');
    }  // print_r($_POST);

    include_once('./connect.php'); 
?>
<?php
        // Search room
        $checkin = isset($_POST['checkin'])?$_POST['checkin']:'';
        $checkout = isset($_POST['checkout'])?$_POST['checkout']:'';
    
    if(isset($_GET['id'])=='') {
    $sql_searchroom = "
                SELECT 
                    room_list.room_id, room_list.room_number,room_names.room_name,room_types.room_type_name,
                    (room_names.room_name_point + room_types.room_type_point) AS room_point,
                    (room_names.room_name_price + room_types.room_type_price) AS room_price,
                    room_types.max_capacity,room_types.breakfast_option,room_types.smoke_option,
                    room_types.pickup_option,room_types.refund_option
                FROM
                    room_list
                    JOIN room_names ON room_list.room_name_id = room_names.room_name_id
                    JOIN room_types ON room_list.room_type_id = room_types.room_type_id
                    JOIN room_status ON room_list.room_status_id = room_status.room_status_id
                    WHERE room_status.room_status_name = 'ready'
                    AND room_id not in (
                            SELECT booking_list.room_id FROM booking_list
                            WHERE 
                                ('$checkin' BETWEEN booking_list.check_in AND booking_list.check_out)
                                AND
                                ('$checkout' BETWEEN booking_list.check_in AND booking_list.check_out)
                        )
                        ORDER BY
                            room_list.room_id
            ";
            $result = $conn->query($sql_searchroom);
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
        h1 {
            text-align: center;
            color: black;
        }
        table {
            text-align: center;
            color: black;
            margin: 0px auto;
            background-color: white;
            border: black;
        }
        table, th, td {
            width: 1300px;
            border-collapse: collapse;
        }
        tr td a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
    <title>Available room</title>
</head>
<body>
    <?php require_once("nav_main.php"); ?>
    <section id="tiny" class="tinyslide">
        <aside class="slides">
            <figure> <img src="./hotel_images/pic1.jpg" alt="">
                <figcaption> ABC Hotel </figcaption>
            </figure>
            <figure> <img src="./hotel_images/pic2.jpg" alt="">
                <figcaption> Luxury </figcaption>
            </figure>
            <figure> <img src="./hotel_images/pic3.jpg" alt="">
                <figcaption> Your dream place </figcaption>
            </figure>
        </aside>
    </section><br>
    <h1>Available room</h1><br>
    <section>
        <table border=1>
        <thead>
                <tr>
                    <th>Room id</th>
                    <th>Room number</th>
                    <th>Room name</th>
                    <th>Room type</th>
                    <th>Room point</th>
                    <th>Room price</th>
                    <th>Max capacity</th>
                    <th>Breakfast option</th>
                    <th>Smoke option</th>
                    <th>Pickup option</th>
                    <th>Refund option</th>
                    <th>Book</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $value){
                        echo "<tr>
                                <td>{$value['room_id']}</td>
                                <td>{$value['room_number']}</td>
                                <td>{$value['room_name']}</td>
                                <td>{$value['room_type_name']}</td>
                                <td>{$value['room_point']}</td>
                                <td>{$value['room_price']}</td>
                                <td>{$value['max_capacity']}</td>
                                <td>{$value['breakfast_option']}</td>
                                <td>{$value['smoke_option']}</td>
                                <td>{$value['pickup_option']}</td>
                                <td>{$value['refund_option']}</td>
                                <td><a href='r_bookroom.php?id={$value['room_id']}&check_in={$checkin}&check_out={$checkout}&action=book'>Book</a></td>
                             </tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>