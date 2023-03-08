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
                    maids
                WHERE
                    maids.maid_id = $id
        ";
        $result = $conn->query($sql);
        //เอาของออกจากกระเป๋าทีละชิ้น
        foreach($result as $value) {
            $maid_id = $value['maid_id'];
            $maid_firstname = $value['maid_firstname'];
            $maid_lastname = $value['maid_lastname'];
            $maid_birthdate = $value['maid_birthdate'];
            $maid_gender = $value['maid_gender'];
            $maid_phone = $value['maid_phone'];
            $maid_email = $value['maid_email'];
            $maid_salary = $value['maid_salary'];
            $benefit_id = $value['benefit_id'];
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
    <title>Admin zone - Edit maids</title>
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
        <h1>Maid information edit form</h1><br>
        <form action="admin_r_form3.php?id=<?php echo $id; ?>&action=edit" method="POST">

            <label for="maid_firstname">Firstname :</label><br>
            <input type="text" name="maid_firstname" id="maid_firstname" value="<?php echo isset($maid_firstname)?$maid_firstname:''; ?>" required><br><br>

            <label for="maid_lastname">Lastname :</label><br>
            <input type="text" name="maid_lastname" id="maid_lastname" value="<?php echo isset($maid_lastname)?$maid_lastname:''; ?>" required><br><br>

            <label for="maid_birthdate">Birthdate :</label><br>
            <input type="date" name="maid_birthdate" id="maid_birthdate" value="<?php echo isset($maid_birthdate)?$maid_birthdate:''; ?>" required><br><br>

            <label for="maid_gender">Gender</label><br>
            <?php
                $maleChecked = '';
                if($maid_gender == 'male') {
                    $maleChecked = 'checked';
                } 
                $femaleChecked = '';
                if($maid_gender == 'female') {
                    $femaleChecked = 'checked';
                }
                echo "<input type='radio' name='maid_gender' id='maid_gender' value='male' $maleChecked> Male";
                echo "<input type='radio' name='maid_gender' id='maid_gender' value='female' $femaleChecked>  Female";
            ?>
            <br><br>
       
            <label for="maid_phone">Phone number :</label><br>
            <input type="tel" name="maid_phone" id="maid_phone" value="<?php echo isset($maid_phone)?$maid_phone:''; ?>"><br><br>

            <label for="maid_email">Email :</label><br>
            <input type="email" name="maid_email" id="maid_email" value="<?php echo isset($maid_email)?$maid_email:''; ?>"><br><br>
            
            <label for="maid_salary">Salary :</label><br>
            <input type="number" name="maid_salary" id="maid_salary" value="<?php echo isset($maid_salary)?$maid_salary:''; ?>"><br><br>

            <label for="benefit_id">Benefit id :</label><br>
            <input type="number" name="benefit_id" id="benefit_id" value="<?php echo isset($benefit_id)?$benefit_id:''; ?>"><br><br>

            <input type="submit" name="submit" value="submit">
        </form>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>