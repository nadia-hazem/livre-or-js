<!-- profil.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    
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
    <script src="/livre-or-js/assets/js/profil.js"></script>
    <script src="/livre-or-js/assets/js/menu.js"></script>
    
</head>

<body>

    <?php include 'includes/header.php';?>
    <?php
    if (!$user->isConnected()) { // si la session n'est pas ouverte (protection de barre d'adresse)
        header('Location: user.php'); // redirection vers la page de connexion
    }
    ?>
    <?php // variables des informations de l'utilisateur
        $login = $_SESSION['user']['login']; 
    ?>

    <main>
        <div class="content">
            <h1 class="">Mon Profil</h1>

            <div class="">
                <form action="" id="profilForm" method="post">
                    <div class="">

                        <h3 class="">Modifier mon login</h3>

                        <i class="fa fa-user-lock fa-2x fa-hover-hidden"></i>
                        <i class="fa fa-user fa-2x fa-hover-show"></i>
                    </div>
                    <br>
                    <label>Login</label>
                    <input type="text" id="loginProfil" value="<?=$login?>" name="login" required>
                    <p></p>
                    <label>Mot de passe</label>
                    <input type="password" id="passwordProfil" placeholder="Saisissez mot de passe" name="password" required>
                    <p></p>
                    <input type="submit" id="loginProfilSubmit" name='submit' value="Valider" >
                    <p></p>
                    <!-- Supprimer compte -->
                    <input type="submit" id="deleteBtn" name="delete" value="Supprimer mon compte" />
                    <p></p>
                </form>

                <form action="" id="passwordForm" method="post">
                    <div class="row">

                        <h3 class="form_title center">Changer de mot de passe</h3>
                        
                        <i class="fa fa-lock fa-2x fa-hover-hidden"></i>
                        <i class="fa fa-lock-open fa-2x fa-hover-show"></i>
                    </div>
                    <label>Ancien mot de passe</label>
                    <input type="password" id="oldPassword" placeholder="Saisissez ancien mot de passe" name="oldpassword" required>
                    <p></p>
                    <label>Nouveau mot de passe</label>
                    <input type="password" id="newPassword" placeholder="Saisissez nouveau mot de passe" name="newPassword" required>
                    <p></p>
                    <br />
                    <label>Confirmez le mot de passe</label>
                    <input type="password" id="newPasswordConfirm" name="newPasswordConfirm">
                    <p></p>

                    <input type="submit" id='passwordSubmit' value="Valider" >
                    <p></p>
                </form>

            </div> <!-- end row wrap -->
        </div> <!-- end content -->
    </main> <!--end main-->

    <?php include 'includes/footer.php';?>

</body>
</html>