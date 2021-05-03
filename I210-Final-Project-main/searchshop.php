<?php

$pageTitle=" Search the Shop";

require_once ('includes/header.php');
?>
    <h2>Search Products</h2> <br>




    <p>Enter one or more words for product.</p>

    <form action="searchshopresults.php" method="get">

        <input type="text" name="terms" size="40" required/>&nbsp;&nbsp;
        <input type="submit" name="Submit" id="Submit" value="Search Products"/>

    </form>
<br>



<?php
require_once ('includes/footer.php');
