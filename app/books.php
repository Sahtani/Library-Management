<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Livres</title>
    <style>
        /* Styles pour le popup modal */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .popup h2 {
            margin-top: 0;
        }
        .popup-content {
            margin-bottom: 10px;
        }
        .popup-buttons {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Ajouter ou Modifier un Livre</h1>
    <form action="book_action.php" method="post">
        <input type="hidden" id="id" name="id">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required><br>

        <label for="author">Auteur :</label>
        <input type="text" id="author" name="author" required><br>

        <label for="publication_year">Année de publication :</label>
        <input type="number" id="publication_year" name="publication_year" required><br>

        <label for="genre">Genre :</label>
        <input type="text" id="genre" name="genre" required><br>

        <label for="user_id">ID Utilisateur :</label>
        <input type="number" id="user_id" name="user_id" required><br>

        <input type="submit" value="Soumettre">
    </form>

    <h1>Liste des Livres</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Année de publication</th>
            <th>Genre</th>
            <th>ID Utilisateur</th>
            <th>Actions</th>
        </tr>
        <?php
        // Inclure le fichier BookDAO.php
        require_once 'classes/DAO/BookDAO.php';

        // Instancier BookDAO avec les paramètres de connexion appropriés
        $bookDAO = new BookDAO("localhost", "root", "", "library");

        // Récupérer tous les livres depuis la base de données
        $books = $bookDAO->getAllBooks();

        // Afficher chaque livre dans une ligne de tableau avec des boutons Modifier et Supprimer
        foreach ($books as $book) {
            echo "<tr>
                <td>{$book->getId()}</td>
                <td>{$book->getTitle()}</td>
                <td>{$book->getAuthor()}</td>
                <td>{$book->getPublicationYear()}</td>
                <td>{$book->getGenre()}</td>
                <td>{$book->getUserId()}</td>
                <td>
                    <button onclick=\"openEditPopup('{$book->getId()}', '{$book->getTitle()}', '{$book->getAuthor()}', '{$book->getPublicationYear()}', '{$book->getGenre()}')\">Modifier</button>
                    <form action='book_action.php' method='post' style='display:inline;'>
                        <input type='hidden' name='id' value='{$book->getId()}'>
                        <input type='submit' name='delete' value='Supprimer'>
                    </form>
                </td>
            </tr>";
        }
        ?>
    </table>

    <!-- Popup modal -->
    <div id="editPopup" class="popup">
        <div class="popup-content">
            <h2>Modifier le Livre</h2>
            <form id="editForm" action="book_action.php" method="post">
                <input type="hidden" id="edit_id" name="id">
                <label for="edit_title">Titre :</label>
                <input type="text" id="edit_title" name="title" required><br>

                <label for="edit_author">Auteur :</label>
                <input type="text" id="edit_author" name="author" required><br>

                <label for="edit_publication_year">Année de publication :</label>
                <input type="number" id="edit_publication_year" name="publication_year" required><br>

                <label for="edit_genre">Genre :</label>
                <input type="text" id="edit_genre" name="genre" required><br>

                <label for="edit_user_id">ID Utilisateur :</label>
                <input type="number" id="edit_user_id" name="user_id" required><br>

                <input type="submit" value="Confirmer">
            </form>
        </div>
        <div class="popup-buttons">
            <button onclick="closeEditPopup()">Annuler</button>
        </div>
    </div>

    <script>
        function openEditPopup(id, title, author, publication_year, genre, user_id) {
            // Remplir le formulaire de modification avec les données du livre sélectionné
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_author').value = author;
            document.getElementById('edit_publication_year').value = publication_year;
            document.getElementById('edit_genre').value = genre;
            document.getElementById('edit_user_id').value = user_id;

            // Afficher le popup modal
            var popup = document.getElementById('editPopup');
            popup.style.display = 'block';
        }

        function closeEditPopup() {
            // Cacher le popup modal et réinitialiser le formulaire
            var popup = document.getElementById('editPopup');
            popup.style.display = 'none';
        }
    </script>
</body>
</html>
