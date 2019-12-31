<?php

session_start();
$userId = $_SESSION['login'];

if (isset($_POST['form'])) {
    $formData = $_POST['form'];
    
    $postId = $formData['post_id'];
    $text = $formData['text'];

    $connect = mysqli_connect("localhost", "root", "", "uni2");
    $query = "insert into replies (user_id,post_id,text) value ('{$userId}','{$postId}','{$text}')";
    $sql = mysqli_query($connect, $query);

    header('location:page2.php?info=جواب با موفقیت ارسال شد!');
    die();
}