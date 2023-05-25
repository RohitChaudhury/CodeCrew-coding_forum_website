<!-- The reply form submit redirects to this page -->
<?php
function empty_reply($reply)
{
    if (empty($reply)) {
        header("location: answer.php?err=empty_reply");
        exit;
    }
}

// When the user submits the form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $reply = $_POST['reply'];

    // check if the user submits an empty answer
    empty_reply($reply);

    require('db_connect.php');
    session_start();
    $user = $_SESSION['user_id'];
    $cat_id = $_SESSION['category_id'];
    $topic_id = $_SESSION['topic_id'];

    $sql = "INSERT INTO `answer_topic` (`id`, `user_id`, `category_id`, `topic_id`, `answer`, `created_at`, `updated_at`) VALUES (NULL, $user, $cat_id, $topic_id, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $reply);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Unable to connect with the server....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    } else {
        header("location: answer.php?success=reply");
        exit;
    }
} else {
    header("location: index.php");
    exit;
}
