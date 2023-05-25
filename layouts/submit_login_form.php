<!-- script after user submits the log_in form -->
<?php
require_once('db_connect.php');
require_once('functions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower($_POST["email"]);
    $password = trim($_POST["password"]);

    empty_value_login($email, $password);
    login_user($conn, $password, $email);
}
?>