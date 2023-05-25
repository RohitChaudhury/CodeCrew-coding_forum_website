<!-- this page for storing and managing the session variables after user select a particular category -->

<?php
// if the user didn't selected a topic or manipulating the url
if (!isset($_GET['id']) || $_GET['id'] != true) {
    header("location: /PHP/Forum_website/layouts/home.php");
    exit;
} else {
    session_start();
    $_SESSION['category_id'] = $_GET['id'];
    header("location: /PHP/Forum_website/layouts/community.php");
    exit;
}
?>