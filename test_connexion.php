<?php
// Inclure le fichier de connexion à la base de données
include_once 'Database.php';

// Crée une instance de la classe Database
$database = new Database();

// Tente de se connecter à la base de données
$conn = $database->getConnection();

// Vérifie si la connexion est réussie
if ($conn) {
    echo "Connexion réussie à la base de données.";
} else {
    echo "Échec de la connexion à la base de données.";
}
?>
