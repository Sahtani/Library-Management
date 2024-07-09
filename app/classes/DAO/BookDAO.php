<?php
// classes/DAO/BookDAO.php
require_once __DIR__ . '/../Book.php';
require_once __DIR__ . '/BaseDAO.php';
require_once __DIR__ . '/../../config/Database.php'; // Chemin vers Database.php

class BookDAO extends BaseDAO  {
    protected $conn;

    public function __construct() {
        parent::__construct(); // Appel du constructeur de BaseDAO pour établir la connexion
    }

    public function getAllBooks() {
        $sql = "SELECT * FROM books";
        $result = $this->conn->query($sql);
        $books = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC))  {
            $book = new Book($row['id'], $row['title'], $row['author'], $row['publication_year'], $row['genre'], $row['user_id']);
            $books[] = $book;
        }
        return $books;
    }

    public function getAvailableBooks() {
        $sql = "SELECT id, title FROM books WHERE disponible = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getBookById($id) {
        $sql = "SELECT * FROM books WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return new Book($row['id'], $row['title'], $row['author'], $row['publication_year'], $row['genre'], $row['user_id']);
    }

    public function addBook($title, $author, $publication_year, $genre, $user_id) {
        $sql = "INSERT INTO books (title, author, publication_year, genre, user_id) VALUES (:title, :author, :publication_year, :genre, :user_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":author", $author, PDO::PARAM_STR);
        $stmt->bindParam(":publication_year", $publication_year, PDO::PARAM_INT);
        $stmt->bindParam(":genre", $genre, PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateBook($id, $title, $author, $publication_year, $genre, $user_id) {
        $sql = "UPDATE books SET title = :title, author = :author, publication_year = :publication_year, genre = :genre, user_id = :user_id WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":author", $author, PDO::PARAM_STR);
        $stmt->bindParam(":publication_year", $publication_year, PDO::PARAM_INT);
        $stmt->bindParam(":genre", $genre, PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    
    

    

    public function deleteBook($id) {
        $sql = "DELETE FROM books WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }


    public function updatedateLivre($book_id) {
        try {
            $sql = "UPDATE books SET returned = 1 WHERE id = :book_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':book_id', $book_id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }
    
}
?>
