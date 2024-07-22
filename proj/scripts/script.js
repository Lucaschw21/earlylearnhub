function openPage(val){
    location.href = val;
}

//const form = document.getElementById('form');
//const loginForm = document.getElementById('loginForm');
// const username = document.getElementById('username');
// const email = document.getElementById('email');
// const password = document.getElementById('password');
// const confirmPass = document.getElementById('confirmPass');
// const agreement = document.getElementById("agreement");
// const rmbForgot = document.querySelector(".rmb-forgot");

// const contactForm = document.getElementById('contact-form');
// const contactMessage = document.getElementById('message');
// const subject = document.getElementById('subject');
// const phone = document.getElementById('phone');
// const contactName = document.getElementById('name');

// const forumForm = document.getElementById('forum-form');

function checkingContactInputs(){
    const emailValue = email.value.trim();
    const messageValue = message.value.trim();
    const subjectValue = subject.value.trim();
    const phoneValue = phone.value.trim();
    const nameValue = contactName.value.trim();

    if(emailValue === ''){
        setErrorFor(email, "Email cannot be blank");
    } else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
        setSuccessFor(email);
    }

    if(phoneValue === ''){
        setErrorFor(phone, "Phone cannot be blank");
    } else if(isNaN(phoneValue)){
        setErrorFor(phone, "Please input numbers");
    } else{
        setSuccessFor(phone);
    }

    if(nameValue === ''){
        setErrorFor(contactName, "Name cannot be blank");
    } else{
        setSuccessFor(contactName);
    }

    if(messageValue === ''){
        setErrorFor(contactMessage, "Message cannot be blank");
    } else{
        setSuccessFor(contactMessage);
    }

    if(subjectValue === ''){
        setErrorFor(subject, "Subject cannot be blank");
    } else{
        setSuccessFor(subject);
    }

    
}


function checkContactInputs(event){
    const email = document.getElementById('email');
    const contactMessage = document.getElementById('message');
    const subject = document.getElementById('subject');
    const phone = document.getElementById('phone');
    const contactName = document.getElementById('name');
    
    const emailValue = email.value.trim();
    const messageValue = message.value.trim();
    const subjectValue = subject.value.trim();
    const phoneValue = phone.value.trim();
    const nameValue = contactName.value.trim();

    let isValid = true;

    if(emailValue === ''){
        setErrorFor(email, "Email cannot be blank");
        isValid = false;
    } else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
        isValid = false;
	} else {
        setSuccessFor(email);
    }

    if(phoneValue === ''){
        setErrorFor(phone, "Phone cannot be blank");
        isValid = false;
    } else if(isNaN(phoneValue)){
        setErrorFor(phone, "Please input numbers");
        isValid = false;
    } else{
        setSuccessFor(phone);
    }

    if(nameValue === ''){
        setErrorFor(contactName, "Name cannot be blank");
        isValid = false;
    } else{
        setSuccessFor(contactName);
    }

    if(messageValue === ''){
        setErrorFor(contactMessage, "Message cannot be blank");
        isValid = false;
    } else{
        setSuccessFor(contactMessage);
    }

    if(subjectValue === ''){
        setErrorFor(subject, "Subject cannot be blank");
        isValid = false;
    } else{
        setSuccessFor(subject);
    }

    if (isValid) {
        return true;
    } else {
        event.preventDefault();
        return false;
    }
    
}

function checkLoginInputs(event){
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();

    let isValid = true;

    if(emailValue === ''){
        setErrorFor(email, "Email cannot be blank");
        isValid = false;
    } else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
        isValid = false;
	} else {
        setSuccessFor(email);
    }

    if(passwordValue === ''){
        setErrorFor(password, "Password cannot be blank");
        isValid = false;
    } else if (passwordValue.length < 8){
        setErrorFor(password, "Password should be at least 8 characters long");
        isValid = false;
    } else {
        setSuccessFor(password);
    }

    if (isValid) {
        return true;
    } else {
        event.preventDefault();
        return false;
    }
}

function checkAdminLoginInputs(event){
    const adminemail = document.getElementById('adminemail');
    const adminpassword = document.getElementById('adminpassword');
    const adminemailValue = adminemail.value.trim();
    const adminpasswordValue = adminpassword.value.trim();

    let adminisValid = true;

    if(adminemailValue === ''){
        setErrorFor(adminemail, "Email cannot be blank");
        adminisValid = false;
    } else if (!isEmail(adminemailValue)) {
		setErrorFor(adminemail, 'Not a valid email');
        adminisValid = false;
	} else {
        setSuccessFor(adminemail);
    }

    if(adminpasswordValue === ''){
        setErrorFor(adminpassword, "Password cannot be blank");
        adminisValid = false;
    } else if (adminpasswordValue.length < 8){
        setErrorFor(adminpassword, "Password should be at least 8 characters long");
        adminisValid = false;
    } else {
        setSuccessFor(adminpassword);
    }

    if (adminisValid) {
        return true;
    } else {
        event.preventDefault();
        return false;
    }
}

function checkInputs(event) {
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPass = document.getElementById('confirmPass');
    const agreement = document.getElementById("agreement");

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

    if(agreement.checked){
        setSuccessFor(agreement);
    } else {
        setErrorFor(agreement, "Please agree the T&C");
        isValid = false;
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
    const rmbForgot = document.querySelector(".rmb-forgot");
    const agreement = document.getElementById("agreement");
	const inputBox = input.parentElement;
	const small = inputBox.querySelector('small');
    if(input === agreement){
        rmbForgot.className = 'rmb-forgot error';
    } else {
        inputBox.className = 'input-box error';
    }

    if (small) {
        small.innerText = message;
    } else {
        console.error("Element not found in the DOM.");
    }
	//small.innerText = message;
}

function setSuccessFor(input) {
    const rmbForgot = document.querySelector(".rmb-forgot");
    const agreement = document.getElementById("agreement");
	const inputBox = input.parentElement;
    if(input === agreement){
        rmbForgot.className = 'rmb-forgot success';
    } else {
        inputBox.className = 'input-box success';
    }
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
