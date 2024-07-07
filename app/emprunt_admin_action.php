<?php
require_once 'classes/DAO/EmpruntDAO.php';

$empruntDAO = new EmpruntDAO("localhost", "root", "", "library");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'returnadmin') {
        $id = $_POST['id'];
        $return_date = $_POST['return_date'];
        $late_fee = isset($_POST['late_fee']) ? $_POST['late_fee'] : 0;
        $success = $empruntDAO->enregistrerRetourAdmin($id, $return_date, $late_fee);
        if ($success) {
            header("location:users.php");
            echo "Livre retourné avec succès.";
        } else {
            echo "Erreur lors du retour du livre.";
        }
    }
}
?>
