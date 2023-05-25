<!-- This form is redierected when the delete button is triggered in the ask_form.php -->

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['answer_id'];

    require('db_connect.php');
    $sql = "DELETE FROM `answer_topic` WHERE `answer_topic`.`id` = $id";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("location: answer.php?success=delete");
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
