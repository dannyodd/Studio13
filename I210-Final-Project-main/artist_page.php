<?php

$pageTitle = "ARTIST PAGE";

include_once('includes/header.php');
include_once('includes/db_connection.php');

//Error handling if no artist_id is found
if(!filter_has_var(INPUT_GET, "artist_id")) {
    $conn->close();
    require_once ('includes/footer.php');
    die("Error: No product ID was retrieved.");
}

//Retrieve the artist_id from query string and filter
$artist_id = filter_input(INPUT_GET, "artist_id", FILTER_SANITIZE_NUMBER_INT);
//MySQL SELECT all information about the given artist, execute the query and handle errors
$sql = "SELECT * FROM artists WHERE artist_id=$artist_id";
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
<h2>Artist Page</h2>
<div class="artist">

    <div class="img">
        <!-- artist image-->
        <img src="www/images/<?php echo $row['artist_image']?>" style width="70%">
    </div>


    <div class="absolute">
        <!-- artist name -->
        <h2> <?php echo $row['artist_name']?> </h2> <br>

        <!-- artist bio--><br>
        <p style="font-size: 18px; text-align: left;"> <?php echo $row['artist_bio'] ?> </p> <br>




    </div>

</div>





<?php require_once ('includes/footer.php'); ?>
