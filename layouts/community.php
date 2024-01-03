<?php
// if the user didn't selected a topic or manipulating the url
session_start();
if (!isset($_SESSION['category_id']) || $_SESSION['category_id'] != true) {
  header("location: home.php");
  exit;
}
?>

<!-- This page represents the threads of questions after selects a particular category -->
<?php require("header.php"); ?>

<style>
  @keyframes fadeInAnimation {
    0% {
      opacity: 0;
      transform: scale(0.9);
    }

    60% {
      opacity: 1;
      transform: scale(1.05);
    }

    100% {
      opacity: 1;
      transform: scale(1);
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

  .heading {
    font-family: 'Chivo Mono', monospace;
  }

  .card {
    opacity: 0;
    animation: fadeInAnimation ease-in 1s forwards;
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
    background-image: url('https://images.unsplash.com/photo-1534972195531-d756b9bfa9f2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');
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

  .topics {
    animation-name: fadeIn;
    animation-duration: 1s;
    animation-delay: 0s;
    border: 0.5px solid black;
    width: 96%;
    border-radius: 4px;
  }

  .questions a {
    color: black;
  }

  .user_name a {
    text-decoration: none;
  }

  .user_name a:hover {
    text-decoration: none;
    color: #FF69B4;
  }

  .operation a {
    text-decoration: none;
    color: black;
  }

  .operation a:hover {
    text-decoration: none;
    color: grey;
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
          <a class="dropdown-item" href="/../topics_sessions/user_profile_sessions.php?user_id=<?php echo ($_SESSION['user_id'])  ?>"><i class="fa-solid fa-pencil"></i>&nbsp;&nbsp;Edit Profile</a>
          <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-right-from-bracket fa-sm"></i>&nbsp;&nbsp;&nbsp;Logout</i></a>
        </div>
      </div>
    </ul>
  </nav>

  <?php
  // for errors in inputs
  if (isset($_GET['err'])) {
    echo '<div class = "popup">';
    if ($_GET['err'] == "empty_subject") {
      echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid!</strong> Please enter a subject to edit....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
    } else if ($_GET['err'] == "empty_question") {
      echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid!</strong> Please enter a question to edit....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
    } else if ($_GET['err'] == "search_empty") {
      echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Invalid!</strong> Please enter a valid text to search....
          button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
          </div>');
    }
    echo '</div>';
  }

  // if the user operates successfully
  else if (isset($_GET['success'])) {
    echo '<div class = "popup">';
    if ($_GET['success'] == "update") {
      echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Done!</strong> Topic has been edited succcessfully.....
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>');
    } else if ($_GET['success'] == "delete") {
      echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Done!</strong> Topic has been removed succcessfully.....
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;<d/span>
  </button>
  </div>');
    }
    echo '</div>';
  }
  ?>

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

  <img class="bg-image" alt="image">
  <!-- body of the main content of the page -->
  <main style="margin-right: 10%;">
    <div class="container">
      <div class="d-flex justify-content-around flex-row mt-5 mb-6" style="width: 112%; margin-bottom: 6%;">

        <!-- main logo for the image -->
        <?php
        require_once('/Applications/MAMP/htdocs/../layouts/db_connect.php');
        $cat_id = $_SESSION['category_id'];

        // fetching the category data from the session
        $sql = "SELECT * FROM `intro_category` WHERE id = $cat_id";
        $quer = mysqli_query($conn, $sql);

        if (mysqli_num_rows($quer) > 0) {
          $category = mysqli_fetch_assoc($quer);
          echo ('
          <div class="card shadow" style="margin-right: 2%;">
        <div class="card-shadow">
          <div class="card-header my-2 mx-2">
            <img src="' . $category['image_link'] . '" alt="logo">
          </div>
        </div>
      </div>

      <!-- description as intro for the card -->
      <div class="card shadow" style="width: 70%;">
        <div class="card-shadow">
          <div class="card-content my-2 mx-2" style="padding: 1rem;">
            <div class="heading">
              <h1 class="display-6 text-shadow">Hey there! Thanks for visiting the ' . $category['name'] . ' Community.</h1>
            </div>
            <div class="content">
              <h5 class="mt-4" style="font-size: x-large;
    font-weight: 250; font-family: \'Josefin Sans\', sans-serif;text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">' . $category['description_intro'] . '</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>');
        }
        ?>

        <!-- related topics and its questions -->
        <div class="topics bg-white" style="margin-left: 7.5%;">
          <div class="topics_heading d-flex justify-content-between flex-row">
            <h4 class="py-4 ml-4" style="font-family: 'Rubik', sans-serif;">Browse Topic(s)</h4>
            <!-- Search bar using PHP -->
            <div class="search mt-4">
              <form class="form-inline my-2 my-lg-0" id="Search" action="search_result.php" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search using Subject or question" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              </form>
            </div>



            <div>
              <?php
              echo ('<a href="/../topics_sessions/form_session.php?form_id=' . $_SESSION['category_id'] . '&code_name=' . $category['name'] . '"><button type="button" class="btn btn-small btn-success ms-auto my-4 mr-2">Ask?</button></a>');
              ?>
            </div>
          </div>
          <div class="questions">
            <ul class="list-group">
              <?php
              if (!isset($_SESSION['search']) || $_SESSION['search'] != true) {
                $sql = "SELECT * FROM `topic_category` WHERE category_id = $cat_id";
                $quer = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($quer);
                if ($rows > 0) {
                  while ($result = mysqli_fetch_assoc($quer)) {
                    // for the name of the user(s):
                    $user_name_id = $result['user_id'];
                    $query = "SELECT * FROM `users_auth` WHERE id = $user_name_id";
                    $execute = mysqli_query($conn, $query);
                    $data = mysqli_fetch_assoc($execute);
                    $user_name = $data['user_name'];

                    if ($result['user_id'] == $_SESSION['user_id']) {
                      echo ('
                  <li class="list-group-item bg-light">
                <h5 style="font-family: ' . 'Roboto Slab' . ', serif;"><a href="/../topics_sessions/answer_session.php?topic_id=' . $result['id'] . '">' . $result['subject'] . '</a></h5>
                <div class="user_name" style="font-family: \'Raleway\', sans-serif;"><i class="fa-solid fa-circle-user"></i><a href="/../topics_sessions/user_profile_sessions.php?user_id=' . $data['id'] . '"> ' . $user_name . '</a></div>
                <a href="/../topics_sessions/answer_session.php?topic_id=' . $result['id'] . '">
                  <div class="text-muted" style="font-weight: 300;"> 
                    Q: ' . $result['question']
                        . '</div>
                      <div class="time m-0 float-left">
                      ');

                      // for displaying the time of crated or updated
                      if ($result['updated_at'] == $result['created_at']) {
                        echo (nl2br("\n"));
                        $time = date('jS F Y \a\t H:i:s', strtotime($result['updated_at']));
                        echo ('
                        <div class = "text-muted small">' . $time . ' &nbsp;</div>
                        ');
                      } else {
                        echo (nl2br("\n"));
                        $time = date('jS F Y \a\t H:i:s', strtotime($result['updated_at']));
                        echo ('
                        <div class = "text-muted small"> at ' . $time . ' &nbsp;<i>(edited)</i></div>
                        ');
                      }
                      echo ('</div>
                    <div class="operation mt-2 float-right">
                    <a href="#" class="edit-topic-button" title="Edit topic" data-toggle="modal" data-target="#exampleModal_edit_topic" data-topic_id="' . $result['id'] . '" data-topic="' . $result['subject'] . '" data-question="' . $result['question'] . '"><i class="fa-solid fa-pencil"></i> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="delete-topic-button" title="delete topic" data-toggle="modal" data-target="#exampleModal_delete" data-topic_id="' . $result['id'] . '"><i class="fa-solid fa-trash-can"></i> Delete</a>
                    </a>
                    </div>
                    </li>
                  ');
                    } else {
                      echo ('
                  <li class="list-group-item bg-light">
                <h5 style="font-family: ' . 'Roboto Slab' . ', serif;"><a href="/../topics_sessions/answer_session.php?topic_id=' . $result['id'] . '">' . $result['subject'] . '</a></h5>
                <div class="user_name" style="font-family: \'Raleway\', sans-serif;"><i class="fa-solid fa-circle-user"></i><a href="/../topics_sessions/user_profile_sessions.php?user_id=' . $data['id'] . '"> ' . $user_name . '</a></div>
                <a href="/../topics_sessions/answer_session.php?topic_id=' . $result['id'] . '">
                  <div class="text-muted" style="font-weight: 300;"> 
                    Q: ' . $result['question']
                        . '</div></a>');

                      // for displaying the time of crated or updated
                      echo ('<div class="time m-0 float-left">');
                      if ($result['updated_at'] == $result['created_at']) {
                        echo (nl2br("\n"));
                        $time = date('jS F Y \a\t H:i:s', strtotime($result['updated_at']));
                        echo ('
                        <div class = "text-muted small">' . $time . ' &nbsp;</div>
                        ');
                      } else {
                        echo (nl2br("\n"));
                        $time = date('jS F Y \a\t H:i:s', strtotime($result['updated_at']));
                        echo ('
                        <div class = "text-muted small">' . $time . ' &nbsp;<i>(edited)</i></div>
                        ');
                      }
                      echo ('</div>');
                    }
                  }
                } else {
                  echo ('
                <li class="list-group-item bg-light">
                <h5 class = "display-6 text-center" style="font-weight: 300;">Oops! No topics and questions posted yet!.....</h5>
                </li>
                ');
                }
              } else {
                $search = $_SESSION['search'];
                require_once('db_connect.php');

                $category_id = $_SESSION['category_id'];
                $sql_query = "SELECT * FROM topic_category WHERE `category_id` = $category_id AND (`subject` LIKE '%$search%' OR `question` LIKE '%$search%')";
                $q_res = mysqli_query($conn, $sql_query);
                $rows = mysqli_num_rows($q_res);
                if ($rows > 0) {
                  echo ('
                  <li class="list-group-item bg-light">
                  <h4 class = "display-6 text-center" style="font-weight: 400;">Showing Search result for "' . $search . '"</h4>
                  </li>
                  ');
                  while ($result = mysqli_fetch_assoc($q_res)) {
                    // for the name of the user(s):
                    $user_name_id = $result['user_id'];
                    $query = "SELECT * FROM `users_auth` WHERE id = $user_name_id";
                    $execute = mysqli_query($conn, $query);
                    $data = mysqli_fetch_assoc($execute);
                    $user_name = $data['user_name'];

                    if ($result['user_id'] == $_SESSION['user_id']) {

                      echo ('
                    <li class="list-group-item bg-light">
                    <h5 style="font-family: ' . 'Roboto Slab' . ', serif;"><a href="/../topics_sessions/answer_session.php?topic_id=' . $result['id'] . '">' . $result['subject'] . '</a></h5>
                    <div class="user_name" style="font-family: \'Raleway\', sans-serif;"><i class="fa-solid fa-circle-user"></i><a href="/../topics_sessions/user_profile_sessions.php?user_id=' . $data['id'] . '"> ' . $user_name . '</a></div>
                    <a href="/../topics_sessions/answer_session.php?topic_id=' . $result['id'] . '">
                  <div class="text-muted" style="font-weight: 300;"> 
                    Q: ' . $result['question']
                        . '</div>
                      <div class="time m-0 float-left">
                      ');

                      // for displaying the time of crated or updated
                      if ($result['updated_at'] == $result['created_at']) {
                        echo (nl2br("\n"));
                        $time = date('jS F Y \a\t H:i:s', strtotime($result['updated_at']));
                        echo ('
                        <div class = "text-muted small">' . $time . ' &nbsp;</div>
                        ');
                      } else {
                        echo (nl2br("\n"));
                        $time = date('jS F Y \a\t H:i:s', strtotime($result['updated_at']));
                        echo ('
                        <div class = "text-muted small"> at ' . $time . ' &nbsp;<i>(edited)</i></div>
                        ');
                      }

                      echo ('</div>
                    <div class="operation mt-2 float-right">
                    <a href="#" class="edit-topic-button" title="Edit topic" data-toggle="modal" data-target="#exampleModal_edit_topic" data-topic_id="' . $result['id'] . '" data-topic="' . $result['subject'] . '" data-question="' . $result['question'] . '"><i class="fa-solid fa-pencil"></i> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="delete-topic-button" title="delete topic" data-toggle="modal" data-target="#exampleModal_delete" data-topic_id="' . $result['id'] . '"><i class="fa-solid fa-trash-can"></i> Delete</a>
                </div>
                </a>
                </li>
                  ');
                    } else {
                      echo ('
                  <li class="list-group-item bg-light">
                <h5 style="font-family: ' . 'Roboto Slab' . ', serif;"><a href="/../topics_sessions/answer_session.php?topic_id=' . $result['id'] . '">' . $result['subject'] . '</a></h5>
                <div class="user_name" style="font-family: \'Raleway\', sans-serif;"><i class="fa-solid fa-circle-user"></i><a href="/../topics_sessions/user_profile_sessions.php?user_id=' . $data['id'] . '"> ' . $user_name . '</a></div>
                <a href="/../topics_sessions/answer_session.php?topic_id=' . $result['id'] . '">
                  <div class="text-muted" style="font-weight: 300;"> 
                    Q: ' . $result['question']
                        . '</div></a>');

                      // for displaying the time of crated or updated
                      echo ('<div class="time m-0 float-left">');
                      if ($result['updated_at'] == $result['created_at']) {
                        echo (nl2br("\n"));
                        $time = date('jS F Y \a\t H:i:s', strtotime($result['updated_at']));
                        echo ('
                        <div class = "text-muted small">' . $time . ' &nbsp;</div>
                        ');
                      } else {
                        echo (nl2br("\n"));
                        $time = date('jS F Y \a\t H:i:s', strtotime($result['updated_at']));
                        echo ('
                        <div class = "text-muted small">' . $time . ' &nbsp;<i>(edited)</i></div>
                        ');
                      }
                      echo ('</div></li>');
                    }
                  }
                } else {
                  // no search results in this div
                  echo ('
                <li class="list-group-item bg-light">
                <h5 class = "display-6 text-center" style="font-weight: 300;">No Result.....</h5>
                </li>');
                }
              }
              ?>
            </ul>
          </div>
        </div>


        <?php
        if (isset($_SESSION['search'])) {
          unset($_SESSION['search']);
        }
        ?>


        <!-- Modal for editing a topic -->
        <div class="modal fade" id="exampleModal_edit_topic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style=" position: fixed;
        top: 20%;
        margin: 0;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <div class="card-body">
                  <form id="myForm" action="edit_topic_submit.php" method="post">
                    <input type="hidden" id="topic_id" name="topic_id" value="">
                    <div class="form-group">
                      <label for="subject">Subject: </label>
                      <input type="text" class="form-control col-sm-15" id="topic" aria-describedby="emailHelp" placeholder="eg: Stuck while exiting Vim" name="topic" value="">
                      <?php echo ('<small id="emailHelp" class="form-text text-muted">Please post here if your problem is related to ' . $category['name'] . ' programming, to restrict any malpractices.') ?> </small>
                    </div>

                    <div class="form-group">
                      <label for="question">Your Problem: </label>
                      <textarea class="form-control" id="question" rows="3" name="question"></textarea>
                    </div>

                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-success" onclick="submitForm()">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal for deleting a topic -->
        <div class="modal fade" id="exampleModal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style=" position: fixed;
        top: 20%;
        margin: 0;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <div class="card-body">
                  <div class="card-title">Are you Sure you want to delete this Topic?</div>
                  <form id="delete-topic-form" action="delete_topic_submit.php" method="post">
                    <input type="hidden" id="delete_id" name="topic_id" value="">
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No!</button>
                  <button type="button" class="btn btn-success" onclick="submitForm_delete()">Yeah</button>
                </div>
              </div>
            </div>
          </div>
        </div>
  </main>

  <!-- scripts for functionality of the edit and delete form -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    $(document).on('click', '.edit-topic-button', function() {
      var topic = $(this).data('topic');
      var topicId = $(this).data('topic_id');
      var question = $(this).data('question');
      $('#topic_id').val(topicId);
      $('#topic').val(topic);
      $('#question').val(question);
    });

    $(document).on('click', '.delete-topic-button', function() {
      var topicId = $(this).data('topic_id');
      $('#delete_id').val(topicId);
    });

    function submitForm() {
      $('#myForm').submit();
    }

    function submitForm_delete() {
      $('#delete-topic-form').submit();
    }
  </script>

  <?php require_once('footer.php') ?>