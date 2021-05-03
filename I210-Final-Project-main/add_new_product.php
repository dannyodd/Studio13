<?php
$pageTitle = "ADD NEW PRODUCT";
//Note: Find a way to link artist_id to artist_name for product inputs
include_once ('includes/header.php');
include_once ('includes/db_connection.php');
?>
<h2>Add New Product</h2>
<form action="insert_product.php" method="post" class="login">
    <table>
        <tr>
            <td>Product Name: </td>
            <td><input name="product_name" type="text" size="100" required/></td>
        </tr>
        <tr>
            <td>Artist: </td>
            <td><input name="artist_id" type="number" required/></td>
        </tr>
        <tr>
            <td>Price: </td>
            <td><input name="product_price" type="number" step="0.01" required/></td>
        </tr>
        <!--<tr>
            <td>Product Type: </td>
            <td>
                <select name="product_type">
                    <option value="1">Album</option>
                    <option value="2">Merchandise</option>
                </select>
            </td>
        </tr> -->
        <tr>
            <td>Description: </td>
            <td><textarea name="product_description"></textarea></td>
        </tr>
        <tr>
            <td>Image: </td>
            <td><input name="product_image_link" type="text" size="100" required/></td>
        </tr>
    </table>
    <br>
    <div class="add_submit_button">
        <input type="submit" value="Add Product" />
        <input type="button" value="Cancel" onclick="window.location.href='shopping.php'"/>
    </div>
</form>
<br><br>
<?php
include 'includes/footer.php'
?>
