<?php 
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
    
    include_once('./connect.php'); 
?>
<?php
    $sql_benifits = "
            SELECT * 
            FROM
                benifits
    ";
    $result = $conn->query($sql_benifits);
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
            color: white;
        }
        .add {
            margin-left: 228px;
        }
        .add .addbenifit {
            color: white;
            text-decoration: none;
        }
        table {
            text-align: center;
            color: black;
            margin: 0px auto;
            background-color: gray;
            border: black;
        }
        table, th, td {
            width: 900px;
            border-collapse: collapse;
        }
        tr td a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
    <title>Admin zone - Benifits</title>
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
        <a class='addbenifit' href="admin_insert_benifit.php">Add benifit</a>
    </section>
    <section>
        <table border=1>
            <thead>
                <tr>
                    <th>Benifit id</th>
                    <th>Lunch offer</th>
                    <th>Rent house offer</th>
                    <th>Traveling offer</th>
                    <th>Social security paying (%)</th>
                    <th>Withholding tax paying (%)</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($result as $value) {
                    echo "<tr>
                            <td>{$value['benifit_id']}</td>
                            <td>{$value['lunch_offer']}</td>
                            <td>{$value['renthouse_offer']}</td>
                            <td>{$value['traveling_offer']}</td>
                            <td>{$value['social_security']}</td>
                            <td>{$value['withholding_tax']}</td>
                            <td><a href='admin_edit_benifit.php?id={$value['benifit_id']}&action=edit'>Edit</a></td>
                            <td><a href='admin_r_form10.php?id={$value['benifit_id']}&action=delete'>Delete</a></td>
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
