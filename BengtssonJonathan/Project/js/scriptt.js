//Function som förflyttar användaren till Logga In-sidan.
function goToSignIn() {
    window.location = "signin.php";
}

//Function som förflyttar användaren till Regestrerings-sidan.
function goToStart() {
    window.location = "index.php";
}




//Funktion som validerar användarens input i signin_form.
function validateSignin() {
    var username = document.forms["signin_form"]["username"].value;
    var password = document.forms["signin_form"]["password"].value;

    var usernameValid = validateUsername(username);
    var passwordValid = validatePassword(password)

    if (!usernameValid) {
        alert("Username invalid.");
    }

    if (!passwordValid) {
        alert("Password invalid.");
    }

    if (usernameValid && passwordValid) {
        return true;
    } else {
        return false;
    }
}

//Funktion som validerar användarens input i register_form.
function validateRegister() {
    var username = document.forms["register_form"]["username"].value;
    var email = document.forms["register_form"]["email"].value;
    var password = document.forms["register_form"]["password"].value;

    var usernameValid = validateUsername(username);
    var emailValid = validateEmail(email);
    var passwordValid = validatePassword(password)

    if (!usernameValid) {
        alert("Invalid Username.");
    }
    if (!emailValid) {
        alert("Email invalid.");
    }
    if (!passwordValid) {
        alert("Invalid Password.");
    }

    if (usernameValid && emailValid && passwordValid) {
        return true;
    }
    return false;
}

//Funktion som validerar användarnamn. 
function validateUsername(username) {
    if (username == "") {
        return false;
    }
    if (!(/^\S{3,}$/.test(username))) {
        return false;
    }
    if (username.length < 5) {
        return false;
    }
    return true;
}

//Funktion som validerar email.
function validateEmail(email) {
    var validEmailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (email.match(validEmailFormat)) {
        return true;
    }
    return false;;
}

//Funktion som validerar lösenord.
function validatePassword(password) {
    if (password == "") {
        return false;
    }
    if (!(/^\S{3,}$/.test(password))) {
        return false;
    }
    if (password.length < 5) {
        return false;
    }
    return true;
}


//Funktion som ser till att användarens input ej är tom eller innehåller bara blanksteg.
function validateComment() {
    var comment = document.forms["comment_form"]["comment"].value;

    if (comment == "") {
        alert("Comment can not be empty!");
    }

    if (comment == " ") {
        alert("Comment can not be empty!");
    }
}