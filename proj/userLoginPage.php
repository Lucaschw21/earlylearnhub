<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EarlyLearn Hub</title>
        <link rel="stylesheet" href="styles/headerfooter.css">
        <link rel="stylesheet" href="styles/userLogin.css">
        <link rel="stylesheet" href="styles/userProfile.css">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    </head>

    <body>
        <?php 
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
   
            include("inc/connect.php");
            include("headerafter.php"); 
        ?>

        <main>
            <section class="first">
                <div class="first-text">
                    <?php 
                        $email = $_SESSION['email'];
                        $password = $_SESSION['password'];

                        $sql = "SELECT * FROM user WHERE User_Email = '$email'";

                        $result = $conn->query($sql);

                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                if(password_verify($password, $row['User_Password'])){
                                    echo "<h2>Welcome To EarlyLearn Hub, " . $row['User_Username'] . "!<h2>"; 
                                }
                            }
                        }
                    ?>
                </div>
            </section>
        
            <section class="math">
                <h2>Come and try our games!</h2>
                <p>Our games are carefully curated from various interesting math and reading questions to suit the child's need for their early age development</p>
                <button class="btn" onclick="openPage('game.php')">I want to play!  <ion-icon name="arrow-forward"></ion-icon></button>
                <img src="image/math-login.png" alt="EarlyLearn Hub Math Game">
            </section>

            <section class="vid">
                <h2>We provide videos to aid children's learning</h2>
                <p>The videos here are curated by teachers so that they are easy to understand by childrens and able to develop ways of math about math and learning new words.</p>
                <button class="btn" onclick="openPage('videos.php')">Let's Go!  <ion-icon name="arrow-forward"></ion-icon></button>
                <img src="image/vid-login.png" alt="EarlyLearn Hub Video">
            </section>

            <section class="forum">
                <h2>We created a forum dedicated to the users to connect with the EarlyLearn Hub community</h2>
                <p>Users can share experiences, ask questions, and discover tips to make learning enjoyable for their child.</p>
                <button class="btn" onclick="openPage('forum.php')">Let's Chat!  <ion-icon name="arrow-forward"></ion-icon></button>
                <img src="image/forum-login.png" alt="EarlyLearn Hub Forum Page">
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
