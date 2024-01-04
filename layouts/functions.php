<!-- functions for the validations of login and signup -->

<?php
ob_start();
session_start();

// functions for the Registrastion of the user: 
function user_exist($conn, $email)
{
    $sql = 'SELECT * FROM `users_auth` WHERE email = ?;';

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        header("location: sign_up.php?err=user_exist");
        exit();
    }
    mysqli_stmt_close($stmt);
}

function empty_value($email, $user_name, $password)
{
    if (empty($email)) {
        header('location: sign_up.php?err=empty_email');
        exit();
    } else if (empty($user_name)) {
        header("location: sign_up.php?err=empty_user");
        exit();
    } else if (empty($password)) {
        header("location: sign_up.php?err=empty_password_register");
        exit();
    }
}

function check_password($password, $confirm_password)
{
    $password = trim($password);
    $confirm_password = trim($confirm_password);
    if ($password !== $confirm_password) {
        header('location: sign_up.php?err=pass_dismatch');
        exit();
    }
}

function letter_pass($password)
{
    if (strlen($password) < 6) {
        header('location: sign_up.php?err=pass_invalid');
        exit();
    }
}

function email_validate($email)
{
    $validate = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($validate != True) {
        header('location: sign_up.php?err=email_invalid');
        exit();
    }
}

//--------------------------------------


// function fo the login of the user:
function check_user($conn, $email)
{
    $sql = 'SELECT * FROM `users_auth` WHERE email = ?;';

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        $data = mysqli_fetch_assoc($result);
        $id = $data['id'];
        $password = $data['password'];
        $user_name = $data['user_name'];
        mysqli_stmt_close($stmt);

        return array($id, $user_name, $password);
    } else {
        header("location: log_in.php?err=non_user");
        exit;
    }
}

function login_user($conn, $password, $email)
{
    $user = check_user($conn, $email);
    $verify = password_verify($password, $user[2]);
    if ($verify != true) {
        header("location: log_in.php?err=password_no_match");
        exit();
    }
    $_SESSION['user_id'] = $user[0];
    $_SESSION['username'] = $user[1];
    header("location: home.php");
    exit;
}

function empty_value_login($email, $password)
{
    if (empty($email)) {
        header('location: log_in.php?err=empty_email_login');
        exit();
    } else if (empty($password)) {

        header("location: log_in.php?err=empty_password");
        exit();
    }
}
ob_end_flush();
?>