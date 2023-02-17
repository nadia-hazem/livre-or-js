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
    <title>Commentaires</title>

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
    <script src="/livre-or-js/assets/js/script.js"></script>
    <script src="/livre-or-js/assets/js/menu.js"></script>
    
</head>

<body>
    
    <?php include 'includes/header.php';?>

    <main>
        <div class="container">
            
            <h2 class="animtop">Laissez un commentaire</h2>

            <form action="verification.php" method="post">

                <textarea name="commentaire" cols="50" rows="10" placeholder="Merci d'avoir testé ce module !
                                                                                Votre commentaire :"></textarea>
                <input type="submit" name="go" value="Signer">

            </form>

        </div> <!-- /content -->
    </main> <!-- /main -->

    <?php include 'includes/footer.php';?>

</body>
</html>



