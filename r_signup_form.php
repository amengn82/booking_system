<?php
    include_once('./connect.php'); 
?>
<?php
    // User
    $profile_image = isset($_FILES['profile_image']['name'])?$_FILES['profile_image']['name']:'';
    $temp = isset($_FILES['profile_image']['tmp_name'])?$_FILES['profile_image']['tmp_name']:'';
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $firstname = isset($_POST['firstname'])?$_POST['firstname']:'';
    $lastname = isset($_POST['lastname'])?$_POST['lastname']:'';
    $birthdate = isset($_POST['birthdate'])?$_POST['birthdate']:'';
    $gender = isset($_POST['gender'])?$_POST['gender']:'';
    $phone_number = isset($_POST['phone_number'])?$_POST['phone_number']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';
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
    <title>Sign up result</title>
</head>
<body>
    <?php require_once("nav_main.php"); ?>
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
        <?php
        if(isset($_GET['id'])=='') {
            if(is_uploaded_file($temp)) {
                move_uploaded_file($temp,'upload/images/'.$profile_image);
            }else { 
                $profile_image = 'none.png';
            }
            $sql_user_insert = "
                        INSERT INTO users (
                            users.profile_image, users.username, users.password, 
                            users.firstname, users.lastname, users.birthdate, 
                            users.gender, users.phone_number, users.email
                        )VALUES(
                            '$profile_image',
                            '$username',
                            '$password',
                            '$firstname',
                            '$lastname',
                            '$birthdate',
                            '$gender',
                            '$phone_number',
                            '$email'
                        )
            ";
            $result = $conn->query($sql_user_insert);
            echo "<br><h1>You have been successfully signed up</h1><br>";
            echo "<a href='index.php'>Back to main menu</a>";
            }
        ?>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>