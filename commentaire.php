<?php // Path: commentaire.php

require_once 'assets/lib/User.php';

session_start();
$user = new User();
$pdo = $user->getBdd();

$bodyId = "commentaire";
include "includes/header.php";
?>

    <div class="wrapper">
        
        <main>
            <div class="container">

                <h2 class="text-center playfair text-dark animate__animated animate__flipInX">Laissez un commentaire</h2>
                <img src="/assets/img/signguestbookgif.gif" alt="gif" class="mt-3 ml-2">

                <form action="verification.php" method="post" class="m-auto">

                    <textarea name="commentaire" cols="40" rows="10" placeholder="Votre commentaire :"></textarea>
                    <input type="submit" class="btn btn-secondary" name="go" value="Signer">

                </form>

            </div> <!-- /content -->
        </main> <!-- /main -->

        <div class="push"></div>

    </div> <!-- /wrapper -->

    
    <?php include 'includes/footer.php';?>


