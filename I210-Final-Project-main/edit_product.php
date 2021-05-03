<?php
$pageTitle = "UPDATE PRODUCT";
//Note: Find a way to link artist_id to artist_name for product inputs
include_once ('includes/header.php');
include_once ('includes/db_connection.php');

//Error handling if no product_id is found
if(!filter_has_var(INPUT_GET, 'product_id')) {
    $conn->close();
    require_once ('includes/footer.php');
    die("Error: No product ID was retrieved.");
}

//Retrieve the product_id from query string and filter
$product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_NUMBER_INT);
//MySQL SELECT all information about the given product, execute the query and handle errors
$query_str = "SELECT * FROM products WHERE product_id='$product_id'";
$query = @$conn->query($query_str);
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
<h2>Edit/Update Product</h2>
<form action="update_product_process.php?product_id=<?php echo $row['product_id']?>" method="post">
    <table>
        <tr>
            <td>Product Name: <?php echo $row['product_name'] ?> </td>
            <td>New Name: <input name="product_name" type="text" size="100" required/></td>
        </tr>
        <tr>
            <td>Artist: <?php echo $row['artist_id'] ?></td>
            <td>New Artist: <input name="artist_id" type="number" required/></td>
        </tr>
        <tr>
            <td>Price: <?php echo $row['product_price'] ?></td>
            <td>New Price: <input name="product_price" type="number" step="0.01" required/></td>
        </tr>
        <tr>
            <td>Description: <?php echo $row['product_description'] ?></td>
            <td>New Description: <textarea name="product_description"></textarea></td>
        </tr>
        <tr>
            <td>Image Link: <?php echo $row['product_image_link'] ?></td>
            <td>New Image Link: <input name="product_image_link" type="text" size="100" required/></td>
        </tr>
    </table>
    <div class="add_submit_button">
        <input type="submit" value="Update Product" />
        <input type="button" value="Cancel" onclick="window.location.href='shopping.php'"/>
    </div>
</form>
<?php
include 'includes/footer.php'
?>
