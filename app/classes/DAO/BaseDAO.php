<?php
// classes/DAO/BaseDAO.php
require_once __DIR__ . '/../../config/Database.php';

class BaseDAO {
    protected $conn;

    public function __construct() {
        // Utilisation de la classe Database pour la connexion
        $db = new Database();
        $this->conn = $db->getConnection();

        if (!$this->conn) {
            die("Erreur de connexion à la base de données : " . $db->getConnectionError());
        }
    }

    public function __destruct() {
        if ($this->conn) {
            $this->conn = null; // Fermeture de la connexion PDO
        }
    }

    // Ajoutez ici des méthodes communes à tous les DAO si nécessaire
}
?>
