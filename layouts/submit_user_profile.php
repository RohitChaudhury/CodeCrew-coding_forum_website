<!-- This page os triggered when the user submits the edit_profile form -->

<?php
function empty_values_with_pass($email, $user_name, $password)
{
    if (empty($email)) {
        header('location: user_profile.php?err=empty_email');
        exit();
    } else if (empty($user_name)) {
        header("location: user_profile.php?err=empty_user");
        exit();
    } else if (empty($password)) {
        header("location: user_profile.php?err=empty_password_register");
        exit();
    }
}
function empty_values($email, $user_name)
{
    if (empty($email)) {
        header('location: user_profile.php?err=empty_email');
        exit();
    } else if (empty($user_name)) {
        header("location: user_profile.php?err=empty_user");
        exit();
    }
}

function check_password($password, $confirm_password)
{
    $password = trim($password);
    $confirm_password = trim($confirm_password);
    if ($password !== $confirm_password) {
        header('location: user_profile.php?err=pass_dismatch');
        exit();
    }
}

function letter_pass($password)
{
    if (strlen($password) < 6) {
        header('location: user_profile.php?err=pass_invalid');
        exit();
    }
}

function email_validate($email)
{
    $validate = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($validate != True) {
        header('location: user_profile.php?err=email_invalid');
        exit();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $id = $_SESSION['user_id'];

    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $bio = $_POST['bio'];

    if ($password != null) {
        empty_values_with_pass($email, $user_name, $password);
        email_validate($email);
        letter_pass($password);
        check_password($password, $confirm_password);
        $hash_password = password_hash($password, PASSWORD_BCRYPT);
    } else if ($password == null && $confirm_password != null) {
        header("location: user_profile.php?err=empty_password_register");
        exit;
    } else {
        empty_values($email, $user_name);
        email_validate($email);
    }

    require_once('db_connect.php');

    if ($password == null) {
        $sql = "UPDATE `users_auth` SET `email` = ?, `user_name` = ?, `bio` = ? WHERE `users_auth`.`id` = $id;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $email, $user_name, $bio);
        $result = mysqli_stmt_execute($stmt);
    } else {
        $sql = "UPDATE `users_auth` SET `email` = ?, `user_name` = ?, `password` = ?, `bio` = ? WHERE `users_auth`.`id` = $id;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $email, $user_name, $hash_password, $bio);
        $result = mysqli_stmt_execute($stmt);
    }
    echo '<div class = "popup">';
    if ($result === FALSE) {
        echo ('
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Failed to connect with the server
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
  ');
    } else {
        header("location: user_profile.php?success=edited");
        exit;
    }
    echo '</div>';
} else {
    header("location: index.php");
    exit;
}
