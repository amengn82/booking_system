<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }  // print_r($_POST);

    include_once('./connect.php'); 
?>
<?php
    // Generate report โดยการรับค่าวันที่ที่กำหนด
    $checkinday = isset($_POST['checkinday'])?$_POST['checkinday']:'';
   
    if(isset($_GET['id'])=='') {
    $sql_saleroom = "
        SELECT
            users.firstname, users.lastname, room_list.room_number
        FROM
            payment_list
            JOIN booking_list ON payment_list.booking_id = booking_list.booking_id
            JOIN room_list ON booking_list.room_id = room_list.room_id
            JOIN users ON booking_list.user_id = users.user_id
        WHERE
            booking_list.check_in = '$checkinday'
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
    <title>Admin zone - Daily check-in customer list summary report</title>
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
    <h1 class="hh1">Daily check-in customer list summary report on <?php echo $checkinday ?></h1><br>
    <section>
        <table border=1 id="table2excel">
        <thead>
                <tr>
                    <th>Number</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Room name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $num=0;
                    foreach($result as $value){
                        $num++;
                        echo "<tr>
                                <td>{$num}</td>
                                <td>{$value['firstname']}</td>
                                <td>{$value['lastname']}</td>
                                <td>{$value['room_number']}</td>
                             </tr>";
                    }
                ?>
            </tbody>
        </table>
    </section><br>
    <section>
        <button class="export">Export</button>
    </section><br>
    <section>
        <a class="backclick1" href="admin_checkin_input.php">Back</a>
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
                filename: "Daily check-in customer list summary report", //do not include extension
                fileext: ".xls" // file extension
            }); 
        });
    </script>
</body>
</html>