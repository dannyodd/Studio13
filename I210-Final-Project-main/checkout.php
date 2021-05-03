<?php
//Check session status, start if NONE
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Prompt user to login before checkout
if(!isset($_SESSION['login'])) {
    header("Location: loginform.php");
    exit();
}
//Empty cart
$_SESSION['cart'] = '';

$pageTitle = "CHECKOUT";

include_once ('includes/header.php');
include_once ('includes/db_connection.php');
?>
    <h2>Checkout</h2>
    <p>Thank you for shopping with us. Your business is greatly appreciated.
    You will be notified once your items are shipped.
    </p>

<?php
include_once 'includes/footer.php'
?>