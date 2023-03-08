<?php
session_start();
if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
    header('location: admin_login.php');
}
   
include_once('./connect.php'); 
date_default_timezone_set('Asia/Bangkok');
require('./vendor/autoload.php');
header('Content-Type: text/html; charset=utf-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/OAuth.php';
require './vendor/phpmailer/phpmailer/src/POP3.php';
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
    <title>Admin zone - Send newsletter</title>
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
        $txtarea = $_POST['txtarea'];   //ตัวแปรที่รับมาจากหน้า form

        $sql_sendemail = "
                    SELECT 
                        users.email
                    FROM
                        users
                    INNER JOIN
                        subscribers
                    ON
                        users.user_id = subscribers.user_id
        ";
        $result = $conn->query($sql_sendemail);
            foreach($result as $value) {
                $mail = new PHPMailer;
                $mail->CharSet = "utf-8";
                $mail->isSMTP();
                $mail->Host = ''; //smtp ของ outlook.com
                $mail->Port = xxx; //port number ของ outlook.com
                $mail->SMTPSecure = ''; // encrytion ของ outlook.com
                $mail->SMTPAuth = true;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->Username = "";      //login email ที่จะทำการส่งจากหน้าเว็บ
                $mail->Password = "";        //password อีเมลล์
                $mail->setFrom("", "");  //อีเมลล์ที่จะเป็นตัวส่งออกไป, ชื่อที่จะให้โชว์ Arias หน้าเมลล์
                $mail->addAddress("{$value['email']}");        //mail ที่จะเป็นตัวรับ      
                $mail->Subject = "ABC Hotel Newsletter";        //หัวข้ออีเมลล์     
                
                $email_content = "
        
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>send email</title>
                </head>
                <body>
                    <textarea cols='30' rows='10'>
                        {$txtarea}
                    </textarea>
                </body>
                </html>
                ";
        
                $email_receiver = "{$value['email']}";  //mail ที่จะเป็นตัวรับ
                //  ถ้ามี email ผู้รับ
                if($email_receiver){
                    $mail->msgHTML($email_content);
        
                    if (!$mail->send()) {  //ถ้าส่งเมล์ไม่สำเร็จ
                        echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
                        echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
                    }
                }
            }
            // กรณีส่ง email สำเร็จ
            echo "The system sent the message successfully"; //"ระบบได้ส่งข้อความไปเรียบร้อย";
        ?> 
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');
    </script>
</body>
</html>