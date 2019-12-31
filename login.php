<?php

session_start();
if (isset($_SESSION['login'])) {
    header('location:page2.php?message=شما از قبل در سیستم لاگین کرده اید!');
    die();
}

if (isset($_POST['form'])) {
    $formData = $_POST['form'];
    
    $username = trim($formData['user']);
    $password = trim($formData['pass']);
    
    if ($username == '' || $password == '') {
        header('location:page1.php?error=لطفا اطلاعات مورد نظر را وارد کنید!');
        die();
    }

    $hashPassword = md5($password);

    $connect = mysqli_connect("localhost", "root", "", "uni2");
    $query = "select * from users where username='{$username}'";
    $sql = mysqli_query($connect, $query);
    
    $res = mysqli_fetch_assoc($sql);
    if (!$res) {
        header('location:page1.php?error=نام کاربری یا رمز عبور اشتباه است!');
        die();
    }

    $userPassword = $res['password'];
    if ($userPassword == $hashPassword) {
        $_SESSION['login'] = $res['id'];
        header('location:page2.php?message=ورود موفق آمیز بود!');
        die();        
    }
    else {
        header('location:page1.php?error=نام کاربری یا رمز عبور اشتباه است!');
        die();
    }
    
    var_dump($res);


}