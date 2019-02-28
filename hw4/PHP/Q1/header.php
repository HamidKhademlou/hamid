<?php
    session_start();
    if (!isset($_SESSION['login']))
        $_SESSION['login'] = false;
    if (!isset($_SESSION['username']))
        $_SESSION['username'] = "";
?>
<!DOCTYPE html>
<html dir="rtl">

<head>
    <title>Homework 3 Question 1</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/uikit-rtl.min.css" />

    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
</head>

<body>
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <li><a href="index.php">صفحه اصلی</a></li>
                <li><a href="users.php">لیست کاربران</a></li>
            </ul>
        </div>
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <?php if ($_SESSION['login']) { ?>
                <li><a href="login.php?logout=1">خروج</a></li>
                <?php } else { ?>
                <li><a href="register.php">ثبت نام</a></li>
                <li><a href="login.php">ورود</a></li>
                <?php }; ?>
            </ul>
        </div>
    </nav>