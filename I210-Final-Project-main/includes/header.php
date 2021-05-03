<?php
//Check the session status and start new session if NONE
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Define a variable to store # of items in cart for display
$count = 0;

//Retrieve cart contents
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    if ($cart) {
        $count = array_sum($cart);
    }
}
//Set the cart image according to # of items in cart
$cart_image = (!$count) ? "cart_empty.jpg":"cart_full.jpg";

//Define variables for user login/name/role
$login = '';
$name = '';
$role = 0;

//Retrieve user login info
if(isset($_SESSION['login']) AND isset($_SESSION['name']) AND isset($_SESSION['role'])) {
    $login = $_SESSION['login'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
}
?>
<html lang="english">
<head>
    <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
    <title><?php echo $pageTitle ?></title>
</head>
<body>
    <div id="wrapper">
        <div class="banner">
            <img class="logo" src="www/images/studio13Logo.jpg" alt="Studio 13 Logo">
            <h1>STUDIO 13</h1>
            <h1><?php echo $pageTitle ?></h1>
        </div>
        <div>
            <a href="shopping_cart.php">
                <img src="www/images/<?= $cart_image ?>"/>
                <br>
                <span><?php echo $count ?> item(s)</span>
            </a>
        </div>
        <div id="navbar">
            <a href="index.php">Home</a> ||
            <a href="artists_list.php">Artists</a> ||
            <a href="shopping.php">Store</a> ||
            <a href="about.php">About Us</a> ||
            <a href="contact_form.php">Contact</a> ||
            <a href="searchshop.php">Search</a> ||
            <?php
            if (empty($login))
                echo "<a href='loginform.php'>Login/Register</a> || ";
            else {
                echo "<a href='logout.php'>Logout</a> ||";
            }
            if ($role == 1) {
                echo "<a href='admin_functions.php'>Admin Functions</a>";
            }
            ?>
        </div>

