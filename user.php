<?php // Path: user.php

require_once 'assets/lib/User.php';

session_start();
$user = new User();
$pdo = $user->getBdd();

// Check connection & display user info
if ($user->isConnected()) {
    echo '<p class="log">Vous êtes connecté en tant que : <strong>' . htmlspecialchars($_SESSION['user']['login']) . '</strong></p>';
} else {
    echo '<p class="log">Vous n’êtes pas connecté.</p>';
}

$bodyId = "user";
include "includes/header.php";
?>

    <div class="wrapper">

        <main>

            <div class="container">
                
                <div id="connexionDiv" class="animate__animated animate__zoomIn">
                    
                    <!----------------------
                        login 
                    ----------------------->
                    <form id="loginForm" class="bg-white bg-opacity-75" action="verification.php" method="post"> <!-- redirection vers la page de vérification -->
                    
                    <h3 class="playfair">Connectez-vous pour accéder à votre profil</h3>
                    <h1 class="text-center">Connexion</h1>

                        <label for="login">Login</label>
                        <input type="text" class="login form-control" placeholder="Entrer le nom d'utilisateur" name="login" required>
                        <p></p>
                        <label for="password">Mot de passe</label>
                        <input type="password" class="password form-control" placeholder="Entrer le mot de passe" name="password" required>
                        <p></p>
                        <input type="submit" id="loginSubmit" class="btn btn-secondary" value="Connexion">
                        <p class="error"></p>

                        Vous n'avez pas de compte ? &nbsp;<a href id="switchReg">Inscription</a>
                    </form> <!-- form end -->
                    
                </div>

                
                <div id="inscriptionDiv" class="animate__animated animate__zoomIn">
                    
                    <!-------------------
                        register
                    -------------------->
                    <form id="registerForm" class="bg-white bg-opacity-75" action="verification.php" method="post">

                        <h3 class="playfair">Inscrivez-vous pour laisser un commentaire</h3>
                        <h1 class="text-center">Inscription</h1>

                        <label for="login">login</label>
                        <input type="text" name="login" class="login form-control" required>
                        <p></p>
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="password form-control" required>
                        <p></p>
                        <label for="password2">Confirmer le mot de passe</label>
                        <input type="password" name="password2" id="password2" class="form-control" required>
                        <p></p>
                        <input type="submit" id="registerSubmit" class="btn btn-secondary" value="Inscription">
                        <p class="error"></p>

                        Déjà inscrit ? &nbsp;<a href id="switchLog">Connexion</a>

                    </form> <!-- form end -->
                </div>
            
            </div>

        </main>

        <div class="push"></div>

    </div> <!-- /wrapper -->


    <?php include 'includes/footer.php';?>

    <script src="/assets/js/script.js"></script>



