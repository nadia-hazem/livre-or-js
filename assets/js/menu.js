// fonction pour changer le style du bouton burger
function burgerSwitch(nav) {
    if (nav.className == "open") {
        nav.className = "close";
    } else {
        nav.className = "open";
    }

}

// Chargement du DOM
document.addEventListener("DOMContentLoaded", function () {

    let title = document.title;
    let switchLog = document.querySelector("#switchLog");
    let switchReg = document.querySelector("#switchReg");

    // Fonction pour highlighter l'onglet actif
    function onglet() {
        if (title == "Accueil") {
            let li = document.querySelector("#accueil");
            li.style.backgroundColor = "#282828";
        } else if (title == "Livre d'or") {
            let li = document.querySelector("#livre");
            li.style.backgroundColor = "#282828";
        } else if (title == "Profil") {
            let li = document.querySelector("#profil");
            li.style.backgroundColor = "#282828";
        } else if (title == "Connexion") {
            let li = document.querySelector("#connexion");
            li.style.backgroundColor = "#282828";
        } else if (title == "Inscription") {
            let li = document.querySelector("#inscription");
            li.style.backgroundColor = "#282828";
        } 
    }
    onglet();
    
    // boutons de switch secondaires

    switchLog.addEventListener("click", function () {
        title = "Connexion";
        let li = document.querySelector("#inscription");
            li.style.backgroundColor = "initial";
        onglet();
    });
    
    switchReg.addEventListener("click", function () {
        title = "Inscription";
        let li = document.querySelector("#connexion");
            li.style.backgroundColor = "initial";

        onglet();
    });

});