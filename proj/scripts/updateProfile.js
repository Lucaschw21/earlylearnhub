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
    
    if(passwordValue != '') {
        if (passwordValue.length < 8){
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

        if(passwordValue !== confirmPassValue) {
            setErrorFor(confirmPass, 'Passwords does not match');
            isValid = false;
        } else{
            setSuccessFor(confirmPass);
        }
    } else {
        setSuccessFor(confirmPass);
        setSuccessFor(password);
    }

    if (isValid) {
        return true;
    } else {
        event.preventDefault();
        return false;
    }
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
}

function setSuccessFor(input) {
    const inputBox = input.parentElement;
    inputBox.className = 'input-box success';
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

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