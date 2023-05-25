<!-- This is the session page when the user will submit the answer of the topic -->

<?php
// die($_GET['topic_id']);

if (isset($_GET['topic_id'])) {
    session_start();
    $_SESSION['topic_id'] = $_GET['topic_id'];
    header('location: /PHP/Forum_website/layouts/answer.php');
    exit;
} else {
    header("location: /PHP/Forum_website/layouts/community.php");
    exit;
}
?>