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
        <?php include("headerbefore.php"); ?>

        <section>
            <div class="wrapper-signup">
                <div class="login-form">
                    <h2>Create an account</h2>
                    <form method="post" id="form" onsubmit="return checkInputs(event)" action="signup-backend.php">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="person"></ion-icon></span>
                            <input type="text" id="username" name="username">
                            <label>Username</label>
                            <small>Message</small>
                        </div>

                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" id="email" name="email">
                            <label>Email</label>
                            <small>Message</small>
                        </div>
    
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" id="password" name="password">
                            <label>Password</label>
                            <small>Message</small>
                        </div>

                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" id="confirmPass" name="confirmPass">
                            <label>Confirm your password</label>
                            <small>Message</small>
                        </div>
                        
                        <div class="rmb-forgot">
                            <label><input type="checkbox" id="agreement">I agree to the terms & conditions</label>
                        </div>
                        
                        <input type="submit" name="submit" value="Register" class="btn">
                        <div class="login-register">    
                            <p>Already have an account? <a href="login.php" class="register-link">Login</a></p>
                            
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>

        <script type="text/javascript" src="scripts/script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>