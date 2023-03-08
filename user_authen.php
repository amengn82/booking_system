<?php
    session_start();
    include_once('./connect.php');
    
    $usrname = isset($_POST['username'])?$_POST['username']:'';
    $pwd = isset($_POST['password'])?$_POST['password']:'';

    $username = mysqli_real_escape_string($conn, $usrname);
    $password = mysqli_real_escape_string($conn, $pwd);

    $sql = "
        SELECT *
        FROM
            users
        WHERE
            users.username = '{$username}'
        AND
            users.password = '{$password}'
    ";

    $result = $conn->query($sql);
    if($result->num_rows < 1) {
            header('location: login.php');
    }

    while($value = $result->fetch_assoc()) {
        if($value['username'] == $username AND $value['password'] == $password){
            $_SESSION['user_id'] = $value['user_id'];
            $_SESSION['firstname'] = $value['firstname'];
            $_SESSION['username'] = $value['username'];
            $_SESSION['password'] = $value['password'];
        }else {
            header('location: login.php');
       } 
    }
    header('location: home.php');
    //echo "<a href='main.php'>คลิ๊กเพื่อไปหน้าแสดงรายการห้องพัก</a>"
?>