<?php

$db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db = "i210_group13_db";
    //Create connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db)
    or die("Connection failed: %s\n" . $conn->error);

    return $conn;



    /*$conn -> close();*/

?>
