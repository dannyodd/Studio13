<?php
$pageTitle = "ARTISTS";

include_once ('includes/header.php');
include_once ('includes/db_connection.php');


$sql ="SELECT artist_id, user_id, artist_name, artist_image FROM artists";

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
    <h2> Artists</h2>

    <!--<th>Artist Image</th>
    <th>Artist Name</th> -->
    <div class="img2">
    <?php
    while (($row = $query->fetch_assoc()) !== NULL) {
        echo "<tr>";
        echo "<td colspan='2'><a href='Artist_page.php?artist_id=", $row['artist_id'], "'><img src='www/images/",$row['artist_image'],"'></a></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>","<p style='font-family: arial; font-size: 18px;'>", $row['artist_name'],"</p>","</td>";
        /*echo "<td>", $row['artist_bio'], "</td>";*/
        echo "<br>";
        echo "<br>";
        echo "</tr>";}
    ?>
    </div>
</div>

<?php
include 'includes/footer.php'
?>
