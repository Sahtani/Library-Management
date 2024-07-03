<?php
// Entity.php

class Entity {
    protected $id;
    protected $createdAt;

    public function __construct($id, $createdAt) {
        $this->id = $id;
        $this->createdAt = $createdAt;
    }

    public function getId() {
        return $this->id;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }
}
?>
