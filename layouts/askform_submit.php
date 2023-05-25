<?php

// functions tp validate the ask form after user submits it

function empty_values($subject, $question)
{
    if (empty($subject)) {
        session_start();
        $_SESSION['question_ask'] = $question;
        header("location: ask_form.php?err=empty_subject");
        exit;
    } else if (empty($question)) {
        session_start();
        $_SESSION['subject_ask'] = $subject;
        header("location: ask_form.php?err=empty_question");
        exit;
    }
}

session_start();
// after user enters the form to submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['subject'];
    $question = $_POST['question'];
    $cat_id = $_SESSION['category_id'];
    $user = $_SESSION['user_id'];

    empty_values($subject, $question);
    require_once('db_connect.php');
    $sql = "INSERT INTO `topic_category` (`id`, `category_id`, `user_id`, `subject`, `question`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "iiss", $cat_id, $user, $subject, $question);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Unable to connect with the server, please try again later......
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    } else {
        session_start();
        unset($_SESSION['subject_ask']);
        unset($_SESSION['question_ask']);

        header("location: ask_form.php?success=1");
        exit;
    }
} else {
    header("location: index.php");
    exit;
}
