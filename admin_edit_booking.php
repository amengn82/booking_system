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
                    booking_list
                WHERE
                    booking_list.booking_id = $id
        ";
        $result = $conn->query($sql);
        //เอาของออกจากกระเป๋าทีละชิ้น
        foreach($result as $value) {
            $booking_id = $value['booking_id'];
            $booking_date = $value['booking_date'];
            $user_id = $value['user_id'];
            $room_id = $value['room_id'];
            $check_in = $value['check_in'];
            $check_out = $value['check_out'];
            $booking_status = $value['booking_status'];
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
    <title>Admin zone - Edit bookings</title>
</head>
<body>
    <?php require_once("nav_main_admin.php"); ?>
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
    </section><br><br>
    <section>
        <h1>Booking form</h1>
        <form action="admin_r_form8.php?id=<?php echo $id; ?>&action=edit" method="POST">

            <label for="user_id">User id :</label><br>
            <input type="numnber" name="user_id" id="user_id" value="<?php echo isset($user_id)?$user_id:''; ?>" required><br><br>

            <label for="room_id">Room id :</label><br>
            <input type="number" name="room_id" id="room_id" value="<?php echo isset($id)?$id:''; ?>" required><br><br>

            <label for="check_in">Check in :</label><br>
            <input type="date" name="check_in" id="check_in" value="<?php echo isset($check_in)?$check_in:''; ?>" required><br><br>

            <label for="check_out">Check out :</label><br>
            <input type="date" name="check_out" id="check_out" value="<?php echo isset($check_out)?$check_out:''; ?>" required><br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>