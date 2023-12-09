<?php

require('config/boot.php');

$_SESSION['cart'] = $_SESSION['cart']  [];
$_SESSION['cart'][$_GET['id']] = $_SESSION['cart'][$_GET['id']]  0;
$_SESSION['cart'][$_GET['id']]++;

header('Location: index.php');
