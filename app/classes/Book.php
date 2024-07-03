<?php
// classes/Book.php
class Book {
    private $id;
    private $title;
    private $author;
    private $publication_year;
    private $genre;
    private $user_id;

    public function __construct($id, $title, $author, $publication_year, $genre, $user_id) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->publication_year = $publication_year;
        $this->genre = $genre;
        $this->user_id = $user_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPublicationYear() {
        return $this->publication_year;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function getUserId() {
        return $this->user_id;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setPublicationYear($publication_year) {
        $this->publication_year = $publication_year;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
}
?>
