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
            include("headerAdmin.php");

            $username = $_POST["chg-username"];
            $eml = $_POST["chg-email"];
            $password = $_POST["chg-password"];

            $name = $_SESSION["name"];
            $email = $_SESSION["email"];

            $sql2 = "SELECT * FROM admin WHERE Admin_Name = '$username' AND Admin_Name != '$name'";
            $result2 = $conn->query($sql2);

            $sql3 = "SELECT * FROM admin WHERE Admin_Email = '$eml' AND Admin_Email != '$email'";
            $result3 = $conn->query($sql3);

            
                
        ?>

        <section>
            <div class="wrapper-message">
                <div class="login-form">
                    <?php 
                        if($password === ""){
                            if($result2->num_rows > 0){
                                echo "<h2>Username already taken. Enter a new one.</h2>";
                                echo "<meta http-equiv=\"refresh\" content=\"3;URL=adminEditProf.php\">";
                            } else if ($result3->num_rows > 0){
                                echo "<h2>Email already taken. Enter a new one.</h2>";
                                echo "<meta http-equiv=\"refresh\" content=\"3;URL=adminEditProf.php\">";
                            } else {
                                $sql = "UPDATE admin SET Admin_Name='" . $username . "', Admin_Email = '" . $eml . "' WHERE Admin_Email = '$email'";
                                $result = $conn->query($sql);
                            }
                            
                            
                        } else {
                            if($result2->num_rows > 0){
                                echo "<h2>Username already taken. Enter a new one.</h2>";
                                echo "<meta http-equiv=\"refresh\" content=\"3;URL=adminEditProf.php\">";
                            } else if ($result3->num_rows > 0){
                                echo "<h2>Email already taken. Enter a new one.</h2>";
                                echo "<meta http-equiv=\"refresh\" content=\"3;URL=adminEditProf.php\">";
                            } else {
                                $options = [
                                    'cost' => 12
                                ];
                    
                                $hashedPass = password_hash($password, PASSWORD_BCRYPT, $options);
                    
                                $sql = "UPDATE admin SET Admin_Name='" . $username . "', Admin_Email = '" . $eml . "', Admin_Password = '" . $hashedPass . "' WHERE Admin_Email = '$email'";
                                $result = $conn->query($sql);
                            }
                        }
                        
                        if($conn->query($sql) === TRUE){
                            echo "<h2>Data $email had been updated!</h2>";
                            echo "<h3 align='center'>You will be logged out.<h3>";
                            echo "<meta http-equiv=\"refresh\" content=\"3;URL=login.php\">";
                        } else {
                            echo "<h2>Error: " . $sql . "<br>" . $conn->error. "</h2>";
                            echo "<meta http-equiv=\"refresh\" content=\"3;URL=adminEditProf.php\">";
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
