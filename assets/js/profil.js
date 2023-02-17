// Script pour la page profil.php

// Charger le DOM
document.addEventListener("DOMContentLoaded", function () {

    // Déclaration des variables login
    let profilForm = document.querySelector("#profilForm");
    let loginProfil = profilForm.querySelector("#loginProfil");
    let passwordProfil = profilForm.querySelector("#passwordProfil");
    let loginSubmit = profilForm.querySelector("#loginSubmit");
    let oldLogin = loginProfil.value;

    // Déclaration des variables password
    let passwordForm = document.querySelector("#passwordForm");
    let oldPassword = passwordForm.querySelector("#oldPassword");
    let newPassword = passwordForm.querySelector("#newPassword");
    let newPasswordConfirm = passwordForm.querySelector("#newPasswordConfirm");
    let passwordSubmit = passwordForm.querySelector("#passwordSubmit");
    
    let validate = false;
    
    // vérif login
    function checkLoginProfil() {
        if(loginProfil.value === "") {
            // Changer la couleur du message d'erreur
            loginProfil.nextElementSibling.style.color = "#ff0000";
            // Colorer le champ de saisie jusqu'à ce qu'il soit correctement rempli
            loginProfil.style.borderColor = "#ff0000";
            // Afficher le message d'erreur
            loginProfil.nextElementSibling.innerHTML = "Veuillez saisir un login";
            validate = false;
        }else if(loginProfil.value === oldLogin) {
                loginProfil.nextElementSibling.innerHTML = "";
                loginProfil.style.borderColor = "#000000";
                validate = false;
        } else {
            loginProfil.nextElementSibling.innerHTML = "";
            let dataLogin = new FormData();
            dataLogin.append("verifLogin", loginProfil.value);
            fetch("verification.php", {
                method: "POST",
                body: dataLogin
            })
            .then(response => response.text())
            .then((data) => {
                data = data.trim();
                if(data === "indispo") {
                    loginProfil.style.borderColor = "#ff0000";
                    loginProfil.nextElementSibling.style.color = "#ff0000";
                    loginProfil.nextElementSibling.innerHTML = "Ce login est déjà pris";
                    validate = false;
                } else if(data === "dispo") {
                    loginProfil.style.borderColor = "#00ff00";
                    loginProfil.nextElementSibling.innerHTML = "";
                    validate = true;
                    dataLogin.delete("verifLogin");
                }
            })
            .catch(error => console.log(error));
        }
        return validate;
    };

    // vérif password
    function checkPassword(pass) {
        if(pass.value === "") {
            // Changer la couleur du message d'erreur
            pass.nextElementSibling.style.color = "#ff0000";
            // Colorer le champ de saisie jusqu'à ce qu'il soit correctement rempli
            pass.style.borderColor = "#ff0000";
            // Afficher le message d'erreur
            pass.nextElementSibling.innerHTML = "Veuillez saisir un mot de passe";
            validate = false;
        } else {
            pass.nextElementSibling.innerHTML = "";
            pass.style.borderColor = "#000000";
            validate = true;
        }

        if(pass === passwordProfil) {
            let dataPassword = new FormData();
            dataPassword.append("verifPassword", passwordProfil.value);
            fetch("verification.php", {
                method: "POST",
                body: dataPassword
            })
            .then(response => response.text())
            .then((data) => {
                data = data.trim();
                if(data === "incorrect") {
                    passwordProfil.style.borderColor = "#ff0000";
                    passwordProfil.nextElementSibling.style.color = "#ff0000";
                    passwordProfil.nextElementSibling.innerHTML = "Mot de passe incorrect";
                    validate = false;
                } else if(data === "correct") {
                    passwordProfil.nextElementSibling.innerHTML = "";
                    validate = true;
                }
            })
            .catch(error => console.log(error));
        }
    };

    // vérif passwordConfirm
    function newCheckPassword() {
        if(newPasswordConfirm.value === "") {
            newPasswordConfirm.nextElementSibling.style.color = "#ff0000";
            newPasswordConfirm.style.borderColor = "#ff0000";
            newPasswordConfirm.nextElementSibling.innerHTML = "Veuillez confirmer votre mot de passe";
            validate = false;
        } else if(newPasswordConfirm.value !== newPassword.value) {
            newPasswordConfirm.nextElementSibling.style.color = "#ff0000";
            newPasswordConfirm.style.borderColor = "#ff0000";
            newPasswordConfirm.nextElementSibling.innerHTML = "Les mots de passe ne correspondent pas";
            validate = false;
        } else {
            newPasswordConfirm.nextElementSibling.innerHTML = "";
            validate = true;
        }
    };

    ////////////////////////////////////////////////////////
    // Ajouter un écouteur d'événements clic pour chaque bouton
    ////////////////////////////////////////////////////////

    // formulaire modifier login
    ////////////////////////////
    // login
    loginProfil.addEventListener("blur", checkLoginProfil);

    //  password
    passwordProfil.addEventListener("blur", function(e) { checkPassword(passwordProfil)});

    // loginProfilSubmit
    loginProfilSubmit.addEventListener("click", function(e) { 
        e.preventDefault();
        if(validate) {
            let data = new FormData(profilForm);
            data.append("changeLogin", "envoi");
            fetch("/livre-or-js/verification.php", {
                method: "POST",
                body: data
            })
            .then(response => response.text())
            .then(data => {
                data = data.trim();
                if(data === "Login changé !") {
                    loginProfilSubmit.style.color = "#00ff00";
                    loginProfilSubmit.nextElementSibling.innerHTML = "Login changé !";
                    setTimeout(() => {
                        window.location.href = "profil.php";
                    }, 2000);
                } else {
                    passwordLog.style.borderColor = "#ff0000";
                    passwordLog.nextElementSibling.style.color = "#ff0000";

                    passwordLog.nextElementSibling.innerHTML = "mot de passe incorrect";
                }
            })
            .catch(error => console.log(error));
        }
    });

    // formulaire modifier password
    ///////////////////////////////

    // password
    oldPassword.addEventListener("blur", function(e) { checkPassword(oldPassword)});

    // newPassword
    newPassword.addEventListener("blur",  function(e) { checkPassword(newPassword)});

    // newPasswordConfirm
    newPasswordConfirm.addEventListener("keyup", newCheckPassword);

    // Ajouter un écouteur d'évènement pour le Delete du compte
    deleteBtn.addEventListener("click", function(e) {
        e.preventDefault();
        let data = new FormData(profilForm);
        data.append("deleteAccount", "envoi");
        fetch("/livre-or-js/verification.php", {
            method: "POST",
            body: data
        })
        .then(response => response.text())
        .then(data => {
            data = data.trim();
            if(data === "Utilisateur supprimé !") {
                errorLog.style.color = "#00ff00";
                errorLog.innerHTML = "Compte supprimé !";
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 2000);
            } else {
                passwordLog.style.borderColor = "#ff0000";
                passwordLog.nextElementSibling.style.color = "#ff0000";

                passwordLog.nextElementSibling.innerHTML = "mot de passe incorrect";
            }
        })
        .catch(error => console.log(error));

    });
    
    passwordSubmit.addEventListener("click", function(e) {
        e.preventDefault();
        if(validate) {
            let data = new FormData(passwordForm);
            data.append("changePassword", "envoi");
            fetch("/livre-or-js/verification.php", {
                method: "POST",
                body: data
            })
            .then(response => response.text())
            .then(data => {
                data = data.trim();
                console.log(data);
                if(data === "Mot de passe changé !") {
                    passwordSubmit.nextElementSibling.style.color = "#00ff00";
                    passwordSubmit.nextElementSibling.innerHTML = "Mot de passe changé !";
                    setTimeout(() => {
                        window.location.href = "profil.php";
                    }, 2000);
                } else {
                    oldPassword.style.borderColor = "#ff0000";
                    oldPassword.nextElementSibling.style.color = "#ff0000";

                    oldPassword.nextElementSibling.innerHTML = "mot de passe incorrect !";
                }
            })
            .catch(error => console.log(error));
        }
    });

});