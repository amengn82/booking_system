<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }

    include_once('./connect.php'); 
?>
<?php
    //Add User
    $maid_firstname = isset($_POST['maid_firstname'])?$_POST['maid_firstname']:'';
    $maid_lastname = isset($_POST['maid_lastname'])?$_POST['maid_lastname']:'';
    $maid_birthdate = isset($_POST['maid_birthdate'])?$_POST['maid_birthdate']:'';
    $maid_gender = isset($_POST['maid_gender'])?$_POST['maid_gender']:'';
    $maid_phone = isset($_POST['maid_phone'])?$_POST['maid_phone']:'';
    $maid_email = isset($_POST['maid_email'])?$_POST['maid_email']:'';
    $maid_salary = isset($_POST['maid_salary'])?$_POST['maid_salary']:'';
    $benefit_id = isset($_POST['benefit_id'])?$_POST['benefit_id']:'';

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
    <title>Admin zone - maids</title>
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
        $sql_maid_insert = "
                    INSERT INTO maids (
                        maids.maid_firstname,
                        maids.maid_lastname,
                        maids.maid_birthdate,
                        maids.maid_gender,
                        maids.maid_phone,
                        maids.maid_email,
                        maids.maid_salary,
                        maids.benefit_id
                    )VALUES(
                        '$maid_firstname',
                        '$maid_lastname',
                        '$maid_birthdate',
                        '$maid_gender',
                        '$maid_phone',
                        '$maid_email',
                        '$maid_salary',
                         $benefit_id
                    )
        ";
        $result = $conn->query($sql_maid_insert);
        echo "<br><h1>Saved successfully</h1><br>";
        echo "<a href='a_maid.php'>Back to maid page</a>";
        }

    // Edit
    if(isset($_GET['id']) && $_GET['action'] == 'edit') {
    $sql_maid_update = "
            UPDATE maids SET
                maids.maid_firstname = '$maid_firstname',
                maids.maid_lastname = '$maid_lastname',
                maids.maid_birthdate = '$maid_birthdate',
                maids.maid_gender = '$maid_gender',
                maids.maid_phone = '$maid_phone',
                maids.maid_email = '$maid_email',
                maids.maid_salary = '$maid_salary',
                maids.benefit_id = '$benefit_id'
            WHERE
                maids.maid_id = $id
        ";
    $result = $conn->query($sql_maid_update);
    echo "<br><h1>Edited successfully</h1><br>";
    echo "<a href='a_maid.php'>Back to maid page</a>";
    }

    // Delete
    if(isset($_GET['id']) && $_GET['action'] == 'delete') {
        $sql_maid_delete = "
                    DELETE
                    FROM
                        maids
                    WHERE
                        maids.maid_id = $id
        ";
    $result = $conn->query($sql_maid_delete);
    echo "<br><h1>Deleted successfully</h1><br>";
    echo "<a href='a_maid.php'>Back to maid page</a>";
    }    
    ?> 
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>