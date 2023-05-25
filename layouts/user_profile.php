<!-- This page is triggered when the user visits a user profile or enters to the edit profile page -->
<?php
session_start();
$_SESSION['last_url'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
$last = $_SESSION['last_url'];
if (!isset($_SESSION['toggle_user_id']) || $_SESSION['toggle_user_id'] != true) {
  header("location: $last");
  exit;
}
?>

<?php require_once('header.php'); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
<style>
  @keyframes fadeIn {
    0% {
      opacity: 0;
      transform: translateY(50px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .bg-image {
    animation-name: fadeIn;
    animation-duration: 1s;
    animation-delay: 0s;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('https://images.unsplash.com/photo-1531493731235-b5c309dca387?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80');
    background-size: cover;
    background-position: center;
    opacity: 0.8;
    z-index: -1;
    background-blend-mode: multiply;
  }

  .bg-image:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.8) 100%);

  }

  .text-shadow {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }

  .modal {
    position: fixed;
    top: 36%;
    margin: 0;
  }

  .popup {
    animation-name: fadeIn;
    animation-duration: 1s;
    animation-delay: 0s;
    position: fixed;
    top: 80px;
    right: 20px;
    z-index: 2;
    width: 24%;
  }

  .navbar {
    z-index: 2;
    position: sticky;
    top: 0;
  }

  main {
    animation-name: fadeIn;
    animation-duration: 1s;
    animation-delay: 0s;
  }

  .name {
    font-family: 'Open Sans', sans-serif;
  }
</style>

<body>


</body>
<nav class="navbar navbar-expand-lg position-sticky" style="background-color:#FFFACD;">
  <a class="navbar-brand mx-auto h1 text-center textbig" href="" style="color: black; margin-left: 46%!important;">
    <h4 class="display-6" style="font-family: 'Open Sans', sans-serif;">CodeCrew</h4>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-nav ml-auto">
  </div>

  <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
    <div class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-left">
        <a class="dropdown-item" href="home.php"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a>
        <a class="dropdown-item" href="about.php"><i class="fa-solid fa-eject"></i>&nbsp;&nbsp;About</a>
        <a class="dropdown-item" href=""><i class="fa-solid fa-pencil"></i>&nbsp;&nbsp;Edit Profile</a>
        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-right-from-bracket fa-sm"></i>&nbsp;&nbsp;&nbsp;Logout</i></a>
      </div>
    </div>
  </ul>
</nav>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No!</button>
        <a href="logout.php"><button type="button" class="btn btn-success">Yeah</button></a>
      </div>
    </div>
  </div>
</div>

<!-- Modal for submitting the form-->
<div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to save the changes?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No!</button>
        <button type="button" class="btn btn-success" onclick="submitForm()">Yeah</button>
      </div>
    </div>
  </div>
</div>

<!-- the background image of the page -->
<img class="bg-image" alt="image">
<main>
  <!-- for all the popups -->
  <?php
  if (isset($_GET['err'])) {
    echo '<div class = "popup">';
    if ($_GET['err'] == "empty_email") {
      echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Failed!</strong> Sorry, email cannot be empty....
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    } else if ($_GET['err'] == "empty_user") {
      echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Failed!</strong> Sorry, User Name cannot be empty....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    } else if ($_GET['err'] == "pass_dismatch") {
      echo ('<div class="alert alert-danger" role="alert">
          <strong>Failed!</strong> Passwords dont match......
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    } else if ($_GET['err'] == "pass_invalid") {
      echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Failed!</strong>New Password must be of 6 characters.....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    } else if ($_GET['err'] == "email_invalid") {
      echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Invalid!</strong> Please enter a valid email address.....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    } else if ($_GET['err'] == "empty_password_register") {
      echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Invalid!</strong> Please enter a password....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    }
    echo '</div>';
  } // if the user successfully created an account
  else if (isset($_GET['success'])) {
    echo '<div class = "popup">';
    echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done!</strong> Changes has been saved successfully....
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
    echo '</div>';
  }
  ?>

  <div class="container">
    <?php
    $user_id = $_SESSION['toggle_user_id'];
    if ($user_id == $_SESSION['user_id']) {
      // heading of the page:
      require_once('db_connect.php');
      $sql = "SELECT * FROM `users_auth` WHERE id = $user_id";
      $query = mysqli_query($conn, $sql);
      $result = mysqli_fetch_assoc($query);
      echo ('<div class="heading my-4">
            <div class="display-4 text-center text-shadow" style="font-size:xxx-large; font-weight:347;animation-name: fadeIn;
        animation-duration: 1s;
        animation-delay: 0s; margin-bottom: 2%;">
                Here\'s your Profile , ' . $_SESSION['username'] . '!
            </div>
        </div>
        <h4 class="text-center mt-5" style = " font-family: \'Chivo Mono\', monospace;">Edit Your Profile</h4>
        <div class="d-flex justify-content-center flex-row mt-4 mb-6" style="width: 112%;">

        <div class="card shadow mr-4" style="height: fit-content;">
        <div class="card-shadow">
          <div class="card-header my-2 mx-2">
          <i class="user_icon fa-solid fa-circle-user fa-10x"></i>
          </div>
          <div class="name text-bolder text-center mb-2">
          ' .  $result['user_name'] . '
          </div>
        </div>
      </div>

      <div class="card shadow mr-4" style="width: 60%;">
        <div class="card-content my-2 mx-2" style="padding: 2rem;">

        <form id="myForm" action="submit_user_profile.php" method="post">
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Your Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name = "email" value ="' . $result['email'] . '">
          </div>
        </div>
        <div class="form-group row">
          <label for="user_name" class="col-sm-2 col-form-label">Your Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name = "user_name" value = "' . $result['user_name'] . '">
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">New Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name = "password">
            <small class="form-text text-muted">Enter a new Password if you want to change your old one. Otherwise, you can keep it blank.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="confirm_password" class="col-sm-2 col-form-label">Re-type new Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name = "confirm_password">
          </div>
        </div>
        <div class="form-group row">
          <label for="bio" class="col-sm-2 col-form-label">Your Bio</label>
          <div class="col-sm-10">
          <textarea class="form-control" rows="4" name = "bio">' . $result['bio'] . '</textarea>');
      if ($result['bio'] == null) {
        echo ('<small class="form-text text-muted">There is no nio being set for your Profile. Set a new bio that tell others about yourself.</small>');
      } else {
        echo ('<small class="form-text text-muted">Your Bio is visible to others.</small>');
      }
      echo ('
      </div>
        </div>
        <div class="d-flex justify-content-around">
              <button type="reset" class="btn btn-info">Reset</button>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_2">Save</button>
              <a href="' . $_SESSION['last_url'] . '"><button type="button" class="btn btn-danger">Back</button></a>
            </div>
          </div>
      </form>
      </div>
    </div>
  </div>
        ');
    } else {
      require_once('db_connect.php');
      $sql = "SELECT * FROM `users_auth` WHERE id = $user_id";
      $query = mysqli_query($conn, $sql);
      $result = mysqli_fetch_assoc($query);

      echo ('
            <div class="heading my-4">
            <div class="display-4 text-center text-shadow" style="font-size:xxx-large; font-weight:347;animation-name: fadeIn;
        animation-duration: 1s;
        animation-delay: 0s; margin-bottom: 2%;">
               Hello, this is me, ' . $result['user_name'] . '
            </div>
        </div>

        <h4 class="text-center mt-5" style = " font-family: \'Chivo Mono\', monospace;">Edit Your Profile</h4>
        <div class="d-flex justify-content-center flex-row mt-4 mb-6" style="width: 112%; margin-bottom: 11%;">

        <div class="card shadow mr-4" style="height: fit-content;">
        <div class="card-shadow">
          <div class="card-header my-2 mx-2">
          <i class="user_icon fa-solid fa-circle-user fa-10x"></i>
          </div>
        </div>
        <div class="name text-bolder text-center mb-2">
        ' .  $result['user_name'] . '
        </div>
        </div>
        <div class="card shadow mr-4" style="width: 60%;">
        <div class="card-content my-2 mx-2" style="font-size: x-large;padding: 1rem;
        font-weight: 250; font-family: \'Josefin Sans\', sans-serif; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
        ');

      if ($result['bio'] == null) {
        echo ('<i>There is no Bio given yet by the user!</i>');
      } else {
        echo ($result['bio']);
      }

      echo ('
      </div>
      </div>
      </div>
        ');
    }
    ?>
  </div>
</main>

<script>
  function submitForm() {
    document.getElementById("myForm").submit();
  }
</script>

<?php require_once('footer.php'); ?>