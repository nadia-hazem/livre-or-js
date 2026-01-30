// path : assets/js/menu.js

function burgerSwitch(nav) {
    if (nav.className == "open") {
        nav.className = "close";
    } else {
        nav.className = "open";
    }
}

document.addEventListener("DOMContentLoaded", function () {

  // ==========================
  // ACTIVE MENU BY URL
  // ==========================
    const path = window.location.pathname.split("/").pop(); 
    // ex: "index.php", "guestbook.php", "profil.php", ""

    const routes = {
        "": "accueil",             // if URL = / (racine)
        "index.php": "accueil",
        "guestbook.php": "guestbook",
        "profil.php": "profil",
        "user.php": null,          // special case (login/register)
    };

    // reset active state
    document.querySelectorAll("nav li").forEach(li => {
        li.classList.remove("active");
        li.style.backgroundColor = "";
    });

  // detect current menu item
    const currentId = routes[path] ?? null;

    if (currentId) {
        const li = document.querySelector("#" + currentId);
        if (li) {
        li.classList.add("active");
        li.style.backgroundColor = "#282828";
        }
    }

});
