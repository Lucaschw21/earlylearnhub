<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EarlyLearn Hub</title>
        <link rel="stylesheet" href="styles/headerfooter.css">
        <link rel="stylesheet" href="styles/formValidate.css">
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
        
    </head>

    <body>

        <?php
            include("inc/connect.php");
            include("headerAdmin.php"); 
            $username = $_POST['username'];
            $eml = $_POST['email'];
            $password = $_POST['password'];

            $options = [
                'cost' => 12
            ];

            $hashedPass = password_hash($password, PASSWORD_BCRYPT, $options);

            $sql2 = "SELECT * FROM user WHERE User_Username = '$username'";
            $result2 = $conn->query($sql2);

            $sql3 = "SELECT * FROM user WHERE User_Email = '$eml'";
            $result3 = $conn->query($sql3);

        ?>
        <section>
            <div class="wrapper-message">
                <div class="login-form">
                    <?php 
                        if($result2->num_rows > 0){
                            echo "<h2>Username already taken. Enter a new one.</h2>";
                            echo "<meta http-equiv=\"refresh\" content=\"3;URL=signup.php\">";
                        } else if ($result3->num_rows > 0){
                            echo "<h2>Email already taken. Enter a new one.</h2>";
                            echo "<meta http-equiv=\"refresh\" content=\"3;URL=signup.php\">";
                        } else {
                            $sql = "INSERT INTO user(User_Username, User_Email, User_Password) VALUES ('$username', '$eml', '$hashedPass')" or 
                            die("Error inserting data into table");
            
                            if($conn->query($sql) === TRUE){
                                echo "<h2>New record created successfully</h2>";
                                echo "<meta http-equiv=\"refresh\" content=\"3;URL=login.php\">";
                            } else {
                                echo "<h2>Error: " . $sql . "<br>" . $conn->error."</h2>";
                            }
                        }
                        $conn->close();
                    ?>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>

        <script type="text/javascript" src="scripts/script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
