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
        .signup {
            text-align: center;
            color: black;
            margin-top: 60px;
        }
    </style>
    <title>Sign up</title>
</head>
<body>
    <?php require_once("nav.php"); ?>
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
    </section>
    <section class="signup">
        <h1>Sign up form</h1><br>
        <form action="r_signup_form.php" method="POST" enctype="multipart/form-data">
            <label for="profile_image">Profile image</label><br>
            <input type="file" name="profile_image" id="profile_image"><br><br>

            <label for="username">Username :</label><br>
            <input type="text" name="username" id="username" required><br><br>

            <label for="password">Password :</label><br>
            <input type="password" name="password" id="password" required><br><br>

            <label for="firstname">Firstname :</label><br>
            <input type="text" name="firstname" id="firstname" required><br><br>

            <label for="lastname">Lastname :</label><br>
            <input type="text" name="lastname" id="lastname" required><br><br>

            <label for="birthdate">Birthdate :</label><br>
            <input type="date" name="birthdate" id="birthdate" required><br><br>

            <label for="gender">Gender</label><br>
            <input type="radio" name="gender" id="gender" value="Male" checked> Male
            <input type="radio" name="gender" id="gender" value="Female"> Female
            <br><br>
     
            <label for="phone_number">Phone number :</label><br>
            <input type="tel" name="phone_number" id="phone_number" required><br><br>

            <label for="email">Email :</label><br>
            <input type="email" name="email" id="email" required><br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>