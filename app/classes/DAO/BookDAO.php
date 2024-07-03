<?php

// classes/DAO/BookDAO.php
require_once __DIR__ . '/../Book.php';


class BookDAO {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        $this->conn->close();
    }

    public function getAllBooks() {
        $sql = "SELECT * FROM books";
        $result = $this->conn->query($sql);
        $books = [];
        while ($row = $result->fetch_assoc()) {
            $book = new Book($row['id'], $row['title'], $row['author'], $row['publication_year'], $row['genre'], $row['user_id']);
            $books[] = $book;
        }
        return $books;
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
        $sql = "INSERT INTO books (title, author, publication_year, genre, user_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssisi", $title, $author, $publication_year, $genre, $user_id);
        return $stmt->execute();
    }

    public function updateBook($id, $title, $author, $publication_year, $genre, $user_id) {
        $sql = "UPDATE books SET title = ?, author = ?, publication_year = ?, genre = ?, user_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssisii", $title, $author, $publication_year, $genre, $user_id, $id);
        return $stmt->execute();
    }

    public function deleteBook($id) {
        $sql = "DELETE FROM books WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
