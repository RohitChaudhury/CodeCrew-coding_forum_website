<!--Restricting side from using this without Authentication -->
<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] != true) {
  header('location: log_in.php');
  exit;
}
?>

<!-- home page after the user log(s) in -->
<?php require('header.php') ?>

<style>
  .navbar {
    z-index: 2;
    position: sticky;
    top: 0;
    padding-top: 10px;
    padding-bottom: 10px;
  }

  h1.thanks {
    animation-name: fadeIn;
    animation-duration: 1s;
    animation-delay: 0s;
    font-weight: bolder;
    font-family: 'Crimson Text', serif;

  }

  .heading {
    animation-name: fadeIn;
    animation-duration: 1s;
    animation-delay: 0s;
    font-weight: bolder;
    margin: 10px 0 12px 0;
    font-family: 'Chivo Mono', monospace;
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

  .categories {
    animation-name: fadeIn;
    animation-duration: 1s;
    animation-delay: 0s;
  }

  .card {
    margin-right: 10px;
  }

  .languages {
    margin-left: 12%;
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
    background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');
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

  .modal {
    position: fixed;
    top: 36%;
    margin: 0;
  }
</style>

<body>

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
          <a class="dropdown-item" href="/topics_sessions/user_profile_sessions.php?user_id=<?php echo ($_SESSION['user_id'])  ?>"><i class="fa-solid fa-pencil"></i>&nbsp;&nbsp;Edit Profile</a>
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

  <img src="url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');" class="bg-image" alt="image">
  <main>
    <div class="container mt-5 mb-6"">
          <h1 class = " thanks display-6 text-center" style="font-size:xxx-large">Thanks for logging in, Welcome <?php echo ($_SESSION['username']); ?>! </h1>
      <div class="heading">
        <h4 class="text-center mt-5 mb-6">Select a Category</h4>
      </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="categories">
      <div class="container">
        <div class="row">
          <!-- For db connection and fetching data from the database dynamically -->
          <?php require_once('db_connect.php');
          $sql = "SELECT * FROM `domains`";
          $quer = mysqli_query($conn, $sql);

          if (mysqli_num_rows($quer) > 0) {
            while ($result = mysqli_fetch_assoc($quer)) {
              echo ('
        <div class="col-md-3 my-4">
          <div class="card shadow">
            <div class="card-header my-2 mx-2">
              <img src="' . $result['image_link'] . '" class="card-img-top" alt="image">
            </div>
            <div class="card-body">
              <h5 class="card-title text-center">' . $result['name'] . '</h5>
              <p class="card-text">' . $result['description'] . '</p>
              <a href="/topics_sessions/community_session.php?id=' . $result['id'] . '" class="card-link">Visit Community</a>
            </div>
          </div>
        </div>
        ');
            }
          }
          ?>
        </div>
      </div>
    </div>
  </main>

  <div class="py-4 bg-white mt-4">
    <div class="container-fluid px-4">
      <div class="d-flex align-items-center justify-content-center small">
        <div class="text-black">Select a language to find a realted topic(s) for its framework, or you can ask also one if required</div>
      </div>
    </div>
  </div>

  <script>
    $('#myModal').on('shown.bs.modal', function() {
      $('#myInput').trigger('focus')
    })
  </script>
  <?php require('footer.php') ?>