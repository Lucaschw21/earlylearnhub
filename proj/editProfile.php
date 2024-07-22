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
            session_start();

            include("inc/connect.php");
            include("headerafter.php");

            $eml = $_SESSION['email'];
            $password = $_SESSION['password'];

            $sql = "SELECT * FROM user WHERE User_Email = '$eml'";

            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    if(password_verify($password, $row['User_Password'])){
        ?>

        <section>
            <div class="wrapper-edit">
                <div class="login-form">
                    <h2>Edit Your Profile</h2>
                    <center><small>Leave it if no changes</small></center>
                    <form method="post" id="form" onsubmit="return checkInputs(event)" action="editProfile-backend.php">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="person"></ion-icon></span>
                            <?php //echo "<input type='text' style = 'font-weight: normal' id='username' name='chg-username' value='". $row["User_Username"] . "'>"?>
                            <input type="text" style="font-weight: normal" id="username" name="chg-username" value="<?php echo $row["User_Username"]; ?>">
                            <label>Enter New Username</label>
                            <small>Message</small>
                        </div>

                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <?php //echo "<input type='text' style = 'font-weight: normal' id='email' name='chg-email' value='". $row["User_Email"] . "'>"?>
                            <input type="email" style="font-weight: normal" id="email" name="chg-email" value="<?php echo $row["User_Email"]; ?>">
                            <label>Enter New Email</label>
                            <small>Message</small>
                        </div>
    
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" id="password" name="chg-password">
                            <label>Enter New Password</label>
                            <small>Message</small>
                        </div>

                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" id="confirmPass" name="confirmPass">
                            <label>Confirm your new password</label>
                            <small>Message</small>
                        </div>
                        
                        <input type="submit" name="submit" value="Update" class="btn">
                        <input type="reset" name="reset" value="Reset" class="btn-reset">
                    </form>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>
        
        <script type="text/javascript" src="scripts/updateProfile.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>

        <?php 
                    } else {
                        echo "0 results";
                        break;
                    }
                }
            } else {
                echo "0 results";
            }

            $conn->close();
        ?>