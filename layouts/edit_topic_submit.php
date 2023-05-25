<!-- This page is triggered when the user submits the edit topic page in the community -->

<?php
function empty_edit_values($subject, $question)
{
    if (empty($subject)) {
        header("location: community.php?err=empty_subject");
        exit;
    } else if (empty($question)) {
        header("location: community.php?err=empty_question");
        exit;
    }
}
// after user enters the form to submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['topic_id'];
    $subject = $_POST['topic'];
    $question = $_POST['question'];
    $time = $currentDateTime = date('Y-m-d H:i:s');

    empty_edit_values($subject, $question);
    require_once('db_connect.php');
    $sql = "UPDATE `topic_category` SET `subject` = ?, `question` = ?, `updated_at` = ? WHERE `topic_category`.`id` = $id;";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $subject, $question, $time);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("location: community.php?success=update");
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
