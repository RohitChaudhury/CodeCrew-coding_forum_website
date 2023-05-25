<!-- This is the login page -->

<?php require('header.php') ?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Chivo+Mono:wght@500&display=swap');

  footer {
    position: fixed;
    bottom: 0;
    width: 100%;
  }

  .form {
    background-color: white;
    width: 50%;
    margin-left: 25.6%;
    padding: 2rem;
    border-radius: 6px;
  }

  .btn {
    display: grid;
    place-items: center;
  }

  .heading {
    font-family: 'Chivo Mono', monospace;
    margin-top: 4%;
    margin-left: 38%;
    color: azure;
    text-shadow: 0px 2px 2px #000000;
  }

  .animate__animated {
    animation-duration: 1s;
    animation-fill-mode: both;
  }

  /* Define the animation */
  .animate__fadeInUp {
    animation-name: fadeInUp;
  }

  /* Customize the animation keyframes */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translate3d(0, 100%, 0);
    }

    to {
      opacity: 1;
      transform: none;
    }
  }

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


  .reset {
    position: absolute;
    bottom: 12.9%;
  }

  .back {
    float: right;
    position: relative;
    bottom: 42.8px;

  }

  .back a:hover {
    text-decoration: none;
  }

  .popup {
    animation-name: fadeIn;
    animation-duration: 1s;
    animation-delay: 0s;
    width: 24%;
    float: right;
    margin-top: 2.8%;
  }
</style>


<body style="background-image: url('https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');">
  <header>
    <nav class="navbar navbar-expand-lg" style="background-color:#cb9931;">
      <a class="navbar-brand" href="index.php" style="color: black;">CodeCrew</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="Collapse navbar-nav ml-auto">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="about_unlogged.php" style="color: black;">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="log_in.php" style="color: black;">Old User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_up.php" style="color: black;">New here</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


  <!-- script to display the error if any after submitting the form -->
  <?php
  if (isset($_GET["err"])) {
    echo '<div class = "popup">';
    if ($_GET["err"] == "non_user") {
      echo ('
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Invalid credentials, user does not exist
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>');
    } else if ($_GET["err"] == "password_no_match") {
      echo ('
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Incorrect!</strong> Incorrect Password or email.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>');
    } else if ($_GET["err"] == "empty_email_login") {
      echo ('
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid!</strong> Email can not be empty
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>');
    } else if ($_GET["err"] == "empty_password") {
      echo ('
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid!</strong> password is needed to login
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>');
    } else if ($_GET["err"] == "logout") {
      echo ('
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You have been logged out successfully.....
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>');
    }
    echo '</div>';
  }
  ?>

  <!-- main log_in form -->
  <div class="heading">
    <h2 class="display-6">Login to CodeCrew</h2>
  </div>
  <div class="form animate__animated animate__fadeInUp">
    <form action="submit_login_form.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      </div>
      <div class="btn">
        <button type="submit" class="btn btn-success">LessGo!</button>
      </div>
      <div class="reset">
        <button type="reset" class="btn btn-info">Reset</button>
      </div>
      <div class="back">
        <a href="index.php"><button href="index.php" type="button" class="btn btn-danger">Back</button></a>
      </div>
    </form>
  </div>

  <?php require('footer.php') ?>