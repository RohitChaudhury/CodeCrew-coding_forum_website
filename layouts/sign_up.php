<!-- This is the sign-up form -->
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
    height: 489px;
    margin-left: 25%;
    padding: 2rem;
    border-radius: 6px;
  }

  .btn {
    display: grid;
    place-items: center;
  }

  .heading {
    margin-left: 27%;
    font-family: 'Chivo Mono', monospace;
    margin-top: 1%;
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
    bottom: 5%;
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
            <a class="nav-link" href="log_in.php" style="color: black;">Old User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="sign_up.php" style="color: black;">New here</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


  <?php
  // for errors in inputs
  if (isset($_GET['err'])) {
    echo '<div class = "popup">';
    if ($_GET['err'] == "user_exist") {
      echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Oops! This email already exits for an user, please login....
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   </div>');
    } else if ($_GET['err'] == "empty_email") {
      echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Failed!</strong>Sorry, email cannot be empty....
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>');
    } else if ($_GET['err'] == "empty_user") {
      echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Failed!</strong>Sorry, User Name cannot be empty....
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
    <strong>Failed!</strong> Password must be of 6 characters.....
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>');
    } else if ($_GET['err'] == "pass_invalid") {
      echo ('<div class="alert alert-danger" role="alert">
    <strong>Failed!</strong> Password must be of 6 characters.....
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
    <strong>Invalid!</strong> Please enter a new password to change.....
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>');
    }
    echo '</div>';
  }
  // if the user successfully created an account
  else if (isset($_GET['success'])) {
    echo '<div class = "popup">';
    echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Welcome!</strong> New user created successfully
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
    echo '</div>';
  }
  ?>

  <div class="heading">
    <h2 class="display-6">Create an account to get started!</h2>
  </div>

  <div class="form animate__animated animate__fadeInUp">
    <form action="submit_signup_form.php" method="post">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="eg: valid_email@gmail.com" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else, we know its privacy.</small>
      </div>
      <div class="form-group">
        <label for="userName">Choose an User Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Probably your name" name="user_name">
      </div>
      <div class="form-group">
        <label for="password">Create Password</label>
        <input type="password" class="form-control" placeholder="Must be of 6 Characters" name="password">
        <small id="password" class="form-text text-muted">Please create a strong password with letters , '/@#$%'</small>
      </div>
      <div class="form-group">
        <label for="confirm_password">Re-type Password</label>
        <input type="password" class="form-control" name="confirm_password">
      </div>
      <div class="btn">
        <button type="submit" class="btn btn-success">Create!</button>
      </div>
      <div class="reset">
        <button type="reset" class="btn btn-info">Reset</button>
      </div>
      <div class="back">
        <a href="index.php"><button href="index.php" type="button" class="btn btn-danger">Back</button></a>
      </div>
  </div>

  <?php require('footer.php') ?>