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
            include("headerAdmin.php"); 
        ?>

        <section>
            <div class="wrapper-add">
                <div class="login-form">
                    <h2>Add New User</h2>
                    <form method="post" id="form" onsubmit="return checkInputs(event)" action="addNewUser-backend.php">
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

                        <input type="submit" name="submit" value="Add" class="btn">
                    </form>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>

        <script>
            function checkInputs(event) {
                const username = document.getElementById('username');
                const email = document.getElementById('email');
                const password = document.getElementById('password');
                const confirmPass = document.getElementById('confirmPass');

                const usernameValue = username.value.trim();
                const emailValue = email.value.trim();
                const passwordValue = password.value.trim();
                const confirmPassValue = confirmPass.value.trim();

                let isValid = true;
                
                if(usernameValue === '') {
                    setErrorFor(username, 'Username cannot be blank');
                    isValid = false;
                } else if (!usernameValue.match(/.*[0-9].*/)) {
                    setErrorFor(username, 'Username must contain a number');
                    isValid = false;
                } else if (usernameValue.length < 6) {
                    setErrorFor(username, 'Username should be at least 6 characters long');
                    isValid = false;
                } else {
                    setSuccessFor(username);
                }
                
                if(emailValue === '') {
                    setErrorFor(email, 'Email cannot be blank');
                    isValid = false;
                } else if (!isEmail(emailValue)) {
                    setErrorFor(email, 'Not a valid email');
                    isValid = false;
                } else {
                    setSuccessFor(email);
                }
                
                if(passwordValue === '') {
                    setErrorFor(password, 'Password cannot be blank');
                    isValid = false;
                } else if (passwordValue.length < 8){
                    setErrorFor(password, "Password should be at least 8 characters long");
                    isValid = false;
                } else if (!passwordValue.match(/.*[A-Z].*/)){
                    setErrorFor(password, "Password should have at least one capital letter");
                    isValid = false;
                } else if (!passwordValue.match(/.*[#?!@$%^&*-].*/)){
                    setErrorFor(password, "Password should have at least one special character (#?!@$%^&*-)");
                    isValid = false;
                } else {
                    setSuccessFor(password);
                }
                
                if(confirmPassValue === '') {
                    setErrorFor(confirmPass, 'This section cannot be blank');
                    isValid = false;
                } else if(passwordValue !== confirmPassValue) {
                    setErrorFor(confirmPass, 'Passwords does not match');
                    isValid = false;
                } else{
                    setSuccessFor(confirmPass);
                }

                if (isValid) {
                    return true;
                } else {
                    event.preventDefault();
                    return false;
                }
                //return isValid;
            }

            function setErrorFor(input, message) {
                const inputBox = input.parentElement;
                const small = inputBox.querySelector('small');

                inputBox.className = 'input-box error';

                if (small) {
                    small.innerText = message;
                } else {
                    console.error("Element not found in the DOM.");
                }
                //small.innerText = message;
            }

            function setSuccessFor(input) {
                const inputBox = input.parentElement;
                inputBox.className = 'input-box success';
            }

            function isEmail(email) {
                return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
            }

            //let usernameError = ''; // Define usernameError variable outside the function

            function handleUsernameChange() {
                const usernameInput = document.getElementById('username');
                const username = usernameInput.value.trim();

                const usernameError = '';

                if (username === '') {
                    usernameError = 'Username cannot be blank';
                } else if (!username.match(/.*[0-9].*/)) {
                    usernameError = 'Username must contain a number';
                } else if (username.length < 6) {
                    usernameError = 'Username should be at least 6 characters long';
                } else {
                    usernameError = '';
                }

                // Update the error message displayed
                const errorElement = document.querySelector('#username + small');
                if (errorElement) {
                    errorElement.textContent = usernameError;
                }
            }
        </script>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>