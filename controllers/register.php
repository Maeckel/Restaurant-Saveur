<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$nom         = $_POST["lastname"] ?? '';
$prenom      = $_POST["firstname"] ?? '';
$phone       = $_POST["phone"] ?? '';
$email       = $_POST["email"] ?? '';
$password    = $_POST["password"] ?? '';
$confirmation = $_POST["confirmation"] ?? '';

require_once '../DAO/userDaoImpl.php';

if (!class_exists('UserDaoImpl')) {
    die("Erreur : la classe UserDaoImpl n'est pas trouvée.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../vues/register.php?erreur=2');
    exit();
} else if ($password === $confirmation) {
    try {
        $dao = new UserDaoImpl();
        $dao->addUser($nom, $prenom, $phone, $email, $password);
        // Redirection vers la page de connexion
        header('Location: ../vues/login.php');
        exit();
    } catch (Exception $e) {
        // Gestion des erreurs PDO ou autre
        die("Erreur lors de l'inscription : " . $e->getMessage());
    }
} else {
    // Redirection vers le formulaire avec une erreur
    header('Location: ../vues/register.php?erreur=1');
    exit();
}
?>