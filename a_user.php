<?php 
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }

    include_once('./connect.php'); ?>
<?php
    $sql_user = "
            SELECT * 
            FROM
                users
    ";
    $result = $conn->query($sql_user);
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
            margin-left: 86px;
        }
        .add .adduser {
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
            width: 1300px;
            border-collapse: collapse;
        }
        tr td a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
    <title>Admin zone - Users</title>
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
        <a class='adduser' href="signup.php">Add user</a>
    </section>
    <section>
        <table border=1>
            <thead>
                <tr>
                    <th>User id</th>
                    <th>Profile image</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Birthdate</th>
                    <th>Gender</th>
                    <th>Phone number</th>
                    <th>E-mail</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($result as $value) {
                    echo "<tr>
                            <td>{$value['user_id']}</td>
                            <td>{$value['profile_image']}</td>
                            <td>{$value['username']}</td>
                            <td>{$value['password']}</td>
                            <td>{$value['firstname']}</td>
                            <td>{$value['lastname']}</td>
                            <td>{$value['birthdate']}</td>
                            <td>{$value['gender']}</td>
                            <td>{$value['phone_number']}</td>
                            <td>{$value['email']}</td>
                            <td><a href='admin_edit_user.php?id={$value['user_id']}&action=edit'>Edit</a></td>
                            <td><a href='admin_r_form1.php?id={$value['user_id']}&action=delete'>Delete</a></td>
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
