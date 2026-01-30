<?php // Path: verification.php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'assets/lib/User.php';
$user = new User();
$pdo = $user->getBdd();

// test disponibilité du login
if (isset($_POST['verifLogin'])) {
    $login = $_POST['verifLogin'];
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE login = :login");
    $stmt->execute([':login' => $login]);
    echo $stmt->fetch() ? "indispo" : "dispo";
    exit;
}

// inscription
if (isset($_POST['register'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $msg = $user->register($login, $password); // renvoie un message au JS
    echo $msg; // juste renvoyer le message pour le JS
    exit();
}

// connection
if (isset($_POST['connect'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $msg = $user->connect($login, $password); // renvoie un message au JS
    echo $msg; // juste renvoyer le message pour le JS
    exit();
}

// change login
if (isset($_POST['changeLogin'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user->changeLogin($login, $password);
}

// change password
if (isset($_POST['changePassword'])) {
    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['newPassword'];
    $user->changePassword($oldPassword, $newPassword);
}

// delete account
if (isset($_POST['deleteAccount'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user->delete($password);
}

// Display comments
if (isset($_POST['go']) && $_POST['go']=='Signer') {
    /* $id = $_POST['id']; */
    /* var_dump($id); */
    $comment = $_POST['comment'];
    /* var_dump($comment); */
    $user->addComment($comment);
}

