<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
       
    include_once('./connect.php'); 
?>
<?php
    //Add User
    $user_id = isset($_POST['user_id'])?$_POST['user_id']:'';

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
    <title>Admin zone - subscribers</title>
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
        $sql_subscriber_insert = "
                    INSERT INTO subscribers (
                        subscribers.user_id
                    )VALUES(
                        $user_id
                    )
        ";
        $result = $conn->query($sql_subscriber_insert);
        echo "<br><h1>Saved successfully</h1><br>";
        echo "<a href='a_subscriber.php'>Back to subscriber page</a>";
        }

    // Edit
    if(isset($_GET['id']) && $_GET['action'] == 'edit') {
        $sql_subscriber_update = "
                    UPDATE 
                        subscribers 
                    SET
                        subscribers.user_id = '$user_id'
                    WHERE
                        subscribers.subscriber_id = $id
        ";
    $result = $conn->query($sql_subscriber_update);
    echo "<br><h1>Edited successfully</h1><br>";
    echo "<a href='a_subscriber.php'>Back to subscriber page</a>";
    }

    // Delete
    if(isset($_GET['id']) && $_GET['action'] == 'delete') {
        $sql_subscriber_delete = "
                    DELETE
                    FROM
                        subscribers
                    WHERE
                        subscribers.subscriber_id = $id
        ";
    $result = $conn->query($sql_subscriber_delete);
    echo "<br><h1>Deleted successfully</h1><br>";
    echo "<a href='a_subscriber.php'>Back to subscriber page</a>";
    }    
    ?> 
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>