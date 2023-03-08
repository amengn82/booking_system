<?php
    session_start();
    if(empty($_SESSION['username']) || empty($_SESSION['password'])) {
         header('location: login.php');
     }

    include_once('./connect.php'); 
?>
<?php
    $id = isset($_GET['id'])?$_GET['id']:'';
    $action = isset($_GET['action'])?$_GET['action']:'';
    $creditcard_number = isset($_POST['creditcard_number'])?$_POST['creditcard_number']:'';
    $holder_name = isset($_POST['holder_name'])?$_POST['holder_name']:'';
    $expiry_month = isset($_POST['expiry_month'])?$_POST['expiry_month']:'';
    $expiry_year = isset($_POST['expiry_year'])?$_POST['expiry_year']:'';
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
    <title>Your payment result</title>
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
        <?php
        if(isset($_GET['id']) && $_GET['action'] == 'pay') {
            $sql_payment_insert = "
                        INSERT INTO payment_list (
                            payment_list.booking_id,
                            payment_list.creditcard_number,
                            payment_list.holder_name,
                            payment_list.expiry_month,
                            payment_list.expiry_year
                        )VALUES(
                             $id,
                            '$creditcard_number',
                            '$holder_name',
                            '$expiry_month',
                            '$expiry_year'
                        )
                ";
            $result = $conn->query($sql_payment_insert);
            echo "<br><h1>Paid successfully</h1><br>";
            echo "<a href='payment.php'>See your payment</a>";
            }
        ?>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>