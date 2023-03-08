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
                    room_list
                WHERE
                    room_list.room_id = $id
        ";
        $result = $conn->query($sql);
        //เอาของออกจากกระเป๋าทีละชิ้น
        foreach($result as $value) {
            $room_id = $value['room_id'];
            $room_number = $value['room_number'];
            $room_name_id = $value['room_name_id'];
            $room_type_id = $value['room_type_id'];
            $room_status_id = $value['room_status_id'];
            $clean_date = $value['clean_date'];
            $maid_id = $value['maid_id'];
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
    <title>Admin zone - Edit room list</title>
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
        <h1>Room list edit form</h1><br>
        <form action="admin_r_form7.php?id=<?php echo $id; ?>&action=edit" method="POST">

            <label for="room_number">Room number :</label><br>
            <input type="numnber" name="room_number" id="room_number" value="<?php echo isset($room_number)?$room_number:''; ?>" required><br><br>

            <label for="room_name_id">Room name id :</label><br>
            <input type="number" name="room_name_id" id="room_name_id" value="<?php echo isset($room_name_id)?$room_name_id:''; ?>" required><br><br>

            <label for="room_type_id">Room type id :</label><br>
            <input type="number" name="room_type_id" id="room_type_id" value="<?php echo isset($room_type_id)?$room_type_id:''; ?>" required><br><br>

            <label for="room_status_id">Room status id :</label><br>
            <input type="number" name="room_status_id" id="room_status_id" value="<?php echo isset($room_status_id)?$room_status_id:''; ?>" required><br><br>

            <label for="clean_date">Clean date :</label><br>
            <input type="date" name="clean_date" id="clean_date" value="<?php echo isset($clean_date)?$clean_date:''; ?>" required><br><br>

            <label for="maid_id">Maid id :</label><br>
            <input type="number" name="maid_id" id="maid_id" value="<?php echo isset($maid_id)?$maid_id:''; ?>" required><br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>