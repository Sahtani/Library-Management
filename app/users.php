<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Utilisateurs</title>
</head>
<body>
    <h1>Ajouter ou Modifier un Utilisateur</h1>
    <form action="user_action.php" method="post">
        <label for="firstName">Prénom :</label>
        <input type="text" id="firstName" name="firstName" required><br>

        <label for="lastName">Nom :</label>
        <input type="text" id="lastName" name="lastName" required><br>

        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phoneNumber">Numéro de téléphone :</label>
        <input type="tel" id="phoneNumber" name="phone" required><br>

        <input type="submit" value="Ajouter" name="addUser">
    </form>

    <h1>Liste des Utilisateurs</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Adresse e-mail</th>
            <th>Numéro de téléphone</th>
            <th>Actif</th>
            <th>Actions</th>
        </tr>
        <?php
        // Inclure le fichier UserDAO.php
        require_once 'classes/DAO/UserDAO.php';
        require_once 'config/Database.php';
        // Instancier UserDAO avec les paramètres de connexion appropriés
    
        $userDAO = new UserDAO("localhost", "root", "", "library");
        $users = $userDAO->getAllUsers();

        // Afficher chaque utilisateur dans une ligne de tableau avec des boutons Modifier et Désactiver
        foreach ($users as $user) {
          echo "<tr>
                <td>{$user->getId()}</td>
                <td>{$user->getFirstName()}</td>
                <td>{$user->getLastName()}</td>
                <td>{$user->getEmail()}</td>
                <td>{$user->getPhoneNumber()}</td>
                <td>". ($user->isActive() ? 'Oui' : 'Non') ."</td>
                <td>
                    <button onclick=\"openEditPopup('{$user->getId()}', '{$user->getFirstName()}', '{$user->getLastName()}', '{$user->getEmail()}', '{$user->getPhoneNumber()}')\">Modifier</button>
                    <form action='user_action.php' method='post' style='display:inline;'>
                        <input type='hidden' name='id' value='{$user->getId()}'>
                        <input type='submit' name='deactivate' value='Désactiver'>
                    </form>
                </td>
            </tr>";
        }
        ?>
    </table>

    <!-- Popup modal pour modifier un utilisateur -->
    <!-- <div id="editUserPopup" class="popup">
        <div class="popup-content">
            <h2>Modifier l'Utilisateur</h2>
            <form id="editUserForm" action="user_action.php" method="post">
                <input type="hidden" id="edit_id" name="id">
                <label for="edit_firstName">Prénom :</label>
                <input type="text" id="edit_firstName" name="firstName" required><br>

                <label for="edit_lastName">Nom :</label>
                <input type="text" id="edit_lastName" name="lastName" required><br>

                <label for="edit_email">Adresse e-mail :</label>
                <input type="email" id="edit_email" name="email" required><br>

                <label for="edit_phoneNumber">Numéro de téléphone :</label>
                <input type="tel" id="edit_phoneNumber" name="phoneNumber" required><br>

                <input type="submit" value="Confirmer">
            </form>
        </div>
        <div class="popup-buttons">
            <button onclick="closeEditUserPopup()">Annuler</button>
        </div>
    </div> -->

    <script>
        function openEditPopup(id, firstName, lastName, email, phoneNumber) {
            // Remplir le formulaire de modification avec les données de l'utilisateur sélectionné
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_firstName').value = firstName;
            document.getElementById('edit_lastName').value = lastName;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_phoneNumber').value = phoneNumber;

            // Afficher le popup modal pour modifier l'utilisateur
            var popup = document.getElementById('editUserPopup');
            popup.style.display = 'block';
        }

        function closeEditUserPopup() {
            // Cacher le popup modal pour modifier l'utilisateur
            var popup = document.getElementById('editUserPopup');
            popup.style.display = 'none';
        }
    </script>
</body>
</html>
