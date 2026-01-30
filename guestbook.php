<?php // Path: guestbook.php

require_once 'assets/lib/User.php';

session_start();
$user = new User();
$pdo = $user->getBdd();

$bodyId = "guestbook";
include "includes/header.php";
?>

    <div class="wrapper">

        <main>

            <div class="container">

                <h1 class="h1 text-center text-dark playfair animate__animated animate__flipInX">Livre d'or</h1>

                <?php
                    
                $request = "SELECT commentaires.commentaire, DATE_FORMAT(commentaires.date,'%d/%m/%Y') as date_fr, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id";
                $exec_request = $pdo->prepare($request);
                $exec_request->execute();
                $stmt = $exec_request->fetchAll(PDO::FETCH_ASSOC);

                if ($user->isConnected())
                {
                ?>  
                <span class="roboto text-center p-2">
                    <a class="row" href="commentaire.php"><h3 class="bg-dark p-2 hover">Laissez un commentaire</h3></a><br>
                </span>
                <?php
                }
                else {
                ?>
                <span class="text-dark roboto text-center" >
                    <img class="thanks animate__animated animate__lightSpeedInRight" src="/assets/img/thankyou.png"> 
                    <h6>Connectez-vous pour laisser un commentaire</h6>
                </span>
                <?php
                }
                ?>

            </div> <!-- /container -->

            <div class="container">
                <table class="table table-responsive"> 
                    <thead>
                        <tr class="row coms">
                            <th class="thcom1"><h3 class="roboto animate__animated animate__flipInX">date</h3></th>
                            <th class="thcom2"><h3 class="roboto animate__animated animate__flipInX">login</h3></th>
                            <th class="thcom3"><h3 class="roboto animate__animated animate__flipInX">commentaire</h3></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($stmt as $row) { ?>
                        <tr class="row coms">
                            <td class="tdcom1"><div class="com playfair"><em><?php echo $row['date_fr']; ?></em></div></td>
                            <td class="tdcom2"><div class="com playfair"><?php echo $row['login']; ?></div></td>
                            <td class="tdcom3 wrap"><div class="com playfair"><?php echo $row['commentaire']; ?></div></td>
                        </tr>
                        <?php } ?>
                    </tbody>           
                </table>
                <a href="#main"><i class="fas fa-4x fa-circle-arrow-up"></i></a>
                
            </div> <!-- /container -->

            <?php        
                $bdd = null; // we close the connection to MySQL
            ?>  

        </main> <!-- /main -->

        <div class="push"></div> <!-- /push -->

    </div> <!-- /wrapper -->

    <?php include 'includes/footer.php';?>