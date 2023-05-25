<!-- This page gets triggered whent the  -->

<?php

function empty_search($search)
{
    if (empty($search)) {
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
        header("location: $referer?err=search_empty");
        exit;
    }
}

// when the user submits the form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $search = $_POST['search'];
    empty_search($search);
    session_start();
    $_SESSION['search'] = $search;
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    header("location: $referer");
    exit;
} else {
    header("location: index.php");
}
