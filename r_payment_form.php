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
    <title>Your payment</title>
    <style>
        section {
            text-align: center;
            color: black;
        }
    </style>
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
        <h1>Payment form </h1><br>
        <form action="r_paid.php?id=<?php echo $id; ?>&action=pay" method="POST">
        
            <label for="booking_id">Booking id :</label><br>
            <input type="text" name="booking_id" id="booking_id" disabled value="<?php echo isset($id)?$id:''; ?>"><br><br>

            <label for="creditcard_number">Creditcard number :</label><br>
            <input type="text" name="creditcard_number" id="creditcard_number" pattern="[0-9]{16}" maxlength="16" required><br><br>

            <label for="holder_name">Holder name :</label><br>
            <input type="text" name="holder_name" id="holder_name" required><br><br>

            <label for="expiry_date">Expiry date :</label><br>
            <input type="text" name="expiry_month" id="expiry_month" pattern="[0-9]{2}" maxlength="2" placeholder="mm" size="5" required>
            <a>/</a>
            <input type="text" name="expiry_year" id="expiry_year" pattern="[0-9]{2}" maxlength="2" placeholder="yy" size="5" required><br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>