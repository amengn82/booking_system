<?php
    session_start();
    if(empty($_SESSION['username']) || empty($_SESSION['password'])) {
        header('location: login.php');
    }
?>
<?php
    //ทดสอบการรับค่า
        //echo $_GET['id'];
        //echo $_GET['action'];
    //รับค่า
        $id = isset($_GET['id'])?$_GET['id']:'';
        $action = isset($_GET['action'])?$_GET['action']:'';
        $checkin = isset($_GET['check_in'])?$_GET['check_in']:'';
        $checkout = isset($_GET['check_out'])?$_GET['check_out']:'';
    //กำหนดค่า
        $user_id = $_SESSION['user_id'];   
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
    <title>Booking</title>
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
    <section>
        <h1>Booking form</h1><br>
        <form action="r_booking.php?id=<?php echo $id; ?>&check_in=<?php echo $checkin; ?>&check_out=<?php echo $checkout; ?> &action=book" method="POST">

            <label for="user_id">User id :</label><br>
            <input type="numnber" name="user_id" id="user_id" disabled value="<?php echo isset($user_id)?$user_id:''; ?>"><br><br>

            <label for="room_id">Room id :</label><br>
            <input type="number" name="room_id" id="room_id" disabled value="<?php echo isset($id)?$id:''; ?>"><br><br>

            <label for="check_in">Check in :</label><br>
            <input type="date" name="check_in" id="check_in" disabled value="<?php echo isset($checkin)?$checkin:''; ?>"><br><br>

            <label for="check_out">Check out :</label><br>
            <input type="date" name="check_out" id="check_out" disabled value="<?php echo isset($checkout)?$checkout:''; ?>"><br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>