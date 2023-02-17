<?php 
session_start();

require_once 'assets/lib/User.php'; 
$user = new User();
?>

<header>

    <nav class="close" id="nav">

        <!-- Burger menu -->
        <burgerButton class="open" onclick="burgerSwitch(this.parentNode);">
        </burgerButton>

        <!-- tester si l'utilisateur est connecté -->
        <?php
        if (isset($_GET['deconnexion'])){
            if($_GET['deconnexion']==true){
                $user->disconnect();
                header('Location: index.php');
            }
        }
        else if ($user->isConnected()) {
            
        ?>
        <!-- afficher le login de l'utilisateur -->
        <div class="login">
            <?php $login = $user->getLogin(); ?>
        </div>

        <!-- afficher les liens menus correspondants à la session -->
        <ul class="list-inline">

            <li id="accueil" class="btn btn-dark"><a class="text-white" href="index.php">Accueil</a></li>

            <li id="profil" class="btn btn-dark"><a class="text-white" href="profil.php"></i>PROFIL</a></li> 

            <li id="livre" class="btn btn-dark"><a class="text-white" href="livre-or.php">LIVRE D'OR</a></li>

            <li id="deconnexion" class="btn btn-dark"><a class="text-white" href="index.php?deconnexion=true">DECONNEXION</a></li>

            <li id="contact" class="btn btn-dark"><a class="text-white" href="mailto:nadia.hazem@laplateforme.io"><i class="fas fa-lg fa-envelope"></i> </a></li>

        </ul>

        <?php
            } else { 
        ?>
        <!-- afficher les liens menus correspondants à l'absence de session -->
        <ul class="list-inline">

            <li id="accueil" class="btn btn-dark"><a class="text-white" href="index.php">Accueil</a></li>

            <li id="livre" class="btn btn-dark"><a class="text-white" href="livre-or.php">LIVRE D'OR</a></li>

            <li id="connexion" class="btn btn-dark"><a class="text-white" id="loginBtn" href="/livre-or-js/user.php?choice=login">CONNEXION</button></a></li>
            
            <li id="inscription" class="btn btn-dark"><a class="text-white" id="registerBtn" href="/livre-or-js/user.php?choice=register">INSCRIPTION</a></li>

            <li id="contact" class="btn btn-dark"><a class="text-white" href="mailto:nadia.hazem@laplateforme.io"><i class="fas fa-lg fa-envelope"></i> </a></li>
        </ul>

        <?php
            }   
        ?>

    </nav>
    

</header>

