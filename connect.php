<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "abc_hotel";

    //สร้าง connection
    $conn = new mysqli($servername,$username,$password,$dbname);
    $conn->set_charset('utf8');

    // ตั้งค่า timezone
    date_default_timezone_set('Asia/Bangkok');

    // ตรวจสอบ connection
    //if($conn -> connect_error) {
        //die("Connection failed : ".$conn->connect_error);
    //}else {
        //echo "Conection successfully <br>";
    //}
?>