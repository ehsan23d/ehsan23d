<?php

session_start();

if (!isset($_FILES['file'])) {
    header('location:page2.php?error=فایل یافت نشد!');
    die();
}

if (!isset($_SESSION['login'])) {
    echo 'لطفا ابتدا وارد حساب کاربری خود شوید!';
    die();
}

$userId = $_SESSION['login'];

$file = $_FILES['file'];
if (!$file['name']) {
    header('location:page2.php?error=لطفا یک فایل انتخاب کنید!');
    die();
}

if ($file['error'] != 0) {
    header('location:page2.php?error=مشکلی در هنگام آپلود فایل پیش آمده!');
    die();
}

$fileType = $file['type'];

$uniq_name = uniqid();
$localName = $file['name'];
$extName = pathinfo($localName)['extension'];

$newName = $uniq_name . '.' . $extName;
$res = move_uploaded_file($file['tmp_name'],'upload/' . $newName);

if ($res) {
    $connect = mysqli_connect("localhost", "root", "", "uni2");
    $query = "insert into posts (user_id,file,local_name,type) value ('{$userId}','{$newName}','{$localName}','{$fileType}')";
    $sql = mysqli_query($connect, $query);
    header('location:page2.php?info=عملیات موفق آمیز بود!');
    die();
}
else {
    header('location:page2.php?error=مشکلی در هنگام آپلود تصویر پیش آمده!');
    die();
}