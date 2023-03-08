<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
       
    include_once('./connect.php'); 
?>
<?php

    // รับมาตอนกดปุ่ม edit และ delete
    $id = isset($_GET['id'])?$_GET['id']:'';
    $action = isset($_GET['action'])?$_GET['action']:'';

    $payment_id = isset($_POST['payment_id'])?$_POST['payment_id']:'';
    $payment_date = isset($_POST['payment_date'])?$_POST['payment_date']:'';
    $booking_id = isset($_POST['booking_id'])?$_POST['booking_id']:'';
    $creditcard_number = isset($_POST['creditcard_number'])?$_POST['creditcard_number']:'';
    $holder_name = isset($_POST['holder_name'])?$_POST['holder_name']:'';
    $expiry_month = isset($_POST['expiry_month'])?$_POST['expiry_month']:'';
    $expiry_year = isset($_POST['expiry_year'])?$_POST['expiry_year']:'';
    $payment_status = isset($_POST['payment_status'])?$_POST['payment_status']:'';
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
    <title>Admin zone - payment list</title>
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
    // Edit
    if(isset($_GET['id']) && $_GET['action'] == 'edit') {
        $sql_paymentlist_update = "
            UPDATE payment_list SET
                payment_list.creditcard_number = '$creditcard_number',
                payment_list.holder_name = '$holder_name',
                payment_list.expiry_month = '$expiry_month',
                payment_list.expiry_year = '$expiry_year'
            WHERE
                payment_list.payment_id = $id
        ";
    $result = $conn->query($sql_paymentlist_update);
    echo "<br><h1>Edited successfully</h1><br>";
    echo "<a href='a_paymentlist.php'>Back to payment list page</a>";
    }
    // Delete
    if(isset($_GET['id']) && $_GET['action'] == 'delete') {
        $sql_bookinglist_delete = "
                    DELETE
                    FROM
                        payment_list
                    WHERE
                        payment_list.payment_id = $id
        ";
    $result = $conn->query($sql_bookinglist_delete);
    echo "<br><h1>Deleted successfully</h1><br>";
    echo "<a href='a_paymentlist.php'>Back to payment list page</a>";
    }    
    ?> 
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>