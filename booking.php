<?php
    session_start();
    if(empty($_SESSION['username']) || empty($_SESSION['password'])) {
         header('location: login.php');
    }

    include_once('./connect.php');

    $sql = "
        SELECT 
            booking_list.booking_id,
            booking_list.booking_date,
            users.firstname,
            users.lastname,
            users.phone_number,
            room_list.room_number,
            room_names.room_name,
            room_types.room_type_name,
            booking_list.check_in,
            booking_list.check_out,
            DATEDIFF(check_out,check_in) AS stay_number,
            ((room_name_point + room_type_point)*DATEDIFF(check_out,check_in)) AS total_point,
            (((room_name_price + room_type_price) + (room_name_price + room_type_price)*0.1 + 
            ((room_name_price + room_type_price) + (room_name_price + room_type_price)*0.1)*0.07)*DATEDIFF(check_out,check_in)) AS total_price
        FROM booking_list 
        JOIN users ON booking_list.user_id = users.user_id
        JOIN room_list ON booking_list.room_id = room_list.room_id
        JOIN room_names ON room_list.room_name_id = room_names.room_name_id
        JOIN room_types ON room_list.room_type_id = room_types.room_type_id
        WHERE booking_list.user_id = '{$_SESSION['user_id']}'
    ";
    $result = $conn->query($sql);
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
        h1.hh1 , h3.hh1 {
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
            width: 1320px;
            border-collapse: collapse;
        }
        tr td a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
    <title>Your booking</title>
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
    <h1 class="hh1">Your booking</h1>
    <h3 class="hh1">Hello..<?php echo $_SESSION['firstname']; ?>..</h3>
    <h3 class="hh1">id : ..<?php echo $_SESSION['user_id']; ?>..</h3>
    <h3 class="hh1">user : ..<?php echo $_SESSION['username']; ?>..</h3>
    <br>
    <section>
        <table border=1>
            <thead>
                <tr>
                    <th>Booking id</th>
                    <th>Booking date</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Phone number</th>
                    <th>Room number</th>
                    <th>Room name</th>
                    <th>Room type</th>
                    <th>Check in</th>
                    <th>Chech out</th>
                    <th>Number of stay</th>
                    <th>Total point</th>
                    <th>Total price</th>
                    <th>Pay</th>
                    <th>Cancel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $value) {
                        echo  "<tr>
                                    <td>{$value['booking_id']}</td>
                                    <td>{$value['booking_date']}</td>
                                    <td>{$value['firstname']}</td>
                                    <td>{$value['lastname']}</td>
                                    <td>{$value['phone_number']}</td>
                                    <td>{$value['room_number']}</td>
                                    <td>{$value['room_name']}</td>
                                    <td>{$value['room_type_name']}</td>
                                    <td>{$value['check_in']}</td>
                                    <td>{$value['check_out']}</td>
                                    <td>{$value['stay_number']}</td>
                                    <td>{$value['total_point']}</td>
                                    <td>{$value['total_price']}</td>
                                    <td><a href='r_payment_form.php?id={$value['booking_id']}&action=pay'>Pay</a></td>
                                    <td><a href='r_booking.php?id={$value['booking_id']}&action=cancel'>Cancel</a></td>
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