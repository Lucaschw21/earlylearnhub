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

            if(!isset($_SESSION['email'])){
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
            }

            include("inc/connect.php");

            $sql = "SELECT * FROM user WHERE User_Email = '" . $_SESSION['email'] . "'";
            $result = $conn->query($sql);

            if($result->num_rows == 0){
                include("headerbefore.php");
        ?>

        <section>
            <div class="wrapper-message">
                <div class="login-form">
                    <?php 
                        echo "<h2>Login Fail. Email wrong.</h2>";
                        session_unset();
                        echo "<meta http-equiv=\"refresh\" content=\"3;URL=login.php\">";
            } else {
                $row = $result->fetch_assoc();

                if(!password_verify($_SESSION['password'], $row['User_Password'])){
                    include("headerbefore.php");
                    echo "<section>";
                    echo "<div class='wrapper-message'>";
                    echo "<div class='login-form'>";
                    echo "<h2>Login Fail. Password wrong.</h2>";

                    ?>
                </div>
            </div>
        </section>

        <?php include("footer.php");?>

        
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>

<?php
                    session_unset();
                    echo "<meta http-equiv=\"refresh\" content=\"3;URL=login.php\">";
                } else {
                    //include("adminLoginPage.php");
                    $_SESSION['User_ID'] = $row['User_ID'];
                    $_SESSION['username'] = $row['User_Username'];
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=userLoginPage.php\">";
                }
            }
            //$conn->close();
?>
