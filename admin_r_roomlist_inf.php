<?php 
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }

    include_once('./connect.php');
   
?>
<?php
    if(isset($_GET['search'])) {
        $search = $_GET['search'];
    }else {
        $search = "";
    } 

    if(isset($_GET['id'])=='') {
        $sql_roomlist_information = "
            SELECT  
                room_list.room_id,room_list.room_number,room_names.room_name,
                room_types.room_type_name,room_names.room_name_point,
                room_types.room_type_point,room_names.room_name_price,
                room_types.room_type_price,room_types.max_capacity,
                room_types.breakfast_option,room_types.smoke_option,
                room_types.pickup_option,room_types.refund_option,
                room_status.room_status_name,room_list.clean_date,maids.maid_firstname
            FROM
                room_list
            JOIN room_names ON room_list.room_name_id = room_names.room_name_id
            JOIN room_types ON room_list.room_type_id = room_types.room_type_id
            JOIN room_status ON room_list.room_status_id = room_status.room_status_id
            JOIN maids ON room_list.maid_id = maids.maid_id
            
            WHERE
                room_list.room_id LIKE '%{$search}%'
            OR
                room_list.room_number LIKE '%{$search}%'
            OR 
                room_names.room_name LIKE '%{$search}%'
            OR 
                room_types.room_type_name LIKE '%{$search}%'
            OR
                room_names.room_name_point LIKE '%{$search}%'
            OR
                room_types.room_type_point LIKE '%{$search}%'
            OR
                room_names.room_name_price LIKE '%{$search}%'
            OR
                room_types.room_type_price LIKE '%{$search}%'
            OR
                room_types.max_capacity LIKE '%{$search}%'
            OR
                room_types.breakfast_option LIKE '%{$search}%'
            OR
                room_types.smoke_option LIKE '%{$search}%'
            OR
                room_types.pickup_option LIKE '%{$search}%'
            OR
                room_types.refund_option LIKE '%{$search}%'
            OR 
                room_status.room_status_name LIKE '%{$search}%'
            OR
                room_list.clean_date LIKE '%{$search}%'
            OR
                maids.maid_firstname LIKE '%{$search}%'
            ORDER BY  
                room_list.room_id
    ";
    $result = $conn->query($sql_roomlist_information);
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
        tr td a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .search {
            margin-left: 96px;
        }
        .search label{
            color: black;
        }
        .export {
            margin-left: 96px;
        }
        .backclick1 {
            margin-left: 34px;
            color: black;
            text-decoration: none;
        }
    </style>
    <title>Admin zone - Rooom information summary report</title>
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
    <h1 class="hh1">Rooom information summary report</h1><br>
    <section>
        <form class='search' action="" method="GET">
            <input type="text" name="search" id="search" value="<?php echo $search; ?>">
            <label for="search">Search</label>  
        </form>
    </section><br>
    <section>
        <table border=1 id="table2excel">
            <thead>
                <tr>
                   <th>Rm id</th>
                   <th>Rm number</th>
                   <th>Rm name</th>
                   <th>Rm type</th>
                   <th>Rm name point</th>
                   <th>Rm type point</th>
                   <th>Rm name price</th>
                   <th>Rm type price</th>
                   <th>Max cap</th>
                   <th>Brf opt</th>
                   <th>Smk opt</th>
                   <th>Pkup opt</th>
                   <th>Refn opt</th>
                   <th>Rm status</th>
                   <th>Cln date</th>
                   <th>Maid</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($result as $value) {
                    echo "<tr>
                            <td>{$value['room_id']}</td>
                            <td>{$value['room_number']}</td>
                            <td>{$value['room_name']}</td>
                            <td>{$value['room_type_name']}</td>
                            <td>{$value['room_name_point']}</td>
                            <td>{$value['room_type_point']}</td>
                            <td>{$value['room_name_price']}</td>
                            <td>{$value['room_type_price']}</td>
                            <td>{$value['max_capacity']}</td>
                            <td>{$value['breakfast_option']}</td>
                            <td>{$value['smoke_option']}</td>
                            <td>{$value['pickup_option']}</td>
                            <td>{$value['refund_option']}</td>
                            <td>{$value['room_status_name']}</td>
                            <td>{$value['clean_date']}</td>
                            <td>{$value['maid_firstname']}</td>
                        </tr>";
                }
            ?>
            </tbody>
        </table>
    </section><br>
    <section>
        <button class="export">Export</button>
    </section><br>
    <section><br>
        <a class="backclick1" href="admin_r_roomlist_inf.php">Back</a>
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
                filename: "Rooom information summary report", //do not include extension
                fileext: ".xls" // file extension
            }); 
        });
    </script>
</body>
</html>