// path: assets/js/script.js
//////////////////////////////////////////////////////
// Script for managing registration and login forms //
//////////////////////////////////////////////////////

// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function () {

    const registerForm = document.querySelector("#registerForm");
    const loginForm = document.querySelector("#loginForm");

    // If either form is not found, exit the script
    if (!registerForm || !loginForm) {
        return;
    }
    
    // Registration variables
    const registerSubmit = document.querySelector("#registerSubmit");
    let loginReg = registerForm.querySelector(".login");
    let passwordReg = registerForm.querySelector(".password");
    let password2 = registerForm.querySelector("#password2");
    let errorReg = registerForm.querySelector(".error");
    let inscription = document.querySelector("#inscriptionDiv");
    // Login variables
    const loginSubmit = document.querySelector("#loginSubmit");
    let loginLog = loginForm.querySelector(".login");
    let passwordLog = loginForm.querySelector(".password");
    let errorLog = loginForm.querySelector(".error");
    let connexion = document.querySelector("#connexionDiv");
    
    const switchReg = document.querySelector("#switchReg");
    const switchLog = document.querySelector("#switchLog");

    let str = window.location.href;
    let url = new URL(str);
    let choice = url.searchParams.get("choice");

    let validateReg = false;
    let validateLog = false;

    // Display the login form
    function displayLoginForm () {
        // Hide the registration form
        inscription.style.display = "none";
        // Display the login form
        connexion.style.display = "block";
        // Change the title
        document.title = "Connexion";
    };

    // Display the registration form
    function displayRegisterForm () {
        // Hide the login form
        connexion.style.display = "none";
        // Display the registration form
        inscription.style.display = "block";
        // Change the title
        document.title = "Inscription";
    };

    // Initial display based on URL parameter (switching between forms)
    if(choice === "register") {
        displayRegisterForm();
    } else {
        displayLoginForm();
    }

    /////////////////
    // INSCRIPTION //
    /////////////////

    // Login verification
    function checkLoginReg() {
        if(loginReg.value === "") {
            loginReg.style.borderColor = "#ff0000";
            loginReg.nextElementSibling.style.color = "#ff0000";
            loginReg.nextElementSibling.innerHTML = "Veuillez saisir un login";
            validateReg = false;
        } else {
            loginReg.nextElementSibling.innerHTML = "";
            let dataLogin = new FormData();
            dataLogin.append("verifLogin", loginReg.value);
            fetch("/verification.php", {
                method: "POST",
                body: dataLogin
            })
            .then(response => response.text())
            .then((data) => {
                data = data.trim();
                if(data === "indispo") {
                    loginReg.style.borderColor = "#ff0000";
                    loginReg.nextElementSibling.style.color = "#ff0000";
                    loginReg.nextElementSibling.innerHTML = "Ce login est déjà pris";
                    validateReg = false;
                } else if(data === "dispo") {
                    loginReg.style.borderColor = "#00ff00";
                    loginReg.nextElementSibling.innerHTML = "";
                    validateReg = true;
                    dataLogin.delete("verifLogin");
                } 
            })
            .catch(error => console.log(error));
        }
    };

    // Password verification
    function checkPasswordReg() {
        if(passwordReg.value === "") {
            passwordReg.style.borderColor = "#ff0000";
            passwordReg.nextElementSibling.style.color = "#ff0000";
            passwordReg.nextElementSibling.innerHTML = "Veuillez saisir un mot de passe";
            validateReg = false;
        } else {
            passwordReg.nextElementSibling.innerHTML = "";
            validateReg = true;
        }
    };

    // Password2 verification
    function checkPassword2() {
        if(password2.value === "") {
            password2.style.borderColor = "#ff0000";
            password2.nextElementSibling.style.color = "#ff0000";
            password2.nextElementSibling.innerHTML = "Veuillez confirmer votre mot de passe";
            validateReg = false;
        } else if(password2.value !== passwordReg.value) {
            password2.style.borderColor = "#ff0000";
            password2.nextElementSibling.style.color = "#ff0000";
            password2.nextElementSibling.innerHTML = "Les mots de passe ne correspondent pas";
            validateReg = false;
        } else {
            password2.nextElementSibling.innerHTML = "";
            validateReg = true;
        }
    };

    ////////////////
    // CONNECTION //
    ////////////////

    // Login verification
    function checkLoginLog() {
        if(loginLog.value === "") {
            loginLog.style.borderColor = "#ff0000";
            loginLog.nextElementSibling.style.color = "#ff0000";
            loginLog.nextElementSibling.innerHTML = "Veuillez saisir un login";
            validateLog = false;
        } else {
            loginLog.nextElementSibling.innerHTML = "";
            let dataLogin = new FormData();
            dataLogin.append("verifLogin", loginLog.value);
            fetch("/verification.php", {
                method: "POST",
                body: dataLogin
            })
            .then(response => response.text())
            .then(data => {
                data = data.trim();
                if(data === "dispo") {
                    loginLog.style.borderColor = "#00ff00";
                    loginLog.nextElementSibling.style.color = "#00ff00";
                    loginLog.nextElementSibling.innerHTML = "Ce login est libre";
                    validateLog = false;
                } else if(data === "indispo") {
                    loginLog.nextElementSibling.innerHTML = "";
                    validateLog = true;
                    dataLogin.delete("verifLogin");
                }
            })
            .catch(error => console.log(error));
        }
    };

    // Password verification
    function checkPasswordLog() {
        if(passwordLog.value === "") {
            passwordLog.style.borderColor = "#ff0000";
            passwordLog.nextElementSibling.style.color = "#ff0000";
            passwordLog.nextElementSibling.innerHTML = "Veuillez saisir un mot de passe";
            validateLog = false;
        } else {
            passwordLog.nextElementSibling.innerHTML = "";
            validateLog = true;
        }
    };

    /////////////////////
    // EVENT LISTENERS //
    /////////////////////
    
    ///// REGISTER /////
    
    // login
    loginReg.addEventListener("blur", checkLoginReg);
    // password
    passwordReg.addEventListener("blur", checkPasswordReg);
    // password2
    password2.addEventListener("keyup", checkPassword2);

    // registerSubmit
    registerSubmit.addEventListener("click", (e) => {
        e.preventDefault();

        // Check form fields before submission
        checkLoginReg();
        checkPasswordReg();
        checkPassword2();

        // If validation fails, exit the function
        if (!validateReg) return;

        // Disable the submit button to prevent multiple submissions
        registerSubmit.disabled = true;

        // Retrieve registration form data
        let data = new FormData(registerForm);
        data.append("register", "envoi");

        fetch("/verification.php", {
            method: "POST",
            body: data
        })
        .then(response => response.text())
        .then(msg => {
            msg = msg.trim();
            if(msg === "Inscription réussie !") {
                displayLoginForm();
            } else {
                errorReg.style.color = "#ff0000";
                errorReg.innerHTML = msg;
            }
        })
        .catch(error => {
            console.log(error);
            errorReg.style.color = "#ff0000";
            errorReg.innerHTML = "Une erreur est survenue côté serveur.";
        })
        .finally(() => {
            // Re-enable the submit button after processing
            registerSubmit.disabled = false;
        });
    });

    // switchReg
    if (switchReg) {
        switchReg.addEventListener("click", (e) => {
            e.preventDefault();
            displayRegisterForm();
        });
    }

    ///// LOGIN /////

    // Add event listener for the loginLog input
    loginLog.addEventListener("blur", checkLoginLog);

    // Add event listener for the passwordLog input
    passwordLog.addEventListener("blur", checkPasswordLog);

    // Add event listener for the loginSubmit button
    loginSubmit.addEventListener("click", (e) => {
        e.preventDefault();

        // Check form fields before submission
        checkLoginLog();
        checkPasswordLog();

        if (!validateLog) return;

        loginSubmit.disabled = true;

        // Retrieve login form data
        let data = new FormData(loginForm);
        data.append("connect", "envoi");

        fetch("/verification.php", {
            method: "POST",
            body: data
        })
        .then(response => response.text())
        .then(msg => {
            msg = msg.trim();
            if(msg === "Connexion réussie !") {
                errorLog.style.color = "#00ff00";
                errorLog.innerHTML = msg;

                setTimeout(() => {
                    window.location.href = "profil.php";
                }, 1000);
            } else {
                passwordLog.style.borderColor = "#ff0000";
                passwordLog.nextElementSibling.style.color = "#ff0000";
                passwordLog.nextElementSibling.innerHTML = msg;
            }
        })
        .catch(error => {
            console.log(error);
            errorLog.style.color = "#ff0000";
            errorLog.innerHTML = "Une erreur est survenue côté serveur.";
        })
        .finally(() => {
            loginSubmit.disabled = false;
        });
    });

    // switchlog
    if (switchLog) {
        switchLog.addEventListener("click", (e) => {
            e.preventDefault();
            displayLoginForm();
        });
    }

});