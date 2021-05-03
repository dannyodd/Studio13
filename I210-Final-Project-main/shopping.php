<?php
$pageTitle = "SHOP";

include_once ('includes/header.php');
include_once ('includes/db_connection.php');


$sql ="SELECT product_id, product_name, product_price, product_image_link FROM products";

//execute
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once('includes/footer.php');
    exit;
}?>


<div class="product_gallery">

    <h2>Music Store</h2>
    <h2> Store Items</h2>

    <!--<th>Product Image</th>
    <th>Product Name</th>
    <th>Price</th> -->
    <div class="img1">

    <?php
    while (($row = $query->fetch_assoc()) !== NULL) {
        echo "<tr>";
        echo "<td colspan='2'><a href='product_details.php?product_id=", $row['product_id'], "'><img src='www/images/",$row['product_image_link'],"'></a></td>";
        echo "<br>";
        echo "<td>","<p style='font-family: arial;font-size: 18px;'>",$row['product_name'], "&nbsp; $",$row['product_price'],"</p>","</td>";
        echo "<br>";
        echo "<br>";
        echo "</tr>";}

    ?>
    </div>

</div>


<?php
include 'includes/footer.php';
?>
