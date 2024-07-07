<?php
class Emprunt {
    private $id;
    private $user_id;
    private $book_id;
    private $borrow_date;
    private $due_date;
    private $return_date;
    private $book_title; // New property for book title

    public function __construct($id, $user_id, $book_id, $borrow_date, $due_date, $return_date = null, $book_title) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->book_id = $book_id;
        $this->borrow_date = $borrow_date;
        $this->due_date = $due_date;
        $this->return_date = $return_date;
        $this->book_title = $book_title; 
    }

    public function getBookTitle() {
        return $this->book_title;
    }


    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getBookId() {
        return $this->book_id;
    }

    public function getBorrowDate() {
        return $this->borrow_date;
    }

    public function getDueDate() {
        return $this->due_date;
    }

    public function getReturnDate() {
        return $this->return_date;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setBookId($book_id) {
        $this->book_id = $book_id;
    }

    public function setBorrowDate($borrow_date) {
        $this->borrow_date = $borrow_date;
    }

    public function setDueDate($due_date) {
        $this->due_date = $due_date;
    }

    public function setReturnDate($return_date) {
        $this->return_date = $return_date;
    }
}
?>
