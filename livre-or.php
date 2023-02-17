<!-- livre-or.php -->
<?php
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="/livre-or-js/assets/css/style.css">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="/livre-or-js/assets/img/favicon.png"/>    
    <!-- JS -->
    <script src="/livre-or-js/assets/js/menu.js"></script>
    
</head>

<body id="livreor">
    
    <?php include 'includes/header.php';?>

    <div class="wrapper">

        <main>

            <div class="container">

                <h1> Le livre d'Or </h1>

                <?php
                    
                $request = "SELECT commentaires.commentaire, DATE_FORMAT(commentaires.date,'%d/%m/%Y') as date_fr, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id";
                $exec_request = $pdo->prepare($request);
                $exec_request->execute();
                $stmt = $exec_request->fetchAll(PDO::FETCH_ASSOC);

                if ($user->isConnected())
                {
                ?>  <a class="row" href="commentaire.php"><i class="fa-solid fa-2x fa-arrow-right-to-bracket"></i><h3 class="yellow">Laissez un commentaire</h3></a><br>
                <?php
                }
                else {
                ?>  <a class="row" href="user.php?choice=login"><i class="fa-solid fa-2x fa-arrow-right-to-bracket"></i> <h3 class="yellow">Connectez-vous pour laisser un commentaire</h3></a>
                <?php
                }
                ?>

            </div> <!-- /container -->

            <div class="container animright">
                <table width="100%"> 
                    <thead>
                        <tr class="row coms">
                            <th class="thcom1"><h3>date</h3></th>
                            <th class="thcom2"><h3>login</h3></th>
                            <th class="thcom3"><h3>commentaire</h3></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($stmt as $row) { ?>
                            <tr class="row coms">
                                <td class="tdcom1"><div class="com"><em><?php echo $row['date_fr']; ?></em></div></td>
                                <td class="tdcom2"><div class="com"><?php echo $row['login']; ?></div></td>
                                <td class="tdcom3 wrap"><div class="com"><?php echo $row['commentaire']; ?></div></td>
                        </tr>
                        <?php } ?>
                    </tbody>           
                </table>
                <a href="#main"><i class="fa-solid fa-4x fa-circle-arrow-up"></i></a>
                
            </div> <!-- /container -->

            <?php        
                $bdd = null; // on ferme la connexion à MySQL  
            ?>  

        </main> <!-- /main -->

        <div class="push"></div> <!-- /push -->

    </div> <!-- /wrapper -->

    <?php include 'includes/footer.php';?>

</body>
</html>