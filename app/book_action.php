<?php
// book_action.php
require_once 'classes/DAO/BookDAO.php';


$bookDAO = new BookDAO("localhost", "root", "", "library");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit'])) {
        $book = $bookDAO->getBookById($_POST['id']);
        echo "
            <script>
                document.getElementById('id').value = '{$book->getId()}';
                document.getElementById('title').value = '{$book->getTitle()}';
                document.getElementById('author').value = '{$book->getAuthor()}';
                document.getElementById('publication_year').value = '{$book->getPublicationYear()}';
                document.getElementById('genre').value = '{$book->getGenre()}';
                document.getElementById('user_id').value = '{$book->getUserId()}';
            </script>
        ";
    } elseif (isset($_POST['delete'])) {
        $bookDAO->deleteBook($_POST['id']);
        echo "Livre supprimé avec succès!";
    } else {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publication_year = $_POST['publication_year'];
        $genre = $_POST['genre'];
        $user_id = $_POST['user_id'];
        
        if ($id) {
            $bookDAO->updateBook($id, $title, $author, $publication_year, $genre, $user_id);
            echo "Livre mis à jour avec succès!";
        } else {
            
            $bookDAO->addBook($title, $author, $publication_year, $genre, $user_id);
            echo "Livre ajouté avec succès!";
        }
    }
}
?>
