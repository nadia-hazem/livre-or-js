<?php 
session_start();

require_once 'assets/lib/User.php'; 
$user = new User();
?>

<header>

    <nav class="close grid light text-center" id="nav">

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
            $login = $user->getLogin();
        ?>

        <!-- afficher les liens menus correspondants à la session -->
        <ul>
            <?php echo "Bonjour $login &nbsp;"; // connecté ?> &nbsp;   

            <li class="btn btn-light"><a href="index.php"><i class="fas fa-lg fa-home"></i>ACCUEIL</a></li>

            <li class="btn btn-light"><a href="profil.php"><i class="fas fa-lg fa-user"></i>PROFIL</a></li> 

            <li class="btn btn-light"><a href="livre-or.php"><i class="fas fa-lg fa-book"></i>LIVRE D'OR</a></li>

            <li class="btn btn-light"><a href="index.php?deconnexion=true"><i class="fa-solid fa-lg fa-plug"></i>DECONNEXION</a></li>

            <li class="btn btn-light"><a href="mailto:nadia.hazem@laplateforme.io"><i class="fa-solid fa-lg fa-envelope"></i> CONTACT</a></li>
        </ul>

        <?php
            } else { 
        ?>

        <ul>
            <li class="btn btn-light"><a href="index.php"><i class="fa-solid fa-lg fa-home"></i>ACCUEIL</a></li>

            <li class="btn btn-light"><a href="livre-or.php"><i class="fa-solid fa-lg fa-book"></i>LIVRE D'OR</a></li>

            <li class="btn btn-light"><a href="mailto:nadia.hazem@laplateforme.io"><i class="fa-solid fa-lg fa-envelope"></i> CONTACT</a></li>

            <li class="btn btn-light"><a href="/livre-or-js/user.php?choice=login"><button  id="loginBtn">CONNEXION</button></a></li>

            <li class="btn btn-light"><a href="/livre-or-js/user.php?choice=register"><button  id="registerBtn">INSCRIPTION</button></a></li>
        </ul>

        <?php
            }   
        ?>
        
        <div class="social g-col-4"> <!-- Section Social media -->
    
            <!-- Linkedin -->
            <a class="btn btn-floating align-middle" href="https://www.linkedin.com/in/pictelle/" target="_blank" role="button" title="Mon LinkedIn"><i class="fab fa-linkedin-in"></i></a>
    
                <!-- Github -->
            <a class="btn btn-floating align-middle" href="https://github.com/nadia-hazem" target="_blank" role="button" title="Mon GitHub"><i class="fab fa-github"></i></a>
    
            <!-- Wordpress -->
            <a class="btn btn-floating align-middle" href="https://pictelle.com" target="_blank" role="button"><i class="fab fa-wordpress" title="Mon WordPress"></i></a>
    
            <!-- Resume -->
            <a class="btn btn-floating align-middle" href="https://nadia-hazem.students-laplateforme.io/" target="_blank" role="button" title="CV/Resume"><i class="fas fa-file"></i></a>
    
        </div>
        
    </nav>
    

</header>

