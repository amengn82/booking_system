<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
       
    include_once('./connect.php'); 
?>
<?php
    //Add User
    $room_number = isset($_POST['room_number'])?$_POST['room_number']:'';
    $room_name_id = isset($_POST['room_name_id'])?$_POST['room_name_id']:'';
    $room_type_id = isset($_POST['room_type_id'])?$_POST['room_type_id']:'';
    $room_status_id = isset($_POST['room_status_id'])?$_POST['room_status_id']:'';
    $clean_date = isset($_POST['clean_date'])?$_POST['clean_date']:'';
    $maid_id = isset($_POST['maid_id'])?$_POST['maid_id']:'';

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
    <title>Admin zone - room list</title>
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
        $sql_room_list_insert = "
                    INSERT INTO room_list (
                        room_list.room_number,
                        room_list.room_name_id,
                        room_list.room_type_id,
                        room_list.room_status_id,
                        room_list.clean_date,
                        room_list.maid_id
                    )VALUES(
                        '$room_number',
                         $room_name_id,
                         $room_type_id,
                         $room_status_id,
                        '$clean_date',
                         $maid_id
                    )
        ";
        $result = $conn->query($sql_room_list_insert);
        echo "<br><h1>Saved successfully</h1><br>";
        echo "<a href='a_roomlist.php'>Back to room status page</a>";
        }

    // Edit
    if(isset($_GET['id']) && $_GET['action'] == 'edit') {
        $sql_room_list_update = "
            UPDATE room_list SET
                room_list.room_number = '$room_number',
                room_list.room_name_id = '$room_name_id',
                room_list.room_type_id = '$room_type_id',
                room_list.room_status_id = '$room_status_id',
                room_list.clean_date = '$clean_date',
                room_list.maid_id = '$maid_id'
            WHERE
                room_list.room_id = $id
        ";
    $result = $conn->query($sql_room_list_update);
    echo "<br><h1>Edited successfully</h1><br>";
    echo "<a href='a_roomlist.php'>Back to room name page</a>";
    }

    // Delete
    if(isset($_GET['id']) && $_GET['action'] == 'delete') {
        $sql_room_status_delete = "
                    DELETE
                    FROM
                        room_list
                    WHERE
                    room_list.room_id = $id
        ";
    $result = $conn->query($sql_room_status_delete);
    echo "<br><h1>Deleted successfully</h1><br>";
    echo "<a href='a_roomlist.php'>Back to room name page</a>";
    }    
    ?> 
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>