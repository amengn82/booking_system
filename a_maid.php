<?php 
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
    
    include_once('./connect.php'); 
?>
<?php
    $sql_maids = "
            SELECT * 
            FROM
                maids
    ";
    $result = $conn->query($sql_maids);
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
            margin-left: 286px;
        }
        .add .addmaid {
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
            width: 900px;
            border-collapse: collapse;
        }
        tr td a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
    <title>Admin zone - Maids</title>
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
        <a class='addmaid' href="admin_insert_maid.php">Add maid</a>
    </section>
    <section>
        <table border=1>
            <thead>
                <tr>
                    <th>Maid id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Birthdate</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>Benefit id</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($result as $value) {
                    echo "<tr>
                            <td>{$value['maid_id']}</td>
                            <td>{$value['maid_firstname']}</td>
                            <td>{$value['maid_lastname']}</td>
                            <td>{$value['maid_birthdate']}</td>
                            <td>{$value['maid_gender']}</td>
                            <td>{$value['maid_phone']}</td>
                            <td>{$value['maid_email']}</td>
                            <td>{$value['maid_salary']}</td>
                            <td>{$value['benefit_id']}</td>
                            <td><a href='admin_edit_maid.php?id={$value['maid_id']}&action=edit'>Edit</a></td>
                            <td><a href='admin_r_form3.php?id={$value['maid_id']}&action=delete'>Delete</a></td>
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
