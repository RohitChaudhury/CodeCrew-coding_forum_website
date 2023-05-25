<!-- for securing this page from direct url usage -->
<?php
session_start();
if (!isset($_SESSION['form_id']) || $_SESSION['form_id'] != true) {
    header('location: community.php');
    exit;
}
?>

<!-- this form is to allow the user to enter new question related topics -->
<?php
require("header.php");
?>
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
        background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1484&q=80');
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

    .form {
        animation-name: fadeIn;
        animation-duration: 1s;
        animation-delay: 0s;
        border: .5px solid black;
        border-radius: 4px;
    }

    .navbar {
        z-index: 2;
        position: sticky;
        top: 0;
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
                    <a class="dropdown-item" href="/PHP/Forum_website/topics_sessions/user_profile_sessions.php?user_id=<?php echo ($_SESSION['user_id'])  ?>"><i class="fa-solid fa-pencil"></i>&nbsp;&nbsp;Edit Profile</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-right-from-bracket fa-sm"></i>&nbsp;&nbsp;&nbsp;Logout</i></a>
                </div>
            </div>
        </ul>
    </nav>

    <!-- Modal for logout-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">No!</button>
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
                    Are you sure you want to post your Problem?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No!</button>
                    <button type="button" class="btn btn-success" onclick="submitForm()">Yeah</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to display the errors  -->
    <?php
    if (isset($_GET["err"])) {
        echo '<div class = "popup">';
        if ($_GET['err'] == "empty_subject") {
            echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> Please enter a subject to Post.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        }
        if ($_GET['err'] == "empty_question") {
            echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> Please explain your matter for the developers.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        }
        echo '</div>';
    } else if (isset($_GET['success'])) {
        echo '<div class = "popup">';
        echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You question has been posted successfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        echo '</div>';
    }
    ?>

    <img class="bg-image" alt="image">
    <main>
        <div class="heading">
            <div class="display-4 text-center mt-5 text-shadow" style="font-size:xxx-large; font-weight:347;animation-name: fadeIn;
        animation-duration: 1s;
        animation-delay: 0s; margin-bottom: 2%;">
                Share Your Issue with the Community
            </div>
        </div>

        <div>
            <form id="myForm" action="askform_submit.php" method="post" class="form bg-light col-md-6 mx-auto mb-6" style="padding: 2rem;">
                <div class="form-group" style="font-family: 'Montserrat', sans-serif;
                    font-family: 'Rubik', sans-serif;">
                    <h2>
                        What's the matter?
                    </h2>
                    <?php
                    echo ('<small id="emailHelp" class="form-text text-muted">Please ask here if your problem is related to ' . $_SESSION['category_name'] . ' programming, to restrict any malpractices. Otherwise, visit your language\'s category incase of any other language than ' . $_SESSION['category_name'] . '</small>');
                    ?>
                </div>
                <div class="form-group">
                    <label for="subject">Subject of the Problem: </label>
                    <input type="text" class="form-control col-sm-15" aria-describedby="emailHelp" placeholder="eg: Stuck while exiting Vim" name="subject" value="<?php echo isset($_SESSION['subject_ask']) ? $_SESSION['subject_ask'] : ''; ?>">
                    <small id="emailHelp" class="form-text text-muted">Choose a nice and short subject for your problem.</small>
                </div>

                <div class="form-group">
                    <label for="question">Explain your Problem: </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="question"><?php echo isset($_SESSION['question_ask']) ? $_SESSION['question_ask'] : ''; ?></textarea>
                    <small id="emailHelp" class="form-text text-muted">Explaining your problem might help the Community for better-understanding</small>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="reset" class="btn btn-info">Reset</button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_2">Post</button>
                    <a href="community.php"><button type="button" class="btn btn-danger">Back</button></a>
                </div>
            </form>
            <?php
            if (isset($_SESSION['subject_ask']) || isset($_SESSION['question_ask'])) {
                if (isset($_SESSION['subject_ask']) && !isset($_SESSION['question_ask'])) {
                    unset($_SESSION['subject_ask']);
                } else if (isset($_SESSION['question_ask']) && !isset($_SESSION['subject_ask'])) {
                    unset($_SESSION['question_ask']);
                } else {
                    unset($_SESSION['subject_ask']);
                    unset($_SESSION['question_ask']);
                }
            }
            ?>
        </div>
    </main>

    <script>
        function submitForm() {
            document.getElementById("myForm").submit();
        }
    </script>
    <?php require('footer.php'); ?>