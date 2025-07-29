<?php
// Affiche les erreurs à l'écran
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once '../DAO/userClass.php';
require_once '../DAO/userDaoImpl.php';

$email = $_POST["email"] ?? '';
$password = $_POST["password"] ?? '';

if (!class_exists('UserDaoImpl')) {
    die("Erreur : la classe UserDaoImpl n'est pas trouvée.");
}

$dao = new UserDaoImpl();
$user = $dao->getUser($email, $password);

if ($user !== null) {
    $_SESSION['user'] = $user;
    header("Location: ../vues/index.php");
    exit();
} else {
    header("Location: ../vues/login.php?erreur=1");
    exit();
}
?>