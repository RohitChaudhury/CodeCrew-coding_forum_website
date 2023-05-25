<!-- This page is for the questions and comments by the different user -->

<!-- To restrict the page form the direct uel attack -->
<?php
session_start();
if (!isset($_SESSION['topic_id']) || $_SESSION['topic_id'] != true) {
    header("location: community.php");
    exit;
}
?>

<?php
require('header.php');
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
        background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');
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

    .text-shadow {
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
    }

    main {
        animation-name: fadeIn;
        animation-duration: 1s;
        animation-delay: 0s;
    }

    .com {
        border: 0.5px solid black;
        width: 86%;
        border-radius: 4px;
    }

    extarea.wmd-input,
    textarea#wmd-input {
        padding: 10px;
        margin: -1px 0 0;
        height: 150px;
        line-height: 1.3;
        width: 100%;
        font-family: var(--ff-mono);
        font-size: var(--fs-body2);
        -moz-tab-size: 4;
        -o-tab-size: 4;
        tab-size: 4;
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

    .user_name a {
        color: black;
        text-decoration: none;
    }

    .user_name a:hover {
        text-decoration: none;
        color: #FF69B4;
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
            </div </ul>
    </nav>


    <?php
    // for errors in inputs
    if (isset($_GET['err'])) {
        echo '<div class = "popup">';
        if ($_GET['err'] == "empty_answer") {
            echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid!</strong> Please enter an answer to post....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        } else if ($_GET['err'] == "empty_edit_answer") {
            echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid!</strong> Please enter an answer to post....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        } else if ($_GET['err'] == "empty_reply") {
            echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid!</strong> Please enter a reply to post....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        }
        echo '</div>';
    }
    // if the user operates successfully
    else if (isset($_GET['success'])) {
        echo '<div class = "popup">';
        if ($_GET['success'] == "new_answer") {
            echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Done!</strong> Answer has been submitted succcessfully.....
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>');
        } else if ($_GET['success'] == "update") {
            echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Done!</strong> Answer has been edited succcessfully.....
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>');
        } else if ($_GET['success'] == "delete") {
            echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Done!</strong> Answer has been removed succcessfully.....
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>');
        } else if ($_GET['success'] == "reply") {
            echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Done!</strong> Replied successfuly.....
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
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

    <!-- Modal for submitting the form-->
    <div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Are you sure you want to post your answer?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No!</button>
                    <button type="button" class="btn btn-success" onclick="submitForm_answer()">Yeah</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for submitting the reply form-->
    <div class="modal fade" id="exampleModal_reply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Are you sure you want to reply?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No!</button>
                    <button type="button" class="btn btn-success" onclick="submitForm_reply()">Yeah</button>
                </div>
            </div>
        </div>
    </div>

    <!-- background image of the page -->
    <img class="bg-image" alt="image">
    <main>
        <div style="display: grid; place-items: center;">
            <div class="main_topic bg-white mt-5 mb-6" style="width: 86%; border-radius: 6px;">
                <!-- logo image and label in flex box -->
                <div class="d-flex justify-content-center flex-row">

                    <?php
                    require_once('db_connect.php');
                    $cat_id = $_SESSION['category_id'];
                    $my_sql = "SELECT * FROM `intro_category` WHERE id = $cat_id;";
                    $run = mysqli_query($conn, $my_sql);
                    $get = mysqli_fetch_assoc($run);
                    echo ('
                    <div class="logo_image my-4 ml-4 text-shadow">
                        <img src="' . $get['image_link'] . '" width= "37px" alt="logo">&nbsp;&nbsp;' . $get['name'] . ' Community
                    </div>
                    ');

                    ?>
                </div>

                <!-- To Show the main topic asked by the user -->
                <div class="card ml-4 mr-4 mb-4 shadow" style="border: 0.5px solid black;">
                    <!-- fecthing data from the topic's table -->

                    <?php
                    $topic_id = $_SESSION['topic_id'];
                    // for fecthing the subject and question
                    $sql = "SELECT * FROM `topic_category` WHERE id = $topic_id";
                    $quer = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_assoc($quer);
                    // For the user name: 
                    $user_name_id = $result['user_id'];
                    $query = "SELECT * FROM `users_auth` WHERE id = $user_name_id";
                    $execute = mysqli_query($conn, $query);
                    $data = mysqli_fetch_assoc($execute);
                    $user_name = $data['user_name'];

                    // showing the results in the frontend
                    echo ('
                    <div class="card-body bg-light">
                        <div class="user_name my-2" style="font-family: \'Raleway\', sans-serif;"><a href="/PHP/Forum_website/topics_sessions/user_profile_sessions.php?user_id=' . $data['id'] . '"><i class="fa-solid fa-circle-user"></i>&nbsp;' . $user_name . '</a>
                        </div>
                        <blockquote class="blockquote mb-0">
                            <h5 style="font-family: \'Roboto Slab\', serif;">' . $result['subject'] . '</h5>
                        </blockquote>
                        <div class="text-black" style="font-weight: 400;">Q:&nbsp;' . $result['question'] . '</div>
                    </div>
                    ');
                    ?>
                </div>
            </div>
        </div>

        <!-- To answer the Topic -->
        <?php
        if ($user_name_id == $_SESSION['user_id']) {
            echo ('
        <div style="width: 60%; margin-left: 5.7%;">
            <div class="addComment mt-5 mb-4 ml-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add something for your question: </h5>
                        <form id="myForm" action="answer_submit_form.php" method="post">
                            <p class="card-text"><textarea id="wmd-input" class="wmd-input s-input bar0 js-post-body-field processed" data-editor-type="wmd" data-post-type-id="2" cols="92" rows="15" data-min-length="" name="answer" placeholder= "you can add further questions or answer here"></textarea></p>
                            <div class="d-flex justify-content-between">
                                <button type="reset" class="btn btn-info">Reset</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_2">Post</button>
                                <a href="community.php"><button type="button" class="btn btn-danger">Back</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        }
        ');
        } else {
            echo ('
            <div style="width: 60%; margin-left: 5.7%;">
            <div class="addComment mt-5 mb-4 ml-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your answer: </h5>
                        <form id="myForm" action="answer_submit_form.php" method="post">
                            <p class="card-text"><textarea id="wmd-input" class="wmd-input s-input bar0 js-post-body-field processed" data-editor-type="wmd" data-post-type-id="2" cols="92" rows="15" data-min-length="" name="answer" placeholder= "Your answer will be displayed in discussion(s)"></textarea></p>
                            <div class="d-flex justify-content-between">
                                <button type="reset" class="btn btn-info">Reset</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal_2">Post</button>
                                <a href="community.php"><button type="button" class="btn btn-danger">Back</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        }
            
            ');
        }
        ?>
        <!-- For answer display to the user -->
        <div style="display: grid; place-items: center;">
            <div class="com bg-light mt-5 mb-6" style="border: radius 6px;">
                <div class="comments_heading">
                    <?php
                    // fetching answers from the answer's table
                    $code = "SELECT * FROM `answer_topic` WHERE topic_id = $topic_id";
                    $db = mysqli_query($conn, $code);
                    $rows = mysqli_num_rows($db);
                    ?>
                    <h4 class="py-4 ml-4" style="font-family: 'Rubik', sans-serif;"><i class="fa-solid fa-comment-dots"></i>&nbsp;&nbsp;<?php echo ($rows); ?> Discussion(s)</h4>
                </div>
                <div class="comments">
                    <ul class="list-group">

                        <?php
                        if ($rows > 0) {
                            while ($answer = mysqli_fetch_assoc($db)) {
                                // fetching the profile name of the users who had answered.
                                $name_id = $answer['user_id'];
                                $name_code = "SELECT * FROM `users_auth` WHERE id = $name_id";
                                $run_code = mysqli_query($conn, $name_code);
                                $name = mysqli_fetch_assoc($run_code);

                                if ($name_id == $_SESSION['user_id']) {
                                    echo ('
                            <li class="list-group-item bg-white">
                                <div class="user_name" style="font-family: \'Raleway\', sans-serif;"><a href="/PHP/Forum_website/topics_sessions/user_profile_sessions.php?user_id=' . $name['id'] . '"><i class="fa-solid fa-circle-user"></i>&nbsp;' . $name['user_name'] . '</a></div>
                                <div style="font-weight: 300;">' . $answer['answer'] . '</div>');

                                    // for displaying the time of crated or updated
                                    echo ('<div class="time m-0 float-left">');
                                    if ($answer['updated_at'] == $answer['created_at']) {
                                        echo (nl2br("\n"));
                                        $time = date('jS F Y \a\t H:i:s', strtotime($answer['updated_at']));
                                        echo ('
        <div class = "text-muted small">' . $time . ' &nbsp;</div>
        ');
                                    } else {
                                        echo (nl2br("\n"));
                                        $time = date('jS F Y \a\t H:i:s', strtotime($answer['updated_at']));
                                        echo ('
        <div class = "text-muted small"> at ' . $time . ' &nbsp;<i>(edited)</i></div>
        ');
                                    }

                                    echo ('</div>');

                                    echo ('<div class="operation mt-2 float-right">
                                <a href="#" class="edit-answer-button" title="Edit answer" data-toggle="modal" data-target="#exampleModal_form" data-answer="' . $answer['answer'] . '" data-answer-id="' . $answer['id'] . '"><i class="fa-solid fa-pencil"></i> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="delete-answer-button" title="delete answer" data-toggle="modal" data-target="#exampleModal_delete" data-answer-id="' . $answer['id'] . '"><i class="fa-solid fa-trash-can"></i> Delete</a>
                            </div>
                            </li>
                            ');
                                } else {
                                    echo ('
                                    <li class="list-group-item bg-white">
                                        <div class="user_name" style="font-family: \'Raleway\', sans-serif;"><a href="/PHP/Forum_website/topics_sessions/user_profile_sessions.php?user_id=' . $name['id'] . '"><i class="fa-solid fa-circle-user"></i>&nbsp;' . $name['user_name'] . '</a></div>
                                        <div style="font-weight: 300;">' . $answer['answer'] . '</div>');

                                    // for displaying the time of crated or updated
                                    echo ('<div class="time m-0 float-left">');
                                    if ($answer['updated_at'] == $answer['created_at']) {
                                        echo (nl2br("\n"));
                                        $time = date('jS F Y \a\t H:i:s', strtotime($answer['updated_at']));
                                        echo ('
                        <div class = "text-muted small">' . $time . ' &nbsp;</div>
                        ');
                                    } else {
                                        echo (nl2br("\n"));
                                        $time = date('jS F Y \a\t H:i:s', strtotime($answer['updated_at']));
                                        echo ('
                        <div class = "text-muted small"> at ' . $time . ' &nbsp;<i>(edited)</i></div>
                        ');
                                    }

                                    echo ('</div></li>');
                                }
                            }
                            echo ('
                            <li class="list-group-item bg-white">
                            <form id="reply_form" action="reply_form_submit.php" method = "post">
                            <div class="form-group">
                            <label for="reply"><i class="fa-solid fa-comment-dots"></i> Your Reply:</label>
                            <textarea class="form-control" rows="3" placeholder = "use @name to mention a particular user" name = "reply"></textarea>
                            </div>
                            <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal_reply"><i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                            </form>
                            </li>
                            ');
                        } else {
                            echo ('
                                    <li class="list-group-item bg-light">
                                    <h5 class = "display-6 text-center" style="font-weight: 300;">No answers posted by community yet!.....</h5>
                                    </li>'
                            );
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>


        <!-- Modal for editing form -->
        <div class="modal fade" id="exampleModal_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style=" position: fixed;
        top: 20%;
        margin: 0;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card-body">
                            <h5 class="card-title">Your Answer: </h5>
                            <form id="edit-answer-form" action="edit_answer_submit.php" method="post">
                                <textarea class="form-control" id="answer-textarea" rows="3" name="edit_answer"></textarea>
                                <input type="hidden" id="answer-id" name="answer_id" value="">
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

        <!-- Modal for deleting an answer -->
        <div class="modal fade" id="exampleModal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style=" position: fixed;
        top: 20%;
        margin: 0;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="card-title">Are you Sure you want to delete this answer?</div>
                            <form id="delete-answer-form" action="delete_answer_submit.php" method="post">
                                <input type="hidden" id="delete_answer_id" name="answer_id" value="">
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
</body>

<!-- Script to subit the form -->
<script>
    function submitForm_answer() {
        document.getElementById("myForm").submit();
    }
</script>
<!-- submiting the form and other JS -->
<script>
    function submitForm_reply() {
        document.getElementById("reply_form").submit();
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    $(document).on('click', '.edit-answer-button', function() {
        var answer = $(this).data('answer');
        var answerId = $(this).data('answer-id');
        $('#answer-textarea').val(answer);
        $('#answer-id').val(answerId);
    });

    $(document).on('click', '.delete-answer-button', function() {
        var answerId = $(this).data('answer-id');

        $('#delete_answer_id').val(answerId);
    });

    function submitForm() {
        $('#edit-answer-form').submit();
    }

    function submitForm_delete() {
        $('#delete-answer-form').submit();
    }
</script>

<?php require('footer.php'); ?>