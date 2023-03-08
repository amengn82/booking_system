<?php 
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }

    include_once('./connect.php'); ?>
<?php
    $sql_payment_list = "
            SELECT * 
            FROM
                payment_list
    ";
    $result = $conn->query($sql_payment_list);
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
        .add {
            margin-left: 137px;
        }
        .add .addpayment {
            color: black;
            text-decoration: none;
        }
        table {
            text-align: center;
            color: black;
            margin: 0px auto;
            background-color: white;
            border: black;
        }
        table, th, td {
            width: 1200px;
            border-collapse: collapse;
        }
        tr td a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
    <title>Admin zone - Payment list</title>
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
    <section class='add'>
        <a class='addpayment' href="r_payment_form.php">Add payment list</a>
    </section>
    <section>
        <table border=1>
            <thead>
                <tr>
                    <th>Payment id</th>
                    <th>Payment date</th>
                    <th>Booking id</th>
                    <th>Creditcard number</th>
                    <th>Holder name</th>
                    <th>Expiry month</th>
                    <th>Expiry year</th>
                    <th>Payment_status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($result as $value) {
                    echo "<tr>
                            <td>{$value['payment_id']}</td>
                            <td>{$value['payment_date']}</td>
                            <td>{$value['booking_id']}</td>
                            <td>{$value['creditcard_number']}</td>
                            <td>{$value['holder_name']}</td>
                            <td>{$value['expiry_month']}</td>
                            <td>{$value['expiry_year']}</td>
                            <td>{$value['payment_status']}</td>
                            <td><a href='admin_edit_payment.php?id={$value['payment_id']}&action=edit'>Edit</a></td>
                            <td><a href='admin_r_form9.php?id={$value['payment_id']}&action=delete'>Delete</a></td>
                        </tr>";
                }
            ?>
            </tbody>
        </table>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>