<?php
require_once '../DAO/reservationClass.php';
require_once '../DAO/reservationDAO.php';
require_once '../DB/ConnexionDB.php';

class ReservationDaoImpl implements ReservationDAO {

    private $db;

    public function __construct(){
        $this->db = ConnexionDB::getInstance();
    }

    public function addReservation($nbrPersonne, $message, $date, $idUser){
        $stmt = $this->db->prepare("INSERT INTO reservation (nombre_personnes, message, date, user_id) VALUES (:nombre_personnes, :message, :date, :user_id)");
        if ($stmt) {
            $stmt->bindParam(':nombre_personnes', $nbrPersonne);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':user_id', $idUser);
            $stmt->execute();
        } else {
            die("Erreur lors de la préparation : " . implode(" | ", $this->db->errorInfo()));
        }
    }

}