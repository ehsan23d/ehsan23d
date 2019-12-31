<?php

if (isset($_POST['form'])) {
    
    $formData = $_POST['form'];
    
    $usernamelogin = trim($formData['user']);
    $passwordlogin = trim($formData['pass']);
    $access = trim($formData["access"]);

    if ($usernamelogin == '' || $passwordlogin == '' || $access == '') {
        header("location:page1.php?error=لطفا اطلاعات مورد نظر را وارد کنید!");
        die();
    }

    $passwordlogin = md5($passwordlogin);

    $connect = mysqli_connect("localhost", "root", "", "uni2");
    $query = "insert into users (name,username,password,access) value ('{$usernamelogin}','{$usernamelogin}','{$passwordlogin}','{$access}')";
    $sql = mysqli_query($connect, $query);

    header('location:page1.php?info=ثبت نام موفقیت آمیز بود!');
    die();
}
else {
    header("location:page1.php?error=لطفا اطلاعات مورد نظر را وارد کنید!");
    die();
}