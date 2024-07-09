<?php
session_start();

require_once 'classes/DAO/BookDAO.php';
$bookDAO = new BookDAO("localhost", "root", "", "library");

$response = [];

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['edit'])) {
            $book = $bookDAO->getBookById($_POST['id']);
            $response['book'] = [
                'id' => $book->getId(),
                'title' => $book->getTitle(),
                'author' => $book->getAuthor(),
                'publication_year' => $book->getPublicationYear(),
                'genre' => $book->getGenre(),
                'user_id' => $book->getUserId()
            ];
            $response['success'] = true;
        } elseif (isset($_POST['delete'])) {
            $id = $_POST['id'];
            if ($bookDAO->deleteBook($id)) {
                $_SESSION['message'] = "Livre supprimé avec succès!";
                header("Location: books.php");
                exit();
            }
        } else {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $publication_year = $_POST['publication_year'];
            $genre = $_POST['genre'];
            $user_id = $_POST['user_id'];

            if ($id) {
                $bookDAO->updateBook($id, $title, $author, $publication_year, $genre, $user_id);
                
                $_SESSION['message']= 'Livre mis à jour avec succès!';
               header("Location: books.php");
            } else {
                $bookDAO->addBook($title, $author, $publication_year, $genre, $user_id);
               
                $_SESSION['message'] = 'Livre ajouté avec succès!';
                header("Location: books.php");
            }
        }
    } else {
        http_response_code(405); // Method Not Allowed
        $response['error'] = 'Méthode de requête invalide';
    }
} catch (Exception $e) {
    http_response_code(500);
    $response['error'] = 'Erreur du serveur : ' . $e->getMessage();
}
