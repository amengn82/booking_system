<?php 
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
    
    include_once('./connect.php'); 
?>
<?php
    $sql_room_types = "
            SELECT * 
            FROM
                room_types
    ";
    $result = $conn->query($sql_room_types);
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
        .add {
            margin-left: 137px;
        }
        .add .addroomtype {
            color: black;
            text-decoration: none;
        }
        table {
            text-align: center;
            color: black;
            margin: 0px auto;
            background-color: white;
            border: black;
        }
        table, th, td {
            width: 1200px;
            border-collapse: collapse;
        }
        tr td a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
    <title>Admin zone - Room types</title>
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
    <section class='add'>
        <a class='addroomtype' href="admin_insert_roomtype.php">Add room type</a>
    </section>
    <section>
        <table border=1>
            <thead>
                <tr>
                    <th>Room type id</th>
                    <th>Room type name</th>
                    <th>Room type point</th>
                    <th>Room type price</th>
                    <th>Max capacity</th>
                    <th>Breakfast option</th>
                    <th>Smoke option</th>
                    <th>Pickup option</th>
                    <th>Refund option</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($result as $value) {
                    echo "<tr>
                            <td>{$value['room_type_id']}</td>
                            <td>{$value['room_type_name']}</td>
                            <td>{$value['room_type_point']}</td>
                            <td>{$value['room_type_price']}</td>
                            <td>{$value['max_capacity']}</td>
                            <td>{$value['breakfast_option']}</td>
                            <td>{$value['smoke_option']}</td>
                            <td>{$value['pickup_option']}</td>
                            <td>{$value['refund_option']}</td>
                            <td><a href='admin_edit_roomtype.php?id={$value['room_type_id']}&action=edit'>Edit</a></td>
                            <td><a href='admin_r_form4.php?id={$value['room_type_id']}&action=delete'>Delete</a></td>
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
