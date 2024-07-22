<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EarlyLearn Hub</title>
        <link rel="stylesheet" href="styles/headerfooter.css">
        <link rel="stylesheet" type="text/css" href="styles/indexPage.css">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    </head>

    <body>
        <?php include("headerbefore.php"); ?>

        <main>
            <section class="first">
                <div class="pre-primary-img">
                    <img src="image/pre-primary.jpg" alt="Kindegarten Cartoon Photo">
                </div>
                <div class="first-text">
                    <h2>Welcome To EarlyLearn Hub!</h2>
                    <p>where pre-primary learning can be really fun.</p>
                    <button class="btnSignup" onclick="openPage('login.php')">Get Started  <ion-icon name="arrow-forward"></ion-icon></button>
                </div>
            </section>
        
            <section class="math">
                <h2>We turn math and reading into a fun games</h2>
                <p>Our games are carefully curated from various interesting math and reading questions to suit the child's need for their early age development</p>
                <img src="image/math.png" alt="EarlyLearn Hub Math Game">
            </section>

            <section class="vid">
                <h2>We provide videos to aid children's learning</h2>
                <p>The videos here are curated by teachers so that they are easy to understand by childrens and able to develop ways of math about math and learning new words.</p>
                <img src="image/video.png" alt="EarlyLearn Hub Video">
            </section>

            <section class="forum">
                <h2>We created a forum dedicated to the users to connect with the EarlyLearn Hub community</h2>
                <p>Users can share experiences, ask questions, and discover tips to make learning enjoyable for their child.</p>
                <img src="image/forum.png" alt="EarlyLearn Hub Forum Page">
            </section>

            <section class="sdg">
                <h2>We aim to ensure that all girls and boys have access to quality pre-primary education so that they are ready for primary education.</h2>
                <div class="sdg-img">
                    <img src="image/sdg.png" alt="Sustainable Development Goal">
                    <img src="image/SDG 4.jpg" alt="SDG 4">
                </div>
            </section>
        </main>

        <?php include("footer.php"); ?>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script type="text/javascript" src="scripts/script.js"></script>
    </body>
</html>
