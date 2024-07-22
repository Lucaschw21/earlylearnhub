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

            include("headerbefore.php");
            include("inc/connect.php");

            if(isset($_SESSION['email'])){
                $_SESSION = array();
                session_destroy();
            } else {    
        ?>
        

        <section>
            <div class="wrapper">
                <div class="switch">
                    <div class="user" onclick="tab1();">User</div>
                    <div class="admin" onclick="tab2();">Admin</div>
                </div>

                <div class="container">
                    <div class="login-form">
                        <h2>Login as User</h2>
                        <form method="post" id="loginForm" action="login-backend.php" onsubmit="return checkLoginInputs(event)">
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
                            
                            <div class="rmb-me">
                                <label><input type="checkbox">Remember me</label>
                                <a href="#">Forget Password?</a>
                            </div>
        
                            <input type="submit" name="submit" value="Login" class="btn">
                            <div class="login-register">    
                                <p>Don't have an account? <a href="signup.php" class="register-link">Become a member</a></p>
                            </div>
                        </form>
                    </div>

                    <div class="login-form">
                        <h2>Login as Admin</h2>
                        <form action="logAdmin-backend.php" method="post" id="adminloginForm" onsubmit="return checkAdminLoginInputs(event)">
                            <div class="input-box">
                                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                                <input type="email" id="adminemail" name="email">
                                <label>Email</label>
                                <small>Message</small>
                            </div>
        
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                                <input type="password" id="adminpassword" name="password">
                                <label>Password</label>
                                <small>Message</small>
                            </div>
                            
                            <div class="rmb-me">
                                <label><input type="checkbox">Remember me</label>
                                <a href="#">Forget Password?</a>
                            </div>
        
                            <input type="submit" name="submit" value="Login" class="btn">
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>

        <script type="text/javascript" src="scripts/toggleSwitch.js"></script>
        <script type="text/javascript" src="scripts/script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>

        <?php
            }
        ?>