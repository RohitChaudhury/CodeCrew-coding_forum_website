<!-- This form is redierected when the delete button is triggered in the community.php -->

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['topic_id'];

    require('db_connect.php');
    $sql = "DELETE FROM `topic_category` WHERE `topic_category`.`id` = $id";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("location: community.php?success=delete");
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
