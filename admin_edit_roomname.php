<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
       
    include_once('./connect.php'); 
?>
<?php
    //ทดสอบการรับค่า
        //echo $_GET['id'];
        //echo $_GET['action'];
    //รับค่าจริงๆละ
        $id = isset($_GET['id'])?$_GET['id']:'';
        $action = isset($_GET['action'])?$_GET['action']:'';

        $sql = "
                SELECT *
                FROM
                    room_names
                WHERE
                    room_names.room_name_id = $id
        ";
        $result = $conn->query($sql);
        //เอาของออกจากกระเป๋าทีละชิ้น
        foreach($result as $value) {
            $room_name_id = $value['room_name_id'];
            $room_name = $value['room_name'];
            $room_name_point = $value['room_name_point'];
            $room_name_price = $value['room_name_price'];
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
        section {
            text-align: center;
            color: black;
        }
    </style>
    <title>Admin zone - Edit room names</title>
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
        <h1>Room name edit Form</h1><br>
        <form action="admin_r_form5.php?id=<?php echo $id; ?>&action=edit" method="POST">

            <label for="room_name">Room name :</label><br>
            <input type="text" name="room_name" id="room_name" value="<?php echo isset($room_name)?$room_name:''; ?>" required><br><br>

            <label for="room_name_point">Room name point :</label><br>
            <input type="text" name="room_name_point" id="room_name_point" value="<?php echo isset($room_name_point)?$room_name_point:''; ?>" required><br><br>

            <label for="room_name_price">Room name price :</label><br>
            <input type="text" name="room_name_price" id="room_name_price" value="<?php echo isset($room_name_price)?$room_name_price:''; ?>" required><br><br>
            
            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>