<?php
require_once 'classes/DAO/EmpruntDAO.php';
require_once 'classes/DAO/BookDAO.php';

$borrowingDAO = new EmpruntDAO("localhost", "root", "", "library");
$bookDAO = new BookDAO("localhost", "root", "", "library");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'extend') {
            $id = $_POST['id'];
            $new_due_date = $_POST['new_due_date'];
            $borrowingDAO->prolongerEmprunt($id, $new_due_date);
            header("Location: books.php");
            echo "Emprunt prolongé avec succès.";
        } elseif ($action == 'return') {
            $id = $_POST['id'];
            $return_date = $_POST['return_date'];
            $borrowingDAO->retournerLivre($id, $return_date);
            header("Location: books.php");
            echo "Livre retourné avec succès.";
        }
    } else {
        $user_id = $_POST['user_id'];
        $book_id = $_POST['book_id'];
        $borrow_date = $_POST['borrow_date'];
        $due_date = $_POST['due_date'];
        $borrowingDAO->emprunterLivre($user_id, $book_id, $borrow_date, $due_date);
        header("Location: books.php");
        echo "Livre emprunté avec succès.";
    }
}
?>
