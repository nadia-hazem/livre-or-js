<?php // path: index.php

session_start();
require_once 'assets/lib/User.php';

$user = new User();
$pdo = $user->getBdd();

$bodyId = "index";
include "includes/header.php";
?>

<div class="wrapper">

    <main>
        <!-- <img src="/assets/img/gb.png" alt="accueil" class="accueil animate__animated animate__zoomIn img-fluid"> -->

    </main>
    
    <div class="push"></div>

</div> <!-- /wrapper -->


<?php include 'includes/footer.php';?>

<script>
    // Only redirect if on index.php
    if (window.location.pathname.endsWith("index.php") || window.location.pathname === "/") {
        setTimeout(() => {
        document.querySelector("#accueil")?.classList.remove("active");
        document.querySelector("#guestbook")?.classList.add("active");
        document.body.classList.add("fade-out");

        setTimeout(() => {
            window.location.href = "guestbook.php";
        }, 800);
        }, 2500);
    }
</script>

