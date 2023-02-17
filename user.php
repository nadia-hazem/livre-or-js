<?php
// User.php 
require_once 'assets/lib/User.php';
$user = new User();
$pdo = $user->getBdd();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a05ac89949.js" crossorigin="anonymous"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/livre-or-js/assets/css/style.css">
    
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="/livre-or-js/assets/img/favicon.png"/>    
    
    <!-- JS -->
    <script src="/livre-or-js/assets/js/script.js"></script>
    <script src="/livre-or-js/assets/js/menu.js" defer></script>
    
</head>

<body>
    <?php require_once 'includes/header.php'; ?>

    <main>
        <div class="container">

            <div id="connexionDiv">

                <!-- login -->
                <form id="loginForm" action="verification.php" method="post"> <!-- redirection vers la page de vérification -->

                    <h3>Connectez-vous pour accéder à votre profil</h3>
                    <h1>Connexion</h1>

                    <label for="login">Login</label>
                    <input type="text" class="login" placeholder="Entrer le nom d'utilisateur" name="login" required>
                    <p></p>
                    <label for="password">Mot de passe</label>
                    <input type="password" class="password" placeholder="Entrer le mot de passe" name="password" required>
                    <p></p>
                    <input type="submit" id="loginSubmit" value="Connexion">
                    <p class="error"></p>

                </form> <!-- fin du formulaire -->
                <button id="switchReg">Inscription</button>
            </div>

            <div id="inscriptionDiv">

                <!-- register -->
                <form id="registerForm" action="verification.php">
                    
                    <h3>Inscrivez-vous pour laisser un commentaire</h3>
                    <h1>Inscription</h1>

                    <label for="login">login</label>
                    <input type="text" name="login" class="login" required>
                    <p></p>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" class="password" required>
                    <p></p>
                    <label for="password2">Confirmer le mot de passe</label>
                    <input type="password" name="password2" id="password2" required>
                    <p></p>
                    <input type="submit" id="registerSubmit" value="Inscription">
                    <p class="error"></p>

                </form> <!-- fin du formulaire -->
                <button id="switchLog">Connexion</button>
            </div>

            <?php require_once 'includes/footer.php'; ?>
        
        </div>
    </main>

</body>
</html>



