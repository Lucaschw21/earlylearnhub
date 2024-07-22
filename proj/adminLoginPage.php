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
                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                            }    

                            include("inc/connect.php");
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

        <section>
            <article>
                <div class="features">
                    <h2>User RECORD</h2>
                    <div class="buttons">
                        <form action="addNewUser.php" method="post">
                            <input type="submit" name="submit" class="addUser" value="+ ADD NEW USER">
                        </form>
                        <form action="pdf/generatePdf.php" method="post" target="_blank">
                            <input type="submit" name="submit" class="pdfBtn" value="GENERATE PDF">
                        </form>
                    </div>
                </div>

                
                

                <div class="search-bar">
                    <form action="" method="post">
                        <input type="text" name="search_keyword" class="search-input" placeholder="Search user..." value="<?php if(isset($_POST['search_keyword'])){ echo htmlentities($_POST['search_keyword']); }?>">
                        <button type="submit" name="search_submit">Search</button>
                    </form>
                </div>

                <?php
                    // if (session_status() == PHP_SESSION_NONE) {
                    //     session_start();
                    // }

                    // include("inc/connect.php");

                    if(isset($_POST['search_submit'])){
                        $searchKeyword = $_POST['search_keyword'];
                    } else {
                        $searchKeyword = "";
                    }

                    if(empty($searchKeyword)){
                        $sql2 = "SELECT * FROM user ORDER BY User_ID asc";
                    } else {
                        $sql2 = "SELECT * FROM user WHERE User_ID LIKE '%$searchKeyword%' OR LOWER(User_Username) LIKE LOWER('%$searchKeyword%') OR LOWER(User_Email) LIKE LOWER('%$searchKeyword%') ORDER BY User_ID asc";
                    }
                    
                    $result2 = $conn->query($sql2);

                    if($result2->num_rows > 0){


                ?>

                <div id = "main">
                    <table width = 60%>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th colspan="2">Update</th>
                        </tr>

                        <?php 
                            while($row2 = $result2->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>".$row2['User_ID']."</td>";
                                echo "<td>".$row2['User_Username']."</td>";
                                echo "<td>".$row2['User_Email']."</td>";
                        ?>

                        <td align="center"><a href="updateUser.php?id=<?php echo $row2['User_ID']; ?>">Edit</a></td>
                        <td align="center"><a href="#" onclick="isDelete()">Delete</a></td>
                        
                        <script>
                            function isDelete(){
                                if(confirm("Are you sure to delete?") == true){
                                    location.href = "deleteUser.php?id=<?php echo $row2['User_ID']; ?>";
                                } else{
                                    return;
                                }
                            }
                        </script>

                        <?php echo "</tr>";
                            } 
                        } else {
                            echo "<h3 align='center' style='margin-top:20px;'>There is no user in the database.</h3>";
                        }
    
                        $conn->close();                       
                        ?>
                    </table>
                </div>
            </article>
        </section>

        <?php include("footer.php"); ?>

        

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script type="text/javascript" src="scripts/script.js"></script>
    </body>
</html>
