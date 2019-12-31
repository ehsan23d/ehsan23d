<?php


session_start();
unset($_SESSION['login']);

header('location:page1.php?info=خروج موفق آمیز بود!');