<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../DAO/userClass.php';
session_start();

$user = $_SESSION['user'];
$idUser = $user->getId();
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];
$guests = $_POST["guests"];
$date = date('Y-m-d H:i:s');

require_once '../DAO/reservationDaoImpl.php';

if (!class_exists('ReservationDaoImpl')) {
    die("Erreur : la classe ReservationDaoImpl n'est pas trouvée.");
}

try {
    $dao = new ReservationDaoImpl();
    $dao->addReservation($guests, $message, $date, $idUser);
    header('Location: ../vues/index.php?erreur=1');
    exit();
} catch (Exception $e) {
    die("Erreur lors de l'inscription : " . $e->getMessage());
}