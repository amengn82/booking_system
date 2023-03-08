<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }  // print_r($_POST);

    include_once('./connect.php'); 
?>
<?php
    // Generate report โดยการรับค่าวันเและเวลาของวันแรกและวันสุดท้าย
    $firstday = isset($_POST['firstday'])?$_POST['firstday']:'';
    $endday = isset($_POST['endday'])?$_POST['endday']:'';

    $sql = "
        SELECT 
            count(payment_list.payment_id) AS number_of_room
        from
            payment_list
        WHERE
           payment_list.payment_date between '$firstday' and '$endday'
    ";
    $result = $conn->query($sql);

    foreach($result as $value) {
        $number_of_room = $value['number_of_room'];
    }
        
    if(isset($_GET['id'])=='') {
    $sql_saleroom = "
        SELECT
            room_types.room_type_name,
            room_names.room_name,
            count(room_names.room_name) AS count,
            count(room_names.room_name)*100/$number_of_room AS percentage,
            sum((((room_name_price + room_type_price) + (room_name_price + room_type_price)*0.1 + ((room_name_price + room_type_price) + 
            (room_name_price + room_type_price)*0.1)*0.07)*DATEDIFF(check_out,check_in))) AS total_price,
            sum((((room_name_price + room_type_price) + (room_name_price + room_type_price)*0.1)*0.07)*DATEDIFF(check_out,check_in)) AS VAT,
            sum((((room_name_price + room_type_price) + (room_name_price + room_type_price)*0.1 + ((room_name_price + room_type_price) + 
            (room_name_price + room_type_price)*0.1)*0.07)*DATEDIFF(check_out,check_in))/100) AS creditcard_fee,
            sum(
                (((room_name_price + room_type_price) + (room_name_price + room_type_price)*0.1 + ((room_name_price + room_type_price) + 
                (room_name_price + room_type_price)*0.1)*0.07)*DATEDIFF(check_out,check_in)) - (((room_name_price + room_type_price) + 
                (room_name_price + room_type_price)*0.1)*0.07)*DATEDIFF(check_out,check_in) - (((room_name_price + room_type_price) + 
                (room_name_price + room_type_price)*0.1 + ((room_name_price + room_type_price) + 
                (room_name_price + room_type_price)*0.1)*0.07)*DATEDIFF(check_out,check_in))/100
                ) AS income_net
            FROM 
                payment_list
                JOIN booking_list ON payment_list.booking_id = booking_list.booking_id
                JOIN room_list ON booking_list.room_id = room_list.room_id
                JOIN room_names ON room_list.room_name_id = room_names.room_name_id
                JOIN room_types ON room_list.room_type_id = room_types.room_type_id 
            WHERE
                payment_list.payment_date between '$firstday' and '$endday'
            GROUP BY room_types.room_type_name, room_names.room_name
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
    <script src="./export_excel/src/jquery.table2excel.js"></script>
    <style>
        h1.hh1 {
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
        .export {
            margin-left: 86px;
        }
        .backclick1 {
            margin-left: 25px;
            color: black;
            text-decoration: none;
        }
    </style>
    <title>Admin zone - Income summary report</title>
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
    </section><br>
    <h1 class="hh1">Income net summary report since <?php echo $firstday ?> to  <?php echo $endday ?></h1><br>
    <section>
        <table border=1 id="table2excel">
        <thead>
                <tr>
                    <th>Number</th>
                    <th>Room type</th>
                    <th>Room name</th>
                    <th>Count</th>
                    <th>Percentage</th>
                    <th>Total price</th>
                    <th>VAT</th>
                    <th>Credit card fee</th>
                    <th>Income net from selling rooms</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $num=0;
                    $total_room=0;
                    $total_percentage=0;
                    $total_price=0;
                    $total_vat=0;
                    $total_creditcard_fee=0;
                    $total_income_net=0;
                    foreach($result as $value){
                        $num++;
                        $total_room = $total_room + $value['count'];
                        $total_percentage = $total_percentage + $value['percentage'];
                        $total_price =  $total_price + $value['total_price'];
                        $total_vat = $total_vat + $value['VAT'];
                        $total_creditcard_fee = $total_creditcard_fee + $value['creditcard_fee'];
                        $total_income_net = $total_income_net + $value['income_net'];
                        echo "<tr>
                                <td>{$num}</td>
                                <td>{$value['room_type_name']}</td>
                                <td>{$value['room_name']}</td>
                                <td>{$value['count']}</td>
                                <td>{$value['percentage']}</td>
                                <td>{$value['total_price']}</td>
                                <td>{$value['VAT']}</td>
                                <td>{$value['creditcard_fee']}</td>
                                <td>{$value['income_net']}</td>
                             </tr>";
                    }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total sale rooms : <?php echo $total_room ?></td>
                    <td>Total percentage : <?php echo $total_percentage ?></td>
                    <td>Total price : <?php echo $total_price ?></td>
                    <td>Total VAT : <?php echo $total_vat ?></td>
                    <td>Total credit card fee : <?php echo $total_creditcard_fee ?></td>
                    <td>Total income net : <?php echo  $total_income_net ?></td>
                </tr>
            </tbody>
        </table>
    </section><br>
    <section>
        <button class="export">Export</button>
    </section><br>
    <section>
        <a class="backclick1" href="admin_incomenet_input.php">Back</a>
    </section>
    <section>
        <a class="backclick1" href="a_report.php">Go to other reports</a>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');

        $("button").click(function(){
            $("#table2excel").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "Income net summary report", //do not include extension
                fileext: ".xls" // file extension
            }); 
        });
    </script>
</body>
</html>