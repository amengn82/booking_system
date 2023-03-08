<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }
       
    include_once('./connect.php'); 
?>
<?php
    //ทดสอบการรับค่า
        //echo $_GET['id'];
        //echo $_GET['action'];
    //รับค่าจริงๆละ
        $id = isset($_GET['id'])?$_GET['id']:'';
        $action = isset($_GET['action'])?$_GET['action']:'';

        $sql = "
                SELECT *
                FROM
                    subscribers
                WHERE
                    subscribers.subscriber_id = $id
        ";
        $result = $conn->query($sql);
        //เอาของออกจากกระเป๋าทีละชิ้น
        foreach($result as $value) {
            $subscriber_id = $value['subscriber_id'];
            $user_id = $value['user_id'];
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
    <title>Admin zone - Edit subscribers</title>
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
        <h1>Subscriber edit form</h1><br>
        <form action="admin_r_form2.php?id=<?php echo $id; ?>&action=edit" method="POST">
            <label for="user_id">Enter the new number :</label><br>
            <input type="number" name="user_id" id="user_id" value="<?php echo isset($user_id)?$user_id:''; ?>" required>
            <input type="submit" value="edit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>