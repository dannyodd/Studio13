<?php
$pageTitle = "Login/Register";
require_once('includes/header.php');
require_once('includes/db_connection.php');

//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//create variable login status.
$_SESSION['login_status'] = 2;
$username = $passcode = "";

//retrieve user name and password from the form in the login form
if (filter_has_var(INPUT_POST, 'user_email') || filter_has_var(INPUT_POST, 'user_password')) {
    $username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_STRING)));
    $password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_STRING)));
}

//validate user name and password against a record in the users table in the database. If they are valid, create session variables.
$query_str = "SELECT * FROM users WHERE user_email='$username' AND user_password='$password'";

$query = @$conn->query($query_str);
if ($query->num_rows) {
    //If valid user, store user login status in session variables
    $row = $query->fetch_assoc();
    $_SESSION['login'] = $username;
    $_SESSION['role'] = $row['user_type_id'];
    $_SESSION['name'] = $row['user_fname'] . " " . $row['user_lname'];
    $_SESSION['login_status'] = 1;
}



//close the connection
$conn->close();

//redirect to the loginform.php page
header("Location: loginform.php");
