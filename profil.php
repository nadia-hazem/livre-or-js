<!-- path: profil.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a05ac89949.js" crossorigin="anonymous"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        
    <!-- CSS -->
    <link rel="stylesheet" href="/livre-or-js/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>    
    
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="/livre-or-js/assets/img/favicon.png"/>    
    
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="/livre-or-js/assets/js/script.js"></script>
    <script src="/livre-or-js/assets/js/menu.js" defer></script>
    
</head>

<body id="profil">

    <?php include 'includes/header.php';?>
    <?php
    if (!$user->isConnected()) { // si la session n'est pas ouverte (protection de barre d'adresse)
        header('Location: user.php'); // redirection vers la page de connexion
    }
    ?>
    <?php // variables des informations de l'utilisateur
        $login = $_SESSION['user']['login']; 
    ?>

    
    <div class="wrapper">

        <main>
            <div class="container">

                <h2 class="playfair animate__animated animate__flipInX">Mon Profil</h2>
                <br>
                <div class="row align-content-center">

                    <form action="" class="col md-6 m-3 p-3 bg-white bg-opacity-75" id="profilForm" method="post">

                        <div class="d-flex justify-content-between">
                            <h3 class="">Modifier mon login</h3><i class="fa fa-user-lock fa-2x"></i>
                        </div>
                        <br>
                        <div class="d-flex justify-content-between">
                            <label>Login</label>
                            <input type="text" id="loginProfil" value="<?=$login?>" name="login" required>
                        </div>
                        <p></p>
                        <div class="d-flex justify-content-between">
                            <label>Mot de passe</label>
                            <input type="password" id="passwordProfil" placeholder="Saisissez mot de passe" name="password" required>
                        </div>
                        <p></p>

                        <input type="submit" id="loginProfilSubmit" name='submit' class="btn btn-secondary" value="Valider" >
                        <p></p>
                        <!-- Supprimer compte -->
                        <input type="submit" id="deleteBtn" name="delete"  class="btn btn-warning" value="Supprimer mon compte" />
                        <p></p>
                    </form>

                    <form action="" class="col md-6 m-3 p-3 bg-white bg-opacity-75" id="passwordForm" method="post">

                        <div class="d-flex justify-content-between">
                            <h3 class="form_title center">Changer de mot de passe</h3><i class="fa fa-lock fa-2x"></i>
                        </div>

                        <div class="d-flex justify-content-between">
                            <label>Ancien mot de passe</label>
                            <input type="password" id="oldPassword" placeholder="Saisissez ancien mot de passe" name="oldpassword" required>
                        </div>
                        <p></p>
                        <div class="d-flex justify-content-between">
                            <label>Nouveau mot de passe</label>
                            <input type="password" id="newPassword" placeholder="Saisissez nouveau mot de passe" name="newPassword" required>
                        </div>
                        <p></p>
                        <br />
                        <div class="d-flex justify-content-between">
                            <label>Confirmez le mot de passe</label>
                            <input type="password" id="newPasswordConfirm" name="newPasswordConfirm">
                        </div>
                        <p></p>

                        <input type="submit" id='passwordSubmit' class="btn btn-secondary" value="Valider" >
                        <p></p>
                    </form>

                </div> <!-- end row wrap -->

            </div> <!-- end content -->

        </main> <!--end main-->

        <div class="push"></div>

    </div> <!-- end wrapper -->
    

    <?php include 'includes/footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>