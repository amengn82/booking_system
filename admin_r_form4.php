<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
       
    include_once('./connect.php'); 
?>
<?php
    //Add User
    $room_type_name = isset($_POST['room_type_name'])?$_POST['room_type_name']:'';
    $room_type_point = isset($_POST['room_type_point'])?$_POST['room_type_point']:'';
    $room_type_price = isset($_POST['room_type_price'])?$_POST['room_type_price']:'';
    $max_capacity = isset($_POST['max_capacity'])?$_POST['max_capacity']:'';
    $breakfast_option = isset($_POST['breakfast_option'])?$_POST['breakfast_option']:'';
    $smoke_option = isset($_POST['smoke_option'])?$_POST['smoke_option']:'';
    $pickup_option = isset($_POST['pickup_option'])?$_POST['pickup_option']:'';
    $refund_option = isset($_POST['refund_option'])?$_POST['refund_option']:'';

    // รับเพิ่มมาจากหน้า edit และ delete
    $id = isset($_GET['id'])?$_GET['id']:'';
    $action = isset($_GET['action'])?$_GET['action']:'';
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
    <title>Admin zone - room types</title>
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
    if(isset($_GET['id'])=='') {
        $sql_room_type_insert = "
                    INSERT INTO room_types (
                        room_types.room_type_name,
                        room_types.room_type_point,
                        room_types.room_type_price,
                        room_types.max_capacity,
                        room_types.breakfast_option,
                        room_types.smoke_option,
                        room_types.pickup_option,
                        room_types.refund_option
                    )VALUES(
                        '$room_type_name',
                        '$room_type_point',
                        '$room_type_price',
                        '$max_capacity',
                        '$breakfast_option',
                        '$smoke_option',
                        '$pickup_option',
                        '$refund_option'
                    )
        ";
        $result = $conn->query($sql_room_type_insert);
        echo "<br><h1>Saved successfully</h1><br>";
        echo "<a href='a_roomtype.php'>Back to room type page</a>";
        }

    // Edit
    if(isset($_GET['id']) && $_GET['action'] == 'edit') {
    $sql_room_type_update = "
            UPDATE room_types SET
                room_types.room_type_name = '$room_type_name',
                room_types.room_type_point = '$room_type_point',
                room_types.room_type_price = '$room_type_price',
                room_types.max_capacity = '$max_capacity',
                room_types.breakfast_option = '$breakfast_option',
                room_types.smoke_option = '$smoke_option',
                room_types.pickup_option = '$pickup_option',
                room_types.refund_option = '$refund_option'
            WHERE
                room_types.room_type_id = $id
        ";
    $result = $conn->query($sql_room_type_update);
    echo "<br><h1>Edited successfully</h1><br>";
    echo "<a href='a_roomtype.php'>Back to room type page</a>";
    }

    // Delete
    if(isset($_GET['id']) && $_GET['action'] == 'delete') {
        $sql_room_type_delete = "
                    DELETE
                    FROM
                        room_types
                    WHERE
                        room_types.room_type_id = $id
        ";
    $result = $conn->query($sql_room_type_delete);
    echo "<br><h1>Deleted successfully</h1><br>";
    echo "<a href='a_roomtype.php'>Back to room type page</a>";
    }    
    ?> 
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>