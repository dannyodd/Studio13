<?php
$pageTitle = "DELETE PRODUCT";

include_once ('includes/header.php');
include_once ('includes/db_connection.php');

//Handle retrieval errors
if(!filter_has_var(INPUT_GET, 'product_id')) {
    echo "Error retrieving product_id, deletion canceled.";
    include ('includes/footer.php');
    exit;
}

//Get product_id from input string variable
$product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_NUMBER_INT);
//Construct the MySQL delete statement and execute the query
$sql = "DELETE FROM products WHERE product_id ='$product_id'";
$query = @$conn -> query($sql);

//Handle deletion errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Deletion failed with: ($errno) $errmsg<br>\n";
    $conn->close();
    require_once ('includes/footer.php');
    exit;
}

//Close connection and confirm deletion
$conn->close();
echo "<div class=admin_functions>";
echo "Product deletion successful.<br><br>";
echo "</div>";
require_once 'includes/footer.php';