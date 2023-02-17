document.addEventListener("DOMContentLoaded", function () {

    let title = document.title;
    let switchLog = document.querySelector("#switchLog");
    let switchReg = document.querySelector("#switchReg");


    function burgerSwitch(nav) {
        if (nav.className == "open") {
            nav.className = "close";
        } else {
            nav.className = "open";
        }
    }

    
    
    function onglet() {
        if (title == "Accueil") {
            let li = document.querySelector("#accueil");
            li.style.backgroundColor = "grey";
            console.log(li);
        } else if (title == "Livre d'or") {
            let li = document.querySelector("#livre");
            li.style.backgroundColor = "grey";
        } else if (title == "Profil") {
            let li = document.querySelector("#profil");
            li.style.backgroundColor = "grey";
        } else if (title == "Connexion") {
            let li = document.querySelector("#connexion");
            li.style.backgroundColor = "grey";
        } else if (title == "Inscription") {
            let li = document.querySelector("#inscription");
            li.style.backgroundColor = "grey";
        } 
    }

    onglet();
    
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