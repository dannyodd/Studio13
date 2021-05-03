<?php
$pageTitle = "Login/Register";
require_once('includes/header.php');
require_once('includes/db_connection.php');

//Retrieve user inputs from the registration form
if(!filter_has_var(INPUT_POST, 'user_type_id') ||
    !filter_has_var(INPUT_POST, 'user_email') ||
    !filter_has_var(INPUT_POST, 'user_fname') ||
    !filter_has_var(INPUT_POST, 'user_lname') ||
    !filter_has_var(INPUT_POST, 'user_password')) {
    echo "Error validating form POST data. Registration failed.";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$role = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'user_type_id', FILTER_SANITIZE_NUMBER_INT)));
$username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL)));
$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'user_fname', FILTER_SANITIZE_STRING)));
$lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'user_lname', FILTER_SANITIZE_STRING)));
$password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_STRING)));

//User Types: 1 = Admin, 2 = Artist, 3 = User
//Create mySQL INSERT statement to add the new user and generate the user_id number and execute the query
$query_str = "INSERT INTO users VALUES (NULL, '$role', '$username', '$firstname', '$lastname', '$password')";
$query = $conn->query($query_str);

echo $query;
//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $error = "Insertion failed with: ($errno) $error.";
    echo $error;
    $conn->close();
    include 'includes/footer.php';
    die();
}

$conn->close();
include 'includes/footer.php';

//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//create session variables
$_SESSION['login'] = $username;
$_SESSION['name'] = "$firstname $lastname";
$_SESSION['role'] = $role;

//set login status to 3 since this is a new user.
$_SESSION['login_status'] = 3;

//redirect the user to the loginform.php page
header("Location: loginform.php");
