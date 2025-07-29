<?php
require_once '../DAO/userClass.php';
require_once '../DAO/userDAO.php';
require_once '../DB/ConnexionDB.php'; // Assure-toi que cette classe existe et est correcte

class UserDaoImpl implements UserDAO {

    private $db;

    public function __construct() {
        $this->db = ConnexionDB::getInstance();
    }

    public function addUser($nom, $prenom, $phone, $email, $password){
        $stmt = $this->db->prepare("INSERT INTO user (nom, prenom, telephone, email, password) VALUES (:nom, :prenom, :phone, :email, :password)");
        if ($stmt) {
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
        } else {
            die("Erreur lors de la préparation : " . implode(" | ", $this->db->errorInfo()));
        }
    }

    public function getUser($email, $password) {
        $stmt = $this->db->prepare("SELECT id, nom, prenom, telephone, email FROM user WHERE email = :email AND password = :password");
        if ($stmt) {
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new User($row['id'], $row['nom'], $row['prenom'], $row['telephone'], $row['email']);
            } else {
                return null; // Utilisateur non trouvé
            }
        } else {
            die("Erreur lors de la préparation : " . implode(" | ", $this->db->errorInfo()));
        }
    }
}
