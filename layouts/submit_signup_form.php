<!-- To create the new user -->
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once('db_connect.php');
    require_once('functions.php');
    $email = strtolower($_POST["email"]);
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    empty_value($email, $user_name, $password);
    email_validate($email);
    letter_pass($password);
    check_password($password, $confirm_password);
    user_exist($conn, $email);

    $hash_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO `users_auth` (`id`, `email`, `user_name`, `password`, `t_stamp`) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP);";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $email, $user_name, $hash_password);
    $result = mysqli_stmt_execute($stmt);

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
        header("location: sign_up.php?success=new_user");
        exit;
    }
    echo '</div>';
} else {
    header("location: index.php");
    exit;
}
?>