<?php
session_start(); // Démarrer la session au début du fichier

// Vérifiez si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}

// Définissez la variable user_id à partir de la session
$user_id = $_SESSION['user_id'];
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Poppins, sans-serif;
        }
    </style>
    </style>
</head>

<body class="max-w-[1920px] mx-auto bg-blue-100 text-black text-sm">
    <div class="bg-white">
        <header class="py-4 px-4 sm:px-10 bg-white z-50 relative shadow-sm">
            <div class='max-w-7xl w-full mx-auto flex flex-wrap items-center gap-4'>
                <a href="javascript:void(0)"><img src="../images/logo.jpg" alt="logo" class='w-24' />
                </a>

                <div id="collapseMenu" class='max-lg:hidden lg:!block max-lg:fixed max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-40 max-lg:before:inset-0'>
                    <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
                            <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" data-original="#000000"></path>
                            <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" data-original="#000000"></path>
                        </svg>
                    </button>

                    <ul class='lg:!flex lg:ml-12 lg:space-x-6 max-lg:space-y-6 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-4 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
                        <li class='max-lg:border-b max-lg:pb-4 px-3 lg:hidden'>
                            <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-40' />
                            </a>
                        </li>
                        <li class='max-lg:border-b max-lg:py-2 px-3'>
                            <a href='javascript:void(0)' class='hover:text-blue-600 text-blue-600 block font-semibold transition-all'>Home</a>
                        </li>
                        <li class='max-lg:border-b max-lg:py-2 px-3 group relative'><a href='javascript:void(0)' class='hover:text-blue-600 block font-semibold transition-all'>Pages
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-current inline ml-1.5" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z" clip-rule="evenodd" data-original="#000000" />
                                </svg>
                            </a>

                            <ul class='absolute shadow-lg bg-white space-y-3 lg:top-5 max-lg:top-8 -left-0 min-w-[250px] z-50 max-h-0 overflow-hidden group-hover:opacity-100 group-hover:max-h-[700px] px-6 group-hover:pb-4 group-hover:pt-6 transition-all duration-500'>
                                <li class='border-b py-2 '><a href='javascript:void(0)' class='hover:text-blue-600 font-semibold block transition-all'>About</a></li>
                                <li class='border-b py-2 '><a href='javascript:void(0)' class='hover:text-blue-600 font-semibold block transition-all'>Contact</a></li>
                                <li class='border-b py-2 '><a href='javascript:void(0)' class='hover:text-blue-600 font-semibold block transition-all'>Login</a></li>
                                <li class='border-b py-2 '><a href='javascript:void(0)' class='hover:text-blue-600 font-semibold block transition-all'>Sign
                                        up</a></li>
                                <li class='border-b py-2 '><a href='javascript:void(0)' class='hover:text-blue-600 font-semibold block transition-all'>Blog</a></li>
                            </ul>
                        </li>
                        <li class='max-lg:border-b max-lg:py-2 px-3 group relative'><a href='javascript:void(0)' class='hover:text-blue-600 block font-semibold transition-all'>Feature
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-current inline ml-1.5" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z" clip-rule="evenodd" data-original="#000000" />
                                </svg>
                            </a>

                            <ul class='absolute shadow-lg bg-white space-y-3 lg:top-5 max-lg:top-8 -left-0 min-w-[250px] z-50 max-h-0 overflow-hidden group-hover:opacity-100 group-hover:max-h-[700px] px-6 group-hover:pb-4 group-hover:pt-6 transition-all duration-500'>
                                <li class='border-b py-2 '><a href='javascript:void(0)' class='hover:text-blue-600 font-semibold block transition-all'>Foods</a></li>
                                <li class='border-b py-2 '>
                                    <a href='javascript:void(0)' class='hover:text-blue-600 font-semibold block transition-all'>Sale</a>
                                </li>
                                <li class='border-b py-2 '><a href='javascript:void(0)' class='hover:text-blue-600 font-semibold block transition-all'>Marketing</a></li>
                                <li class='border-b py-2 '><a href='javascript:void(0)' class='hover:text-blue-600 font-semibold block transition-all'>Investment</a></li>
                            </ul>
                        </li>
                        <li class='max-lg:border-b max-lg:py-2 px-3'><a href='javascript:void(0)' class='hover:text-blue-600 block font-semibold transition-all'>Blog</a>
                        </li>
                        <li class='max-lg:border-b max-lg:py-2 px-3'><a href='javascript:void(0)' class='hover:text-blue-600 block font-semibold transition-all'>About</a>
                        </li>
                    </ul>
                </div>

                <div class='flex ml-auto'>
                    <a href="log-in.php
          ">
                        <button class='bg-blue-100 hover:bg-blue-200 flex items-center transition-all font-semibold rounded-md px-5 py-3'>Log In
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] fill-current ml-2" viewBox="0 0 492.004 492.004">
                                <path d="M484.14 226.886 306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z" data-original="#000000" />
                            </svg>
                        </button>
                    </a>

                    <button id="toggleOpen" class='lg:hidden ml-7'>
                        <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <div class="bg-blue-100 w-full">


            <button onclick="openModal()" class=" bg-blue-400 hover:bg-blue-300 text-center mt-10 ml-20 w-60 text-white font-semibold py-2 px-4 rounded">
                Ajouter un utilisateur
            </button>

            <h1 class="text-3xl font-bold text-center p-6">Liste des Utilisateurs</h1>

            <div class="w-full flex items-center justify-center">
                <table class="table-auto  bg-white border border-gray-200 shadow-md rounded-lg overflow-hidden w-4/5">
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Prénom</th>
                        <th class="px-4 py-2">Prénom</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Adresse e-mail</th>
                        <th class="px-4 py-2">Numéro de téléphone</th>
                        <th class="px-4 py-2">Actif</th>
                        <th class="px-4 py-2">Actions</th>
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
                        echo "<tr class='border-t border-gray-200'>
                <td class='px-4 py-2'>{$user->getId()}</td>
                <td class='px-4 py-2'>{$user->getFirstName()}</td>
                <td class='px-4 py-2'>{$user->getLastName()}</td>
                <td class='px-4 py-2'>{$user->getEmail()}</td>
                <td class='px-4 py-2'>{$user->getPhoneNumber()}</td>
                <td class='px-4 py-2'>" . ($user->isActive() ? 'Oui' : 'Non') . "</td>
                <td class='px-4 py-2'>
                    <button class='bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md' onclick=\"openEditPopup('{$user->getId()}', '{$user->getFirstName()}', '{$user->getLastName()}', '{$user->getEmail()}', '{$user->getPhoneNumber()}')\">Modifier</button>
                    <form action='user_action.php' method='post' style='display:inline;'>
                        <input type='hidden' name='id' value='{$user->getId()}'>
                        <input type='submit' name='deactivate' class='bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md' value='Désactiver'>
                    </form>
                </td>
            </tr>";
                    }
                    ?>
                </table>
            </div>
            <!--add user -->
            <div id="userModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                    <h2 class="text-2xl mb-4">Ajouter un utilisateur</h2>


                    <form action="user_action.php" method="post">
                        <label for="firstName" class="block text-sm font-medium text-gray-700">Prénom :</label>
                        <input type="text" id="firstName" name="firstName" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required><br>

                        <label for="lastName" class="block text-sm font-medium text-gray-700">Nom :</label>
                        <input type="text" id="lastName" name="lastName" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required><br>

                        <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail :</label>
                        <input type="email" id="email" name="email" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required><br>

                        <label for="phoneNumber" class="block text-sm font-medium text-gray-700">Numéro de téléphone :</label>
                        <input type="tel" id="phoneNumber" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" name="phone" required><br>

                        <div class="flex justify-end">
                            <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuler</button>
                            <button type="submit" name="addUser" class="bg-blue-500 text-white px-4 py-2 rounded">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- Popup modal pour modifier un utilisateur -->
        <div id="editUserPopup" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl text-center">Modifier l'Utilisateur</h2>
                <form id="editUserForm" action="user_action.php" method="post">
                    <input type="hidden" id="edit_id" name="id">
                    <label for="edit_firstName" class="block text-sm font-medium text-gray-700">Prénom :</label>
                    <input type="text" id="edit_firstName" name="firstName" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required><br>

                    <label for="edit_lastName" class="block text-sm font-medium text-gray-700">Nom :</label>
                    <input type="text" id="edit_lastName" name="lastName" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required><br>

                    <label for="edit_email" class="block text-sm font-medium text-gray-700">Adresse e-mail :</label>
                    <input type="email" id="edit_email" name="email" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required><br>

                    <label for="edit_phoneNumber" class="block text-sm font-medium text-gray-700">Numéro de téléphone :</label>
                    <input type="tel" id="edit_phoneNumber" name="phone" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required><br>
                    <div class="flex justify-end">
                        <button type="button"  onclick="closeEditUserPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuler</button>
                        <button type="submit" name="updateUser" class="bg-blue-500 text-white px-4 py-2 rounded">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function openEditPopup(id, firstName, lastName, email, phoneNumber) {
                // Remplir le formulaire de modification avec les données de l'utilisateur sélectionné
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_firstName').value = firstName;
                document.getElementById('edit_lastName').value = lastName;
                document.getElementById('edit_email').value = email;
                document.getElementById('edit_phoneNumber').value = phoneNumber;

                document.getElementById('editUserPopup').classList.remove('hidden');
            }

            function closeEditUserPopup() {
                document.getElementById('editUserPopup').classList.add('hidden');
            }

            // add user model 
            function openModal() {
                document.getElementById('userModal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('userModal').classList.add('hidden');
            }
        </script>
</body>

</html>