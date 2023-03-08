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
                    room_types
                WHERE
                    room_types.room_type_id = $id
        ";
        $result = $conn->query($sql);
        //เอาของออกจากกระเป๋าทีละชิ้น
        foreach($result as $value) {
            $room_type_id = $value['room_type_id'];
            $room_type_name = $value['room_type_name'];
            $room_type_point = $value['room_type_point'];
            $room_type_price = $value['room_type_price'];
            $smoke_option = $value['smoke_option'];
            $breakfast_option = $value['breakfast_option'];
            $max_capacity = $value['max_capacity'];
            $pickup_option = $value['pickup_option'];
            $refund_option = $value['refund_option'];
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
    <title>Admin zone - Room types</title>
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
        <h1>Room type edit form</h1><br>
        <form action="admin_r_form4.php?id=<?php echo $id; ?>&action=edit" method="POST">

            <label for="room_type_name">Room type name :</label><br>
            <input type="text" name="room_type_name" id="room_type_name" value="<?php echo isset($room_type_name)?$room_type_name:''; ?>" required><br><br>

            <label for="room_type_point">Room type point :</label><br>
            <input type="number" name="room_type_point" id="room_type_point" value="<?php echo isset($room_type_point)?$room_type_point:''; ?>" required><br><br>

            <label for="room_type_price">Room type price :</label><br>
            <input type="number" name="room_type_price" id="room_type_price" value="<?php echo isset($room_type_price)?$room_type_price:''; ?>" required><br><br>

            <label for="max_capacity">Max capacity :</label><br>
            <input type="number" name="max_capacity" id="max_capacity" value="<?php echo isset($max_capacity)?$max_capacity:''; ?>" required><br><br>
            
            <label for="breakfast_option">Breakfast option</label><br>
            <?php
                $yesChecked = '';
                if($breakfast_option == 'Yes') {
                    $yesChecked = 'checked';
                } 
                $noChecked = '';
                if($breakfast_option == 'No') {
                    $noChecked = 'checked';
                }
                echo "<input type='radio' name='breakfast_option' id='breakfast_option' value='Yes' $yesChecked> Yes";
                echo "<input type='radio' name='breakfast_option' id='breakfast_option' value='No' $noChecked>  No";
            ?>
            <br><br>
     
            <label for="smoke_option">Smoke option</label><br>
            <?php
                $yesChecked = '';
                if($smoke_option == 'Yes') {
                    $yesChecked = 'checked';
                } 
                $noChecked = '';
                if($smoke_option == 'No') {
                    $noChecked = 'checked';
                }
                echo "<input type='radio' name='smoke_option' id='smoke_option' value='Yes' $yesChecked> Yes";
                echo "<input type='radio' name='smoke_option' id='smoke_option' value='No' $noChecked>  No";
            ?>
            <br><br>

            <label for="pickup_option">Pickup option</label><br>
            <?php
                $yesChecked = '';
                if($pickup_option == 'Yes') {
                    $yesChecked = 'checked';
                } 
                $noChecked = '';
                if($pickup_option == 'No') {
                    $noChecked = 'checked';
                }
                echo "<input type='radio' name='pickup_option' id='pickup_option' value='Yes' $yesChecked> Yes";
                echo "<input type='radio' name='pickup_option' id='pickup_option' value='No' $noChecked>  No";
            ?>
            <br><br>
     
            <label for="refund_option">Refund option</label><br>
            <?php
                $yesChecked = '';
                if($refund_option == 'Yes') {
                    $yesChecked = 'checked';
                } 
                $noChecked = '';
                if($refund_option == 'No') {
                    $noChecked = 'checked';
                }
                echo "<input type='radio' name='refund_option' id='refund_option' value='Yes' $yesChecked> Yes";
                echo "<input type='radio' name='refund_option' id='refund_option' value='No' $noChecked>  No";
            ?>
            <br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>
