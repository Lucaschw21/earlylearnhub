<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EarlyLearn Hub</title>
        <link rel="stylesheet" href="styles/headerfooter.css">
        <link rel="stylesheet" href="styles/formValidate.css">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
        <script type="text/javascript" src="scripts/script.js"></script>
    </head>

    <body>

        <?php
            session_start();

            include("inc/connect.php");
            include("headerafter.php");

            $username = $_POST["chg-username"];
            $eml = $_POST["chg-email"];
            $password = $_POST["chg-password"];

            $oldusername = $_SESSION["username"];
            $oldemail = $_SESSION["email"];

            $sql2 = "SELECT * FROM user WHERE User_Username = '$username' AND User_Username != '$oldusername'";
            $result2 = $conn->query($sql2);

            $sql3 = "SELECT * FROM user WHERE User_Email = '$eml' AND User_Email != '$oldemail'";
            $result3 = $conn->query($sql3);
                
        ?>

        <section>
            <div class="wrapper-message">
                <div class="login-form">
                <?php 
                        if($password === ""){
                            if($result2->num_rows > 0){
                                echo "<h2>Username already taken. Enter a new one.</h2>";
                                echo "<meta http-equiv=\"refresh\" content=\"3;URL=editProfile.php\">";
                            } else if ($result3->num_rows > 0){
                                echo "<h2>Email already taken. Enter a new one.</h2>";
                                echo "<meta http-equiv=\"refresh\" content=\"3;URL=editProfile.php\">";
                            } else {
                                $sql = "UPDATE user SET User_Username='" . $username . "', User_Email = '" . $eml . "' WHERE User_Email = '$oldemail'";
                                $result = $conn->query($sql);

                                if($conn->query($sql) === TRUE){
                                    echo "<h2>Data $oldemail had been updated!</h2>";
                                    echo "<h3 align='center'>You will be logged out.<h3>";
                                    echo "<meta http-equiv=\"refresh\" content=\"3;URL=login.php\">";
                                } else {
                                    echo "<h2>Error: " . $sql . "<br>" . $conn->error. "</h2>";
                                    echo "<meta http-equiv=\"refresh\" content=\"3;URL=editProfile.php\">";
                                }
                            }
                            
                            
                        } else {
                            if($result2->num_rows > 0){
                                echo "<h2>Username already taken. Enter a new one.</h2>";
                                echo "<meta http-equiv=\"refresh\" content=\"3;URL=signup.php\">";
                            } else if ($result3->num_rows > 0){
                                echo "<h2>Email already taken. Enter a new one.</h2>";
                                echo "<meta http-equiv=\"refresh\" content=\"3;URL=signup.php\">";
                            } else {
                                $options = [
                                    'cost' => 12
                                ];
                    
                                $hashedPass = password_hash($password, PASSWORD_BCRYPT, $options);
                    
                                $sql = "UPDATE user SET User_Username='" . $username . "', User_Email = '" . $eml . "', User_Password = '" . $hashedPass . "' WHERE User_Email = '$oldemail'";
                                $result = $conn->query($sql);

                                if($conn->query($sql) === TRUE){
                                    echo "<h2>Data $oldemail had been updated!</h2>";
                                    echo "<h3 align='center'>You will be logged out.<h3>";
                                    echo "<meta http-equiv=\"refresh\" content=\"3;URL=login.php\">";
                                } else {
                                    echo "<h2>Error: " . $sql . "<br>" . $conn->error. "</h2>";
                                    echo "<meta http-equiv=\"refresh\" content=\"3;URL=editProfile.php\">";
                                }
                            }
                        }
                        
                        

                        $conn->close();
                    ?>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>

        
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
