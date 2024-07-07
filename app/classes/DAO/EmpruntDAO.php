<?php
require_once 'BaseDAO.php';
require_once __DIR__ . '/../Emprunt.php';

class EmpruntDAO extends BaseDAO {

    public function emprunterLivre($user_id, $book_id, $borrow_date, $due_date) {
        $sql = "INSERT INTO emprunts (user_id, book_id, borrow_date, due_date) VALUES (:user_id, :book_id, :borrow_date, :due_date)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':book_id', $book_id);
        $stmt->bindParam(':borrow_date', $borrow_date);
        $stmt->bindParam(':due_date', $due_date);
        $stmt->execute();

        $sql_update = "UPDATE books SET disponible = 0 WHERE id = :book_id";
        $stmt_update = $this->conn->prepare($sql_update);
        $stmt_update->bindParam(':book_id', $book_id);
        $stmt_update->execute();
    }

    public function prolongerEmprunt($id, $new_due_date) {
        $sql = "UPDATE emprunts SET due_date = :new_due_date WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':new_due_date', $new_due_date);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function retournerLivre($id, $return_date) {
        try {
            $this->conn->beginTransaction();

            // Requête SQL pour mettre à jour les deux tables en une seule opération
            $sql = "UPDATE emprunts AS e
                    INNER JOIN books AS b ON e.book_id = b.id
                    SET e.return_date = :return_date, b.returned = 1
                    WHERE e.id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':return_date', $return_date);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }   
    

    public function enregistrerRetourAdmin($id, $return_date, $late_fee) {
        try {
            // Commencez une transaction
            $this->conn->beginTransaction();
    
            // Mettre à jour la table emprunts
            $sql = "UPDATE emprunts SET return_date = :return_date WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':return_date', $return_date);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            // Récupérer le book_id à partir de l'emprunt
            $sql = "SELECT book_id FROM emprunts WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $book_id = $result['book_id'];
    
            // Mettre à jour la table books pour ajuster la disponibilité du livre
            $sql = "UPDATE books SET disponible = 1 WHERE id = :book_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':book_id', $book_id);
            $stmt->execute();
    
            // // Si il y a des frais de retard, les enregistrer dans la table late_fees
            // if ($late_fee > 0) {
            //     $sql = "INSERT INTO late_fees (emprunt_id, amount) VALUES (:emprunt_id, :amount)";
            //     $stmt = $this->conn->prepare($sql);
            //     $stmt->bindParam(':emprunt_id', $id);
            //     $stmt->bindParam(':amount', $late_fee);
            //     $stmt->execute();
            // }
    
            // Commit transaction
            $this->conn->commit();
    
            return true;
        } catch (PDOException $e) {
            // Rollback transaction en cas d'erreur
            $this->conn->rollBack();
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }
    
    public function getAllEmprunts() {
        $sql = "SELECT emprunts.id, emprunts.user_id, emprunts.book_id, emprunts.borrow_date, emprunts.due_date, emprunts.return_date, books.title 
                FROM emprunts 
                JOIN books ON emprunts.book_id = books.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $borrowings = [];
        foreach ($results as $row) {
            $borrowing = new Emprunt(
                $row['id'],
                $row['user_id'],
                $row['book_id'],
                $row['borrow_date'],
                $row['due_date'],
                
                isset($row['return_date']) ? $row['return_date'] : null,
                $row['title'] 
            );
            $borrowings[] = $borrowing;
        }
        return $borrowings;
    }

    public function getUserNameById($user_id) {
        $sql = "SELECT CONCAT(first_name, ' ', last_name) AS full_name FROM users WHERE id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['full_name'];
    }
    
    public function getBookNameById($book_id) {
        $sql = "SELECT title FROM books WHERE id = :book_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':book_id', $book_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['title'];
    }
    
    
    
    
}
?>
