<?php
//This is the landing page of the website    
require('header.php');
?>
<style>
  .heading {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20%;
    margin-top: 10.8%;
    font-family: 'Maven Pro';
    text-shadow: 0px -4px 2px #000000;
    width: fit-content;
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

  .btn-success {
    position: relative;
    bottom: 250px;
    left: 33%;
  }

  .btn-info {
    position: relative;
    bottom: 250px;
    left: 48%;
  }

  footer {
    position: fixed;
    bottom: 0;
    width: 100%;
  }
</style>

<body style="overflow:hidden; background-image: url('https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');">
  <header>
    <nav class="navbar navbar-expand-lg" style="background-color:#cb9931;">
      <a class="navbar-brand" href="#" style="color: black;">CodeCrew</a>
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
            <a class="nav-link" href="sign_up.php" style="color: black;">New here</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


  <span class="heading animate__animated animate__fadeInUp">
    <h1 class="display-3 text-white">Welcome to CodeCrew, a Community beyond Forum </h1>
  </span>

  <a href="log_in.php"><button type="button" class="btn btn-success animate__animated animate__fadeInUp">I'm an oG!</button></a>
  <a href="sign_up.php"><button type="button" class="btn btn-info animate__animated animate__fadeInUp">I'm new here!</button></a>



  <?php
  //this is the footer of the website
  require('footer.php') ?>