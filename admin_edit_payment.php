<?php
    session_start();
    if(empty($_SESSION['username']) || empty($_SESSION['password'])) {
        header('location: login.php');

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
                    payment_list
                WHERE
                    payment_list.payment_id = $id
        ";
        $result = $conn->query($sql);
        //เอาของออกจากกระเป๋าทีละชิ้น
        foreach($result as $value) {
            $payment_id = $value['payment_id'];
            $payment_date = $value['payment_date'];
            $booking_id = $value['booking_id'];
            $creditcard_number = $value['creditcard_number'];
            $holder_name = $value['holder_name'];
            $expiry_month = $value['expiry_month'];
            $expiry_year = $value['expiry_year'];
            $payment_status = $value['payment_status'];
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
    <title>Admin zone - Edit payment lits</title>
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
        <h1>Payment form</h1><br>
        <form action="admin_r_form9.php?id=<?php echo $id; ?>&action=edit" method="POST">
        
            <label for="booking_id">Booking id :</label><br>
            <input type="text" name="booking_id" id="booking_id" value="<?php echo isset($id)?$id:''; ?>" required><br><br>

            <label for="creditcard_number">Creditcard number :</label><br>
            <input type="text" name="creditcard_number" id="creditcard_number" pattern="[0-9]{16}" maxlength="16" required  value="<?php echo isset($creditcard_number)?$creditcard_number:''; ?>" required><br><br>

            <label for="holder_name">Holder name :</label><br>
            <input type="text" name="holder_name" id="holder_name" required  value="<?php echo isset($holder_name)?$holder_name:''; ?>" required><br><br>

            <label for="expiry_date">Expiry date :</label><br>
            <input type="text" name="expiry_month" id="expiry_month" pattern="[0-9]{2}" maxlength="2" placeholder="mm" size="5"  value="<?php echo isset($expiry_month)?$expiry_month:''; ?>" required>
            <a>/</a>
            <input type="text" name="expiry_year" id="expiry_year" pattern="[0-9]{2}" maxlength="2" placeholder="yy" size="5"  value="<?php echo isset($expiry_year)?$expiry_year:''; ?>" required><br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>