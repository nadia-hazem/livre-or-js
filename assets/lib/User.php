<?php
// Path: assets\lib\User.php

    class User
    {
        // attributs
        private $id;
        public $login;
        private $password;
        private $bdd;

        // Méthodes  
        public function __construct() { 
            $host = 'localhost';
            $dbname = 'guestbook';
            $dbuser = 'root';
            $dbpass = '';

            /* $this->bdd = new PDO('mysql:host=localhost; dbname=classes; charset=utf8', 'root', ''); */
            try {
                $this->bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser, $dbpass);
                $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } 
            catch (PDOException $e) 
            {
                echo "Erreur : " . $e->getMessage();
                die();
            }
            // Session verification
            if(isset($_SESSION['user'])) 
            {
                $this->id = $_SESSION['user']['id'];
                $this->login = $_SESSION['user']['login'];
                $this->password = $_SESSION['user']['password'];
            }
        } 

        //  Get database connection
        public function getBdd() {
            return $this->bdd;
        }

        // Register
        public function register($login, $password)
        {
            try {
                // Sécurisation
                $login = htmlspecialchars($login);
                $password = htmlspecialchars($password);

                // Check if login already exists
                $stmt = $this->bdd->prepare("SELECT id FROM utilisateurs WHERE login = :login");
                $stmt->execute([':login' => $login]);
                if ($stmt->fetch()) {
                    return "Login déjà utilisé";
                }

                // Password hashing
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                // Request preparation and execution
                $insert = $this->bdd->prepare(
                    "INSERT INTO utilisateurs (login, password) VALUES (:login, :password)"
                );
                $insert->execute([
                    ':login' => $login,
                    ':password' => $passwordHash
                ]);

                return "Inscription réussie !";

            } catch (\PDOException $e) {
                // Retourner l'erreur pour debug JS
                return "Erreur base de données : " . $e->getMessage();
            }
        }

        // connection
        public function connect($login, $password)
        {
            // Securisation
            $login = trim(htmlspecialchars($login));
            $password = trim(htmlspecialchars($password));

            // Request to get user
            $stmt = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = :login");
            $stmt->execute([':login' => $login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {

                // ✅ Store user info in session
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'login' => $user['login'],
                    'password' => $user['password']
                ];

                // Update object attributes
                $this->id = $user['id'];
                $this->login = $user['login'];
                $this->password = $user['password'];

                return "Connexion réussie !";
            }

            return "Login ou mot de passe incorrect";
        }

        // Check if connected
        public function isConnected()
        {
            if($this->id != null && $this->login != null && $this->password != null) {
                return true;
            }
            else {
                return false;
            }
        }

        // Disconnect
        public function disconnect()
        {
            // Delete all session variables
            $_SESSION = [];

            //Delete PHPSESSID cookie (important)
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Destroy the session
            session_destroy();

            // Reset object
            $this->id = null;
            $this->login = null;
            $this->password = null;

            return "Déconnexion réussie";
        }

        // Delete account
        public function delete()
        {   
            if($this->isConnected()) 
            {   // Suppression request
                $delete = "DELETE FROM utilisateurs WHERE id = :id ";
                // Request preparation
                $delete = $this->bdd->prepare($delete);
                // Request execution with parameter binding
                $delete->execute(array(
                    ':id' => $this->id
                ));
                // Fetch results
                $result = $delete->fetchAll();
                // Confirmation message
                if ($result == TRUE) {
                    echo "Utilisateur supprimé !"; 
                    session_destroy();
                }
                else{
                    echo "Erreur lors de la suppression de l'utilisateur !";
                }
            }
            else {
                echo "Vous devez être connecté pour supprimer votre compte !";
            }
            // Close database connection
            $this->bdd = null; 
        }

        // Get all user info
        public function getAllInfos()
        {
            if($this->isConnected()) 
            {   ?>
                <table border="1" style="border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>id</td>
                            <th>login</td>
                            <th>password</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><?php echo $this->id; ?></td>
                            <td><?php echo $this->login; ?></td>
                            <td><?php echo $this->password; ?></td>
                        </tr>
                    </tbody>
                </table>

                <?php
            }
            else {
                echo "Vous devez être connecté(e) pour voir vos informations !";
            
            }

        }

        // Get user login
        public function getLogin()
        {
            if($this->isConnected()) 
            {
                echo "Bienvenue " . $this->login;
            }
            else {
                echo "Vous devez être connecté(e) pour voir vos informations !";
            }
        }

        // Check if user exists (for login availability)
        public function isUserExist($login)
        {
            // Request SQL
            $requete = "SELECT * FROM utilisateurs where login = :login";

            // Request preparation
            $select = $this->bdd->prepare($requete);

            // htmlspecialchars for security
            $login = htmlspecialchars($login);

            // Request execution with parameter binding
            $select->execute(array(':login' => $login));

            // Fetch all results
            $fetch_all = $select->fetchAll();

            if (count($fetch_all) === 0) { // login available
                $reponse = "dispo";
                echo $reponse; // login available
            } else {
                $reponse = "indispo";
                echo $reponse; // login not available
            }
        }

        // Change login
        public function changeLogin($login, $password)
        {
            $request = "SELECT * FROM utilisateurs WHERE login = :login";
            // Request preparation
            $select = $this->bdd->prepare($request);

            // Special characters
            $login = trim(htmlspecialchars($login));
            $password = trim(htmlspecialchars($password));

            // Request execution with parameter binding
            $select->execute(array(
                ':login' => $this->login,
            ));
            // Fetch results
            $result = $select->fetch(PDO::FETCH_ASSOC);
            // Verify password
            if (password_verify($password, $result['password'])) {
                $update = "UPDATE utilisateurs SET login=:login WHERE id = :id";
                // Request preparation
                $update = $this->bdd->prepare($update);
                // Request execution with parameter binding
                $update->execute(array(
                    ':login' => $login,
                    ':id' => $result['id']
                    // ':login' => $this->['id']
                ));

                $_SESSION['user']= [
                    'id' => $result['id'],
                    'login' => $login,
                    'password' => $result['password']
                ]; 
                echo "Login changé !";     
            }
            else {
                echo "mot de passe incorrect !";
            }
            
        }
        
        // Change password
        public function changePassword($oldPassword, $newPassword)
        {
            $request = "SELECT * FROM utilisateurs WHERE id = :id";
            // Request preparation
            $select = $this->bdd->prepare($request);
            
            // special characters
            $newPassword = trim(htmlspecialchars($newPassword));
            $id = trim(htmlspecialchars($this->id));
            
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
            $select->execute(array(
                ':id' => $this->id,
            ));
            // Fetch results
            $result = $select->fetch(PDO::FETCH_ASSOC);
            // Verify password
            if (password_verify($oldPassword, $result['password'])) {
                $update = "UPDATE utilisateurs SET password=:password WHERE id = :id";
                // Request preparation
                $update = $this->bdd->prepare($update);
                // Request execution with parameter binding
                $update->execute(array(
                    ':id' => $id,
                    ':password' => $newPassword
                ));
                echo 'Mot de passe changé !';
            }
            else {
                echo "mot de passe incorrect !";
            }
        }
        
        // Add comment
        public function addComment ( )
        {    
            $id = $this->id;
            
            if ((!empty($_POST['commentaire']))) {
                $commentaire = htmlspecialchars($_POST['commentaire']);
    
                // Insert request
                $request = "INSERT INTO commentaires (commentaire, id_utilisateur, date ) VALUES(:commentaire, :id, NOW())";
                $insert = $this->bdd->prepare($request);
                $insert->execute(array(
                    ':commentaire' => $commentaire,
                    ':id' => $id,
                ));
                // Confirmation message
                echo "Commentaire ajouté !";

                header('location: guestbook.php');
    
                // Close database connection
                exit();
            }
            else {
                echo "Au moins un des champs est vide";
            }            
        }            
        
    }

?>