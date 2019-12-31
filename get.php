<?php
$usernamelogin = $_POST['usernamelogin'];
$passwordlogin = $_POST['passwordlogin'];

session_start();
$_SESSION['username']=$usernamelogin;

if (!isset($Firstname) && !isset($passwordlogin) && !isset($access)) {
    $connect = mysqli_connect("127.0.0.10", "root", "", "university");
    $query = "select * from users where username = {$usernamelogin} and password = {$passwordlogin}";
    $sql = mysqli_query($connect, $query);

}