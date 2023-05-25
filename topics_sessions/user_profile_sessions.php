<!-- this is the session page when the user tries to visit the edit Profile page -->

<?php

if (isset($_GET['user_id']) || $_GET['user_id'] == true) {
    session_start();
    $_SESSION['toggle_user_id'] = $_GET['user_id'];
    header("location: /PHP/Forum_website/layouts/user_profile.php");
    exit;
} else {
    $url = $_SERVER['HTTP_REFERER'];
    header("location: $url");
    exit;
}
