<!-- This form is to submit the answer form of the user  -->

<?php

function empty_answer($answer)
{
    if (empty($answer)) {
        header("location: answer.php?err=empty_answer");
        exit;
    }
}

// When the user submits the form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $answer = $_POST['answer'];

    // check if the user submits an empty
    empty_answer($answer);

    require('db_connect.php');
    session_start();
    $user = $_SESSION['user_id'];
    $cat_id = $_SESSION['category_id'];
    $topic_id = $_SESSION['topic_id'];

    $sql = "INSERT INTO `answer_topic` (`id`, `user_id`, `category_id`, `topic_id`, `answer`, `created_at`, `updated_at`) VALUES (NULL, $user, $cat_id, $topic_id, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $answer);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Unable to connect with the server....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    } else {
        header("location: answer.php?success=new_answer");
        exit;
    }
} else {
    header("location: index.php");
    exit;
}
