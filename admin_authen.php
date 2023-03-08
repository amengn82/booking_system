<?php
    session_start();
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['username'])?$_POST['password']:'';

    if($username == 'admin' && $password == '123'){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
     
        //echo "Login successfully<br>";
        //echo "<a href='admin_index.php'>Go to the next page</a>";
        header('location: admin_index.php');
    }else {
        //echo "Username or password is incorrect. Please try agin.<br>";
        //echo "<a href='admin_login.php'>Go back to login</a>";
        header('location: admin_login.php');
    }
?>