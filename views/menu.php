<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/templates/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/templates/css/material-dashboard.css">
</head>
<body>
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a  class="simple-text logo-mini">
                CT
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active  ">
                    <a class="nav-link" href="/main/index">
                        <i class="material-icons">M</i>
                        <p>Main page</p>
                    </a>
                </li>
                <li class="nav-item active  ">
                    <a class="nav-link" href="/main/contacts">
                        <i class="material-icons">C</i>
                        <p>Contacts</p>
                    </a>
                </li>
                <li class="nav-item active  ">
                    <a class="nav-link" href="/categories/show">
                        <i class="material-icons">S </i>
                        <p>Show categories</p>
                    </a>
                </li>
                <?php if(isset($categories)){
                foreach ($categories as $tmp): ?>
                <li class="nav-item active  ">
                    <a class="nav-link" href="/tovar/show/1/asc/0/<?=$tmp['id']?>">
                        <i class="material-icons"><?=$num1?></i>
                        <p><?=$tmp['name']?></p>
                    </a>
                </li>
                <?php $num1++; endforeach; } ?>
                <li class="nav-item active  ">
                    <a class="nav-link" href="/tovar/show/1/asc/1/0">
                        <i class="material-icons">S</i>
                        <p>Show tovars</p>
                    </a>
                </li>
                <li class="nav-item active  ">
                    <a class="nav-link" href="/registration/addUser">
                        <i class="material-icons">R</i>
                        <p>Add User</p>
                    </a>
                </li>
                <li class="nav-item active  ">
                    <a class="nav-link" href="/admin/registration/logIn">
                        <i class="material-icons">L</i>
                        <p>Log In</p>
                    </a>
                </li>
                <li class="nav-item active  ">
                    <a class="nav-link" href="/client/userOrders">
                        <i class="material-icons">M</i>
                        <p>My orders</p>
                    </a>
                </li>

                <!-- your sidebar here -->
            </ul>
        </div>
    </div>