<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }

    include_once('./connect.php');
?>
<?php
    // ตั้งตัวแปรต่างๆที่ได้มาจากฟอร์ม edit และที่เหมือนกับตัวแปรตอนที่จะ insert
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

    // รับเพิ่มมาจากตอนกดปุ่ม edit และ delete
    $id = isset($_GET['id'])?$_GET['id']:'';
    $action = isset($_GET['action'])?$_GET['action']:'';

    // ตัวแปรใหม่ที่ได้มาเพิ่มจากฟอร์ม edit
    $hidden_prof_img = isset($_POST['hidden_prof_img'])?$_POST['hidden_prof_img']:'';
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
    <title>Admin zone - users</title>
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
        <?php
    // Edit
    if(isset($_GET['id']) && $_GET['action'] == 'edit') {
        if(is_uploaded_file($temp)) {
            move_uploaded_file($temp,'upload/images/'.$profile_image);
            if($hidden_prof_img != 'none.png') {
                @unlink('upload/images/'.$hidden_prof_img);
            }
        }else {
            $profile_image = $hidden_prof_img;
        } 
    $sql_user_update = "
            UPDATE users SET
                users.profile_image = '$profile_image',
                users.username = '$username',
                users.password = '$password',
                users.firstname = '$firstname',
                users.lastname = '$lastname',
                users.birthdate = '$birthdate',
                users.gender = '$gender',
                users.phone_number = '$phone_number',
                users.email = '$email'
            WHERE
                users.user_id = $id
        ";
    $result = $conn->query($sql_user_update);
    echo "<br><h1>Edited successfully</h1><br>";
    echo "<a href='a_user.php'>Back to user page</a>";
    }

    // Delete
    if(isset($_GET['id']) && $_GET['action'] == 'delete') {
        $sql_user_delete = "
                    DELETE
                    FROM
                        users
                    WHERE
                        users.user_id = $id
        ";
    $result = $conn->query($sql_user_delete);
    echo "<br><h1>Deleted successfully</h1><br>";
    echo "<a href='a_user.php'>Back to user page</a>";
    }   
    ?> 
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>

