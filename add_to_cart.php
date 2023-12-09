<?php

require('config/boot.php');

$id = $_GET['id'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (empty($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = 1;
} else {
    $_SESSION['cart'][$id] += $_POST['qty'];
}


//print_r($_SESSION['cart']);

header('Location: cart.php');

