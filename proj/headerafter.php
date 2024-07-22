<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EarlyLearn Hub</title>
        <link rel="stylesheet" href="styles/headerfooter.css">
        <link rel="stylesheet" href="styles/userProfile.css">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    </head>

    <body>
        <header>
            <h1 class="logo"><a href="userLoginPage.php">EarlyLearn Hub</a></h1>
            <nav class="header-navigation-after">
                <a href="game.php">GAMES</a>
                <a href="videos.php">VIDEOS</a>
                <a href="forum.php">FORUM</a>
                <a href="guidance.php">GUIDANCE</a>
            </nav>
            <img src="image/profileicon.png" alt="Profile Icon" class="user-pic" onclick="toggleMenu()">

            <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                include("inc/connect.php");

                $eml = $_SESSION['email'];
                $password = $_SESSION['password'];

                $sql = "SELECT * FROM user WHERE User_Email = '$eml'";

                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        if(password_verify($password, $row['User_Password'])){


            ?>

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <ion-icon name="person"></ion-icon>
                        <?php 
                            echo "<h3>" . $row['User_Username'] . "</h3>";
                            //echo "<h8>". $row['User_Email'] . "</h8>";
                        ?>
                    </div>
                    <?php
                        echo "<p style='font-size:0.8em; margin-left:75px;'>". $row['User_Email'] . "</p>"; 
                    ?>
                    <hr>

                    <a href="editProfile.php" class="sub-menu-link">
                        <img src="image/profile.png" alt="Profile">
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>

                    <!-- <a href="#" class="sub-menu-link">
                        <img src="image/setting.png" alt="Setting">
                        <p>Settings</p>
                        <span>></span>
                    </a> -->

                    <a href="#" class="sub-menu-link" onclick="logout()">
                        <img src="image/logout.png" alt="Logout">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>

            <script>
                var subMenu = document.getElementById("subMenu");
    
                function toggleMenu(){
                    subMenu.classList.toggle("open-menu");
                }
    
                function logout(){
                    if(confirm("Are you sure to log out?") == true){
                        location.href = "logout.php";
                    } else{
                        return;
                    }
                }
            </script>
        </header>
    </body>
</html>

<?php
            }
        }
    }

?>