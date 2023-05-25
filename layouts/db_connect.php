<!-- Database connection and others -->
<?php
$server = 'localhost';
$db_username = 'root';
$db_pass = 'root';
$db_name = 'db_forum';

$conn = mysqli_connect($server, $db_username, $db_pass, $db_name);

if (mysqli_connect_errno()) {
  echo ('<div class="alert alert-danger" role="alert">
    <strong>Error!</strong> Failed to connect with the server due to error' . mysqli_connect_error() . '
  </div>');
}
