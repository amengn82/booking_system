<?php
    session_start();
    if(empty($_SESSION['username']) || empty($_SESSION['password'])) {
          header('location: login.php');
    }  // print_r($_POST);

    include_once('./connect.php'); 
?>
<?php
        // Generate report โดยการรับค่าวันเและเวลาของวันแรกและวันสุดท้าย
        $month = isset($_POST['month']) ? $_POST['month']: '';
        //echo "เดือนที่เริ่มดำเนินการ : ".date('M',strtotime($month))."<br>";
        //echo "<p style='color:white; text-align:center;'>เดือนที่เริ่มดำเนินการ : ".date('M',strtotime($month))."</p>";
        
    if(isset($_GET['id'])=='') {
    $sql_saleroom = "
                SELECT
                    room_types.room_type_name,
                    room_names.room_name,
                    count(room_names.room_name) AS count,
                    sum((((room_name_price + room_type_price) + (room_name_price + room_type_price)*0.1 + ((room_name_price + room_type_price) + (room_name_price + room_type_price)*0.1)*0.07)*DATEDIFF(check_out,check_in))) AS total_price,
                    sum((((room_name_price + room_type_price) + (room_name_price + room_type_price)*0.1 + ((room_name_price + room_type_price) + (room_name_price + room_type_price)*0.1)*0.07)*DATEDIFF(check_out,check_in))/100) AS creditcard_fee
                FROM 
                    payment_list
                    JOIN booking_list ON payment_list.booking_id = booking_list.booking_id
                    JOIN room_list ON booking_list.room_id = room_list.room_id
                    JOIN room_names ON room_list.room_name_id = room_names.room_name_id
                    JOIN room_types ON room_list.room_type_id = room_types.room_type_id 
                WHERE
                    payment_list.payment_date between '$firstday' and '$endday'
                GROUP BY
                    room_types.room_type_name,
                    room_names.room_name
                ORDER BY
                    room_types.room_type_name, 
                    room_names.room_name
            ";
            $result = $conn->query($sql_saleroom);
            //var_dump(mysqli_error($conn)); die();
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
        h1 {
            text-align: center;
            color: black;
        }
        table {
            text-align: center;
            color: black;
            margin: 0px auto;
            background-color: white;
            border: black;
        }
        table, th, td {
            width: 1300px;
            border-collapse: collapse;
        }
        tr td a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
    <title>VAT summary report</title>
</head>
<body>
    <?php require_once("nav_main.php"); ?>
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
    </section><br>
    <h1>VAT summary report on <?php echo date('M',strtotime($month)) ?> to  <?php echo $endday ?></h1><br>
    <section>
        <table border=1>
        <thead>
                <tr>
                    <th>Number</th>
                    <th>Room type</th>
                    <th>Room name</th>
                    <th>Count</th>
                    <th>Total price</th>
                    <th>Credit card fee (1%)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $num=0;
                    $total_room=0;
                    $total_price=0;
                    $total_creditcard_fee=0;
                    foreach($result as $value){
                        $num++;
                        $total_room = $total_room + $value['count'];
                        $total_price =  $total_price + $value['total_price'];
                        $total_creditcard_fee = $total_creditcard_fee + $value['creditcard_fee'];
                        echo "<tr>
                                <td>{$num}</td>
                                <td>{$value['room_type_name']}</td>
                                <td>{$value['room_name']}</td>
                                <td>{$value['count']}</td>
                                <td>{$value['total_price']}</td>
                                <td>{$value['creditcard_fee']}</td>
                             </tr>";
                    }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total number of room  : <?php echo $total_room ?></td>
                    <td>Total price  : <?php echo $total_price ?></td>
                    <td>Total credit card fee : <?php echo $total_creditcard_fee ?></td>
                </tr>
            </tbody>
        </table>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>