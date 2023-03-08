<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }  // print_r($_POST);

    include_once('./connect.php'); 
?>
<?php
    if(isset($_GET['id'])=='') {
    $sql_earningpoint = "
                SELECT
                    users.user_id,
                    users.firstname,
                    users.lastname,
                    sum(((room_name_point + room_type_point)*DATEDIFF(check_out,check_in))) AS total_point,
                    sum(((room_name_point + room_type_point)*DATEDIFF(check_out,check_in))*0.5) AS amount_money
                FROM
                    payment_list
                    JOIN booking_list ON payment_list.booking_id = booking_list.booking_id
                    JOIN users ON booking_list.user_id = users.user_id
                    JOIN room_list ON booking_list.room_id = room_list.room_id
                    JOIN room_names ON room_list.room_name_id = room_names.room_name_id
                    JOIN room_types ON room_list.room_type_id = room_types.room_type_id
                GROUP BY
                    users.user_id
            ";
            $result = $conn->query($sql_earningpoint);
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
    <title>Admin zone - Customer earning point summary report</title>
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
    <h1 class="hh1">Customer earning point summary report</h1><br>
    <section>
        <table border=1 id="table2excel">
        <thead>
                <tr>
                    <th>User ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Total point</th>
                    <th>Calculated to money<br>(100 points = 50 Bath)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total_point=0;
                    $total_money=0;
                    foreach($result as $value){
                        $total_point = $total_point + $value['total_point'];
                        $total_money = $total_money + $value['amount_money'];
                        echo "<tr>
                                <td>{$value['user_id']}</td>
                                <td>{$value['firstname']}</td>
                                <td>{$value['lastname']}</td>
                                <td>{$value['total_point']}</td>
                                <td>{$value['amount_money']}</td>
                             </tr>";
                    }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total point : <?php echo $total_point ?></td>
                    <td>Total amount of money : <?php echo $total_money ?></td>
                </tr>
            </tbody>
        </table>
    </section><br>
    <section>
        <button class="export">Export</button>
    </section><br>
    <section>
        <a class="backclick1" href="admin_r_point.php">Back</a>
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
                filename: "Customer earning point summary report", //do not include extension
                fileext: ".xls" // file extension
            }); 
        });
    </script>
</body>
</html>