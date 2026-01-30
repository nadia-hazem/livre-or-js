<?php // Path: profil.php

require_once 'assets/lib/User.php';

session_start();
$user = new User();
$pdo = $user->getBdd();

$bodyId = "profil";
include "includes/header.php";
?>

    <?php
    if (!$user->isConnected()) { // if the session is not open (address bar protection)
        header('Location: user.php'); // redirect to connection page
    }
    ?>
    <?php // User info variables
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
                        <!-- Delete account -->
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