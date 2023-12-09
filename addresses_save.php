<?php
require('config/boot.php');

if (!isset($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $delivery_address_id = $_POST['delivery_address_id'];
    $billing_address_id = $_POST['billing_address_id'];

    $_SESSION['delivery_address_id'] = $delivery_address_id;
    $_SESSION['billing_address_id'] = $billing_address_id;

    header('Location: payment.php');
    exit();
} else {
    header('Location: addresses.php');
    exit();
}
