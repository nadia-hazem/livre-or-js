<!-- // Path: index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a05ac89949.js" crossorigin="anonymous"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>    
    
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="/assets/img/favicon.png"/>    
    
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="/assets/js/menu.js" defer></script>
    
</head>

<body id="<?= $bodyId ?? '' ?>">

<header class="bg-grey">

    <nav class="close" id="nav">

        <!-- Burger menu -->
        <burgerButton class="open" onclick="burgerSwitch(this.parentNode);">
        </burgerButton>

        <!-- Check if user connected -->
        <?php
        if (isset($_GET['deconnexion'])){
            if($_GET['deconnexion']==true){
                $user->disconnect();
                header('Location: index.php');
            }
            exit;
        }
        else if ($user->isConnected()) {
            
            ?>

        <!-- display the menu links corresponding to the session -->
        <ul class="nav nav-pills nav-fill">

            <!--Display user login -->
            <li class="nav-item pt-2"><mark><?php $login = $user->getLogin(); ?></mark></li>

            <li id="accueil" class="nav-item"><a class="nav-link text-white" href="index.php">ACCUEIL</a></li>

            <li id="profil" class="nav-item"><a class="nav-link text-white" href="profil.php"></i>PROFIL</a></li> 

            <li id="guestbook" class="nav-item"><a class="nav-link text-white" href="guestbook.php">LIVRE D'OR</a></li>

            <li id="deconnexion" class="nav-item"><a class="nav-link text-white" href="index.php?deconnexion=true">DECONNEXION</a></li>

            <li id="contact" class="nav-item"><a class="nav-link text-white" href="mailto:nadia.hazem@laplateforme.io">CONTACT</a></li>
        </ul>
        

        <?php
            } else { 
        ?>

        <!-- display the menu links corresponding to the absence of a session -->
        <ul class="nav nav-pills nav-fill">

            <li id="accueil" class="nav-item"><a class="nav-link text-white" href="index.php">ACCUEIL</a></li>

            <li id="livre" class="nav-item"><a class="nav-link text-white" href="guestbook.php">LIVRE D'OR</a></li>

            <li id="connexion" class="nav-item"><a class="nav-link text-white" id="loginBtn" href="/user.php?choice=login">CONNEXION</button></a></li>
            
            <li id="inscription" class="nav-item"><a class="nav-link text-white" id="registerBtn" href="/user.php?choice=register">INSCRIPTION</a></li>

            <li id="contact" class="nav-item"><a class="nav-link text-white" href="mailto:contact@pictelle.fr">CONTACT</a></li>
        </ul>

        <?php
            }   
        ?>

    </nav>
    

</header>

