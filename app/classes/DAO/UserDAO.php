<?php
require_once __DIR__ . '/BaseDAO.php';
require_once __DIR__ . '/../User.php'; // Assurez-vous que le chemin vers User.php est correct

class UserDAO extends BaseDAO {
    // Méthode pour ajouter un nouvel utilisateur
    public function addUser($firstName, $lastName, $email, $phoneNumber) {
        try {
            $sql = "INSERT INTO users (first_name, last_name, email, phone, active) 
                    VALUES (?, ?, ?, ?, 1)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $firstName);
            $stmt->bindParam(2, $lastName);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $phoneNumber);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    // Méthode pour modifier les informations d'un utilisateur existant
    public function updateUser($id, $firstName, $lastName, $email, $phoneNumber) {
        try {
            $sql = "UPDATE users 
                    SET first_name = ?, last_name = ?, email = ?, phone = ? 
                    WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $firstName);
            $stmt->bindParam(2, $lastName);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $phoneNumber);
            $stmt->bindParam(5, $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    // Méthode pour désactiver un utilisateur
    public function deactivateUser($id) {
        try {
            $sql = "UPDATE users 
                    SET active = 0 
                    WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    // Méthode pour récupérer tous les utilisateurs
    public function getAllUsers() {
        try {
            $users = [];
            $sql = "SELECT * FROM users";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $user = new User($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['phone'], $row['active'],$row['password'],$row['role']);
                $users[] = $user;
            }

            return $users;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }

    // Fermer la connexion (optionnel si gérée par BaseDAO::__destruct())
    // public function closeConnection() {
    //     $this->conn = null;
    // }
}
?>
