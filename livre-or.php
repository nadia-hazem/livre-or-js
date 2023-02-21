<?php
// Path: livre-or.php
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
    <title>Livre d'or</title>

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


    <script src="/livre-or-js/assets/js/menu.js" defer></script>
    
</head>

<body id="livreor">
    
    <?php include 'includes/header.php';?>

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
                    <img class="thanks animate__animated animate__lightSpeedInRight" src="/livre-or-js/assets/img/thankyou.png"> 
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
                $bdd = null; // on ferme la connexion à MySQL  
            ?>  

        </main> <!-- /main -->

        <div class="push"></div> <!-- /push -->

    </div> <!-- /wrapper -->

    <?php include 'includes/footer.php';?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>