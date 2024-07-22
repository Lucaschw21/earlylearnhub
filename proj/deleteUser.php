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

            $id = $_REQUEST['id'];

            $sql = "DELETE FROM user WHERE User_ID = '".$id."'";
            $result = $conn->query($sql);

            if($result === TRUE){

                
        ?>

        <section>
            <div class="wrapper-message">
                <div class="login-form">
                    <?php 
                        echo "<h2>Data $id had been deleted!</h2>";
                        echo "<meta http-equiv=\"refresh\" content=\"3;URL=adminLoginPage.php\">";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                echo "<meta http-equiv=\"refresh\" content=\"3;URL=adminLoginPage.php\">";
            }
                    ?>
                </div>
            </div>
        </section>

        <?php include("footer.php"); $conn->close(); ?>

        
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
