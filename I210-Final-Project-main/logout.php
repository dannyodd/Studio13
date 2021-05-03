<?php
$pageTitle = "LOGOUT";
//Start session if none
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

//Reset session variables
$_SESSION = array();

//Delete session cookie
setcookie(session_name(), "", time() - 3600);

//Destroy session
session_destroy();
$page_title = "LOGOUT";
include ('includes/header.php');
include ('includes/db_connection.php');
?>

<h2>Logout</h2>
<p>Thank you for your visit, you are now logged out.</p>

<?php
include ('includes/footer.php');
