<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = array();
}
//Retrieve product ID from the query string or handle error if ID is invalid
if (!filter_has_var(INPUT_GET, 'product_id')) {
    $error = "Error: Product id not found.<br><br>";
    //header ("Location: error.php?m=$error");
    die();
}
//Retrieve product ID and check that it is an INT value
$product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_NUMBER_INT);
if (!is_numeric($product_id)) {
    $error = "Error: Invalid product id<br><br>";
    //header("Location: error.php?m=$error");
    die();
}
//If product already exists in cart, increase qty by 1; if not, add it to the cart and set qty to 1
if (array_key_exists($product_id, $cart)) {
    $cart[$product_id] = $cart[$product_id] +1;
} else {
    $cart[$product_id] = 1;
}

//Update the session variable
$_SESSION['cart'] = $cart;

//Redirect to the shopping_cart.php page
header('Location: shopping_cart.php');