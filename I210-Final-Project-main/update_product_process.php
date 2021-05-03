<?php
$pageTitle = "UPDATE PRODUCT";

include_once ('includes/header.php');
include_once ('includes/db_connection.php');
//Note: Find a way to link artist_id to artist_name for product inputs
//Check for POST data from the form in edit_product.php - If not received, handle errors
if (!filter_has_var(INPUT_POST, 'product_name') ||
    !filter_has_var(INPUT_POST, 'artist_id') ||
    //!filter_has_var(INPUT_POST, 'product_type') ||
    !filter_has_var(INPUT_POST, 'product_price') ||
    !filter_has_var(INPUT_POST, 'product_description') ||
    !filter_has_var(INPUT_POST, 'product_image_link')) {
    echo "Error validating form POST data. Product update canceled, please check input values.";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//Retrieve product data, assign to appropriate variables and trim, filter, sanitize
$product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_NUMBER_INT);
$product_name = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING)));
$artist_id = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'artist_id', FILTER_SANITIZE_NUMBER_INT)));
//$product_type = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'product_type', FILTER_SANITIZE_STRING)));
$product_price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'product_price', FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)));
$product_description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'product_description', FILTER_SANITIZE_STRING)));
$product_image_link = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'product_image_link', FILTER_SANITIZE_URL)));

//Construct MySQL UPDATE statement
$query_str = "UPDATE products SET product_name='$product_name', artist_id='$artist_id', product_price='$product_price', product_description='$product_description', product_image_link='$product_image_link' 
    WHERE product_id='$product_id'";

//Execute INSERT query
$query = @$conn -> query($query_str);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Update failed with: ($errno) $errmsg.";
    $conn->close();
    include 'includes/footer.php';
    exit;
}

//close the connection
$conn->close();
echo "<div class = admin_functions>";
echo "<p>Product update successful.</p>";
echo "<p><a href='product_details.php?product_id=$product_id'>Product Details</a></p>";
echo "</div>";
require_once 'includes/footer.php';