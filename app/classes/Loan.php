<?php
class Loan {
    private $id;
    private $idUtilisateur;
    private $idLivre;
    private $dateEmprunt;
    private $dateRetour;

    public function __construct($id, $idUtilisateur, $idLivre, $dateEmprunt, $dateRetour) {
        $this->id = $id;
        $this->idUtilisateur = $idUtilisateur;
        $this->idLivre = $idLivre;
        $this->dateEmprunt = $dateEmprunt;
        $this->dateRetour = $dateRetour;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function getIdLivre() {
        return $this->idLivre;
    }

    public function getDateEmprunt() {
        return $this->dateEmprunt;
    }

    public function getDateRetour() {
        return $this->dateRetour;
    }

    // Setters
    public function setDateEmprunt($dateEmprunt) {
        $this->dateEmprunt = $dateEmprunt;
    }

    public function setDateRetour($dateRetour) {
        $this->dateRetour = $dateRetour;
    }
}
?>
