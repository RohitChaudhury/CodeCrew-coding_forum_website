<!-- This page is trigerred when an unregisterd user reaches the about section  -->

<?php require('header.php'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap');

    .heading {
        font-family: 'Poppins', sans-serif;
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

    .navbar {
        z-index: 2;
        position: sticky;
        top: 0;
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
        background-image: url('https://images.unsplash.com/photo-1634711853733-9bff20b2639d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
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

    .container {
        display: grid;
        place-items: center;
    }

    .about {
        animation-name: fadeIn;
        animation-duration: 1s;
        animation-delay: 0s;
        background: white;
        border: 1px solid black;
        border-radius: 4px;

    }

    h2 {
        font-family: 'Open Sans', sans-serif;
    }

    p {
        font-family: 'Raleway', sans-serif;
    }

    ul {
        font-family: 'Raleway', sans-serif;
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
                    <a class="dropdown-item" href="log_in.php"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp;Login</a>
                    <a class="dropdown-item" href="sign_up.php"><i class="fa-solid fa-user-plus"></i>&nbsp;&nbsp;Register</a>
                </div>
            </div>
        </ul>
    </nav>

    <!-- background image of the page -->
    <img class="bg-image" alt="image">

    <main>
        <div class="heading">
            <div class="display-4 text-center mt-5 text-shadow" style="font-size:xxx-large; font-weight:600;animation-name: fadeIn;
        animation-duration: 1s;
        animation-delay: 0s; margin-bottom: 2%;">
                Welcome To CodeCrew
            </div>
        </div>
    </main>

    <div class="container">
        <div class="about">
            <div class="text my-4 mr-4 ml-4">
                <h2>About CodeCrew</h2>
                <p>The ultimate destination for programmers and developers to connect, learn, and collaborate. Our forum is designed to foster a vibrant community where users can explore various programming languages, share knowledge, and find solutions to their coding challenges.</p>

                <h2>Our Mission</h2>
                <p>At CodeCrew, our mission is to provide a platform that empowers programmers to grow their skills, exchange ideas, and contribute to the collective knowledge of the developer community. We believe in the power of collaboration and aim to create an inclusive environment where developers of all levels can thrive.</p>

                <h2>Features</h2>
                <ul>
                    <li>Domain-specific categories for Python, C, C++, PHP, Java, JavaScript, Ruby, Rust, C#, Swift, Dart, and Go</li>
                    <li>User registration and authentication system</li>
                    <li>Create and manage topics related to specific programming languages</li>
                    <li>Engage in discussions and receive solutions from the community</li>
                    <li>Upvote and downvote answers to highlight the most helpful responses</li>
                    <li>User profiles with reputation points and badges</li>
                    <!-- Add more features specific to your forum -->
                </ul>

                <h2>Get Involved</h2>
                <p>Join the CodeCrew community today and take part in shaping the future of coding discussions. Whether you are a beginner or an experienced programmer, your voice matters. Share your knowledge, ask questions, and contribute to the growth of our vibrant community.</p>

                <center>
                    <p>Happy coding! &#x1F609;</p>
                </center>
            </div>

            <!-- Include your website footer -->
        </div>
    </div>
    </div>
    <?php require('footer.php'); ?>
</body>