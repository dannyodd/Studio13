<?php
/*Notes from Dan: Planning to modify SELECT query to join the "products" table
with its child tables "merchandise" and "albums" on the shared "product_id" attribute.
Also going to join the "artists" table with the "products" table on the shared "artist_id"
attribute, and display the "artist_name" in place of its associated "artist_id" for a
hyperlink to the given artist's page. The product details page will optionally exclude any attributes
for which a given product has null values. This will take some finessing, for now I just have
error suppression for values that are not yet properly linked.*/
$pageTitle = "PRODUCT DETAILS";

include_once('includes/header.php');
include_once('includes/db_connection.php');

//Error handling if no product_id is found
if(!filter_has_var(INPUT_GET, "product_id")) {
    $conn->close();
    require_once ('includes/footer.php');
    die("Error: No product ID was retrieved.");
}

//Retrieve the product_id from query string and filter
$product_id = filter_input(INPUT_GET, "product_id", FILTER_SANITIZE_NUMBER_INT);
//MySQL SELECT all information about the given product, execute the query and handle errors
$sql = "SELECT * FROM products WHERE product_id=$product_id";
$query = @$conn->query($sql);
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    require 'includes/footer.php';
    die("Failed to retrieve product information: ($errno) $error.");
}
if (!$row = $query->fetch_assoc()) {
    $conn->close();
    require 'includes/footer.php';
    die("Product not found.");
}
?>
<h2>Product Details</h2>
<div class="contact">

    <div class="img">
        <!-- product image-->
        <img src="www/images/<?php echo $row['product_image_link']?>" style width="70%">
    </div>


    <div class="absolute">
        <!-- Product name -->
        <h2> <?php echo $row['product_name']?> </h2> <br>

        <!-- product desc--><br>
        <p style="font-size: 18px; text-align: left;"> <?php echo $row['product_description'] ?> </p> <br>

        <!-- price --><br>
        <h2> Price: $<?php echo @$row['product_price'] ?> </h2> <br>

        <a href="add_to_cart.php?product_id=<?php echo $row['product_id'] ?>">
            <input type="button" value="Add To Cart"/>
        </a>
    </div>
    <div class="admin_buttons">
        <?php
        if ($role == 1) { ?>
            <p>
                <input type="button" value="Delete Product" onclick="window.location.href='delete_product.php?product_id=<?php echo $row['product_id'] ?>';">
                <input type="button" value="Edit Product" onclick="window.location.href='edit_product.php?product_id=<?php echo $row['product_id'] ?>';">
            </p>
        <?php
        }
        ?>
    </div>
</div>





<?php require_once ('includes/footer.php'); ?>



