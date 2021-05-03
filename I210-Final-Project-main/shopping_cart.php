<?php
$pageTitle = "SHOPPING CART";

include_once ('includes/header.php');
include_once ('includes/db_connection.php');
?>

    <h2>Shopping Cart</h2>
<?php
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include ('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];
?>
    <table class="product_list">
        <tr>
            <th style="width: 500px">Name</th>
            <th style="width: 60px">Price</th>
            <th style="width: 60px">Quantity</th>
            <th style="width: 60px">Total</th>
        </tr>
        <?php
        //insert code to display the shopping cart content
        //select statement
        $sql = "SELECT product_id, product_name, product_price FROM products WHERE 0";

        foreach (array_keys($cart) as $product_id) {
            $sql .= " OR product_id=$product_id";
        }
        //execute the query
        $query = $conn->query($sql);

        //fetch products and display them in a table
        while ($row = $query->fetch_assoc()) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $qty = $cart[$product_id];
            $total = $qty * $product_price;
            echo "<tr>",
                "<td><a href='product_details.php?product_id=$product_id'>$product_name</a></td>",
                "<td>$$product_price</td>",
                "<td>$qty</td>",
                "<td>$$total</td>",
                "</tr>";
        }
        ?>
    </table>
    <br>
    <div class="cart_buttons">
        <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
        <input type="button" value="Cancel" onclick="window.location.href = 'shopping.php'" />
    </div>
    <br><br>

<?php
include 'includes/footer.php'
?>