<!-- This is the page when the user submits the edit answer form the Modal -->

<?php

function empty_edit_answer($answer)
{
    if (empty($answer)) {
        header("location: answer.php?err=empty_edit_answer");
        exit;
    }
}


// When the user submits the form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $answer = $_POST['edit_answer'];
    $id = $_POST['answer_id'];
    $time = $currentDateTime = date('Y-m-d H:i:s');
    // check if the user submits an empty answer
    empty_edit_answer($answer);

    require('db_connect.php');

    $sql = "UPDATE `answer_topic` SET `answer` = ?, `updated_at` = ? WHERE `answer_topic`.`id` = $id;";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $answer, $time);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("location: answer.php?success=update");
    } else {
        echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Unable to connect with the server, please try again later......
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>');
    }
} else {
    header("location: index.php");
    exit;
}
