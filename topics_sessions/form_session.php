<!-- this page is form ask_form session to restrict its direct url usage and for session access-->

<?php
if (!isset($_GET['form_id']) || $_GET['form_id'] != true) {
    header('location: /PHP/Forum_website/layouts/community.php');
    exit;
} else {
    session_start();
    $_SESSION['form_id'] = $_GET['form_id'];
    $_SESSION['category_name'] = $_GET['code_name'];

    header("location: /PHP/Forum_website/layouts/ask_form.php");
    exit;
}
