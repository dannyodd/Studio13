<?php

$pageTitle = "Login/Register";;
require_once('includes/header.php');
require_once('includes/db_connection.php');
?>
<h2>Login or Register</h2>

<?php
$message = "Enter username and password";
//Check the login status
$login_status = '';
if(isset($_SESSION['login_status']))
    $login_status = $_SESSION['login_status'];

//On successful login, display a success message
if($login_status == 1) {
    echo "<p>You are logged in as " . $_SESSION['login'] . ".</p>";
    echo "<a href='logout.php'>Log out</a><br>";
    include ('includes/footer.php');
    exit();
}

//On new registration
if ($login_status == 3) {
    echo "<p>Thank you for registering with us, your account has been created.</p>";
    echo "<a href='logout.php'>Log out</a><br>";
    include ('includes/footer.php');
    exit();
}

//On failed login
if($login_status == 2) {
    $message = "Username or password invalid, login failed.";
}

?>

    <div class="login">
        <form method='post' action='login.php'>
            <table>
                <tr>
					<td colspan="2"><?php echo $message; ?><br><br></td>
                </tr>
                <tr>    
                    <td style="width: 80px">Username (Email): </td>
                    <td><input type='text' name='user_email' required></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type='password' name='user_password' required></td>
                </tr>
                <tr>
                    <td>
                        <div class="add_submit_button">
                            <input type='submit' value='  Login  '>
                            <input type="submit" name="Cancel" value="Cancel" onclick="window.location.href = 'index.php'" />
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!-- display the registration form -->
    <div class="login">
        <form action="register.php" method="post">
            <table>
                <tr>
                    <td colspan="2" align="left">If you are new to our site, please create an account.<br><br></td>
                </tr>
                <tr>
                    <td>User Type (1 for Admin, 2 for Artist, 3 for Customer): </td>
                    <td><input name="user_type_id" type="text" required></td>
                </tr>
                <tr>
                    <td>Email (Username): </td>
                    <td><input name="user_email" type="text" required></td>
                </tr>
                <tr>
                    <td>First Name: </td>
                    <td><input name="user_fname" type="text" required></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input name="user_lname" type="text" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input name="user_password" type="password" required></td>
                </tr>
                <tr>
                    <td>
                        <div class="add_submit_button">
                            <input type="submit" value="Register" />
                            <input type="button" value="Cancel" onclick="window.location.href = 'index.php'" />
                        </div>
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
<?php
include ('includes/footer.php');
