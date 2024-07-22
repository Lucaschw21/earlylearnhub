<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EarlyLearn Hub</title>
        <link rel="stylesheet" href="styles/headerfooter.css">
        <link rel="stylesheet" href="styles/adminLogin.css">
        <link rel="stylesheet" href="styles/userProfile.css">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    </head>

    <body>
        <header>
            <h1 class="logo"><a href="adminLoginPage.php">EarlyLearn Hub (Admin)</a></h1>
            <img src="image/profileicon.png" alt="Profile Icon" class="user-pic" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <ion-icon name="person"></ion-icon>
                        <?php 
                            //session_start();

                            $eml = $_SESSION['email'];
                            $password = $_SESSION['password'];

                            $sql = "SELECT * FROM admin WHERE Admin_Email = '$eml'";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<h3>" . $row['Admin_Name'] . "</h3>";

                        ?>
                    </div>
                    <?php
                        echo "<p style='font-size:0.8em; margin-left:75px;'>". $row['Admin_Email'] . "</p>";
                                }
                            } else{
                                echo "0 results";
                            }
                    ?>
                    <hr>

                    <a href="adminEditProf.php" class="sub-menu-link">
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
                let subMenu = document.getElementById("subMenu");
    
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
