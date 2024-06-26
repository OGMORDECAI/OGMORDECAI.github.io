<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$product_id = intval($_GET['id']); // Ensure the product ID is an integer
$quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (array_key_exists($product_id, $_SESSION['cart'])) {
    $_SESSION['cart'][$product_id] += $quantity;
} else {
    $_SESSION['cart'][$product_id] = $quantity;
}

header("Location: cart.php");
exit();
