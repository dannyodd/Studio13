<?php
/*
* Author: Samuel Evans
* Date: 11/22/20
*/
$pageTitle = "Search Results";

include('includes/header.php');
require_once('includes/db_connection.php');

if (filter_has_var(INPUT_GET, "terms")) {
    $term_string = filter_input(INPUT_GET, "terms", FILTER_SANITIZE_STRING);
} else {
    echo "there were no terms found";
    require_once('includes/footer.php');
    exit();
}

//make an array from the searched terms
$terms = explode(" ", $term_string);

//select statement. foreach loop for several terms
$sql = "SELECT * FROM products WHERE 1 AND";
foreach ($terms as $term) {
    $sql .= " product_name LIKE '%$term%' AND";
}

$sql = rtrim($sql, " AND");

//execute query
$query = $conn->query($sql);

// Selection Error MEssage
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "No results found with:: ($errno) $errmsg";
    $conn->close();
    require_once('includes/footer.php');
    exit();
}
//show results in table
echo "<h3> Search Results for: $term_string</h3>";

//show results in table
if ($query->num_rows == 0)
    echo "we dont have <i>$term_string</i> in stock, try another product.";

else {
    ?>

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



    <?php


//clean results
    $query->close();

//cut off connection to database
    $conn->close();
}