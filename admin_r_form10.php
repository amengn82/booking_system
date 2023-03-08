<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }

    include_once('./connect.php'); 
?>
<?php
    //Add User
    $lunch_offer = isset($_POST['lunch_offer'])?$_POST['lunch_offer']:'';
    $renthouse_offer = isset($_POST['renthouse_offer'])?$_POST['renthouse_offer']:'';
    $traveling_offer = isset($_POST['traveling_offer'])?$_POST['traveling_offer']:'';
    $social_security = isset($_POST['social_security'])?$_POST['social_security']:'';
    $withholding_tax = isset($_POST['withholding_tax'])?$_POST['withholding_tax']:'';

    // รับเพิ่มมาจากหน้า edit และ delete
    $id = isset($_GET['id'])?$_GET['id']:'';
    $action = isset($_GET['action'])?$_GET['action']:'';
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
    <title>Admin zone - benefits</title>
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
    if(isset($_GET['id'])=='') {
        $sql_benefit_insert = "
                    INSERT INTO benefits (
                        benefits.lunch_offer,
                        benefits.renthouse_offer,
                        benefits.traveling_offer,
                        benefits.social_security,
                        benefits.withholding_tax
                    )VALUES(
                        '$lunch_offer',
                        '$renthouse_offer',
                        '$traveling_offer',
                        '$social_security',
                        '$withholding_tax'
                    )
        ";
        $result = $conn->query($sql_benefit_insert);
        echo "<br><h1>Saved successfully</h1><br>";
        echo "<a href='a_benefits.php'>Back to benefit page</a>";
        }

    // Edit
    if(isset($_GET['id']) && $_GET['action'] == 'edit') {
    $sql_benefit_update = "
            UPDATE benefits SET
                benefits.lunch_offer = '$lunch_offer',
                benefits.renthouse_offer = '$renthouse_offer',
                benefits.traveling_offer = '$traveling_offer',
                benefits.social_security = '$social_security',
                benefits.withholding_tax = '$withholding_tax'
            WHERE
                benefits.benefit_id = $id
        ";
    $result = $conn->query($sql_benefit_update);
    echo "<br><h1>Edited successfully</h1><br>";
    echo "<a href='a_benefits.php'>Back to benefit page</a>";
    }

    // Delete
    if(isset($_GET['id']) && $_GET['action'] == 'delete') {
        $sql_benefit_delete = "
                    DELETE
                    FROM
                        benefit
                    WHERE
                        benefits.benefit_id = $id
        ";
    $result = $conn->query($sql_benefit_delete);
    echo "<br><h1>Deleted successfully</h1><br>";
    echo "<a href='a_benefits.php'>Back to benefit page</a>";
    }    
    ?> 
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>