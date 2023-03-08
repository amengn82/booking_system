<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
       
    include_once('./connect.php'); 
?>
<?php
    //Add User
    $room_status_name = isset($_POST['room_status_name'])?$_POST['room_status_name']:'';

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
    <title>Admin zone - room status</title>
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
        $sql_room_status_insert = "
                    INSERT INTO room_status (
                        room_status.room_status_name
                       
                    )VALUES(
                        '$room_status_name'
                    )
        ";
        $result = $conn->query($sql_room_status_insert);
        echo "<br><h1>Saved successfully</h1><br>";
        echo "<a href='a_roomstatus.php'>Back to room status page</a>";
        }

    // Edit
    if(isset($_GET['id']) && $_GET['action'] == 'edit') {
        $sql_room_status_update = "
            UPDATE room_status SET
                room_status.room_status_name = '$room_status_name'
            WHERE
                room_status.room_status_id = $id
        ";
    $result = $conn->query($sql_room_status_update);
    echo "<br><h1>Edited successfully</h1><br>";
    echo "<a href='a_roomstatus.php'>Back to room name page</a>";
    }

    // Delete
    if(isset($_GET['id']) && $_GET['action'] == 'delete') {
        $sql_room_status_delete = "
                    DELETE
                    FROM
                        room_status
                    WHERE
                    room_status.room_status_id = $id
        ";
    $result = $conn->query($sql_room_status_delete);
    echo "<br><h1>Deleted successfully</h1><br>";
    echo "<a href='a_roomstatus.php'>Back to room name page</a>";
    }    
    ?> 
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>