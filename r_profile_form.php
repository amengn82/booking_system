<?php
    session_start();
    if(empty($_SESSION['username']) || empty($_SESSION['password'])) {
         header('location: login.php');
    }

    include_once('./connect.php');
?>
<?php
    //ทดสอบการรับค่า
        //echo $_GET['id']."<br>";
        //echo $_GET['action']."<br>";
    //รับค่าจริงๆละ
        $id = isset($_GET['id'])?$_GET['id']:'';
        $action = isset($_GET['action'])?$_GET['action']:'';

        $sql = "
                SELECT *
                FROM
                    users
                WHERE
                    users.user_id = '$id'
        ";
        $result = $conn->query($sql);
        //เอาของออกจากกระเป๋าทีละชิ้น
        foreach($result as $value) {
            $user_id = $value['user_id'];
            $profile_image = $value['profile_image'];
            $username = $value['username'];
            $password = $value['password'];
            $firstname = $value['firstname'];
            $lastname = $value['lastname'];
            $birthdate = $value['birthdate'];
            $gender = $value['gender'];
            $phone_number = $value['phone_number'];
            $email = $value['email'];
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
            margin: 0px auto;
            border: black;
        }
    </style>
    <title>Your profile</title>
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
        <h1>Profile Edit Form</h1>
        <form action="r_edit_profile.php?id=<?php echo $id; ?>&action=edit" method="POST" enctype="multipart/form-data">
            <label for="profile_image">Profile image</label><br>
            <input type="file" name="profile_image" id="profile_image"><br><br>
            <input type="hidden" name="hidden_prof_img" id="hidden_prof_img" value="<?php echo isset($profile_image)?$profile_image:''; ?>"><br>
            <img width="100px" src="./upload/images/<?php echo $profile_image; ?>" alt=""><br><br>

            <label for="username">Username :</label><br>
            <input type="text" name="username" id="username" value="<?php echo isset($username)?$username:''; ?>"><br><br>

            <label for="password">Password :</label><br>
            <input type="password" name="password" id="password" value="<?php echo isset($password)?$password:''; ?>"><br><br>

            <label for="firstname">Firstname :</label><br>
            <input type="text" name="firstname" id="firstname" value="<?php echo isset($firstname)?$firstname:''; ?>"><br><br>

            <label for="lastname">Lastname :</label><br>
            <input type="text" name="lastname" id="lastname" value="<?php echo isset($lastname)?$lastname:''; ?>"><br><br>

            <label for="birthdate">Birthdate :</label><br>
            <input type="date" name="birthdate" id="birthdate" value="<?php echo isset($birthdate)?$birthdate:''; ?>"><br><br>

            <label for="gender">Gender</label><br>
            <?php
                $maleChecked = '';
                if($gender == 'Male') {
                    $maleChecked = 'checked';
                } 
                $femaleChecked = '';
                if($gender == 'Female') {
                    $femaleChecked = 'checked';
                }
                echo "<input type='radio' name='gender' id='gender' value='Male' $maleChecked> Male";
                echo "<input type='radio' name='gender' id='gender' value='Female' $femaleChecked>  Female";
            ?>
            <br><br>
       
            <label for="phone_number">Phone number :</label><br>
            <input type="tel" name="phone_number" id="phone_number" value="<?php echo isset($phone_number)?$phone_number:''; ?>"><br><br>

            <label for="email">Email :</label><br>
            <input type="email" name="email" id="email" value="<?php echo isset($email)?$email:''; ?>"><br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>