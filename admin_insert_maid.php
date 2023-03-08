<?php 
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
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
        section {
            text-align: center;
            color: black;
        }
    </style>
    <title>Admin zone - Insert maids</title>
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
        <h1>Information form of maid</h1><br>
        <form action="admin_r_form3.php" method="POST">
            <label for="maid_firstname">Firstname :</label><br>
            <input type="text" name="maid_firstname" id="maid_firstname" required><br><br>

            <label for="maid_lastname">Lastname :</label><br>
            <input type="text" name="maid_lastname" id="maid_lastname" required><br><br>

            <label for="maid_birthdate">Birthdate :</label><br>
            <input type="date" name="maid_birthdate" id="maid_birthdate" required><br><br>

            <label for="maid_gender">Gender</label><br>
            <input type="radio" name="maid_gender" id="gender" value="male" checked> Male
            <input type="radio" name="maid_gender" id="gender" value="female"> Female
            <br><br>
     
            <label for="maid_phone">Phone number :</label><br>
            <input type="tel" name="maid_phone" id="maid_phone" required><br><br>

            <label for="maid_email">Email :</label><br>
            <input type="maid_email" name="maid_email" id="maid_email" required><br><br>

            <label for="maid_salary">Salary :</label><br>
            <input type="number" name="maid_salary" id="maid_salary" required><br><br>

            <label for="benefit_id">Benefit id :</label><br>
            <input type="number" name="benefit_id" id="benefit_id" required><br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>
