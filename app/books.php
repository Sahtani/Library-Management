<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="public/css/footer.css">
  <link rel="stylesheet" href="public/js/delete.js">
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
      <?php
      if (isset($_SESSION['message'])) {
        echo "<div class='p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 w-1/4 m-10' role='alert'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
      }
      ?>

      <div class="  flex flex-col flex-end">
        <button onclick="openModal()" class=" bg-blue-400 hover:bg-blue-300 text-center mt-10 ml-20 w-60 text-white font-semibold py-2 px-4 rounded">
          Ajouter un livre
        </button>
      </div>


      <h1 class="text-3xl font-bold text-center p-6">Liste des Livres</h1>
      <div class="w-full flex items-center justify-center">


        <table id="booksTable" class="table-auto  bg-white border border-gray-200 shadow-md rounded-lg overflow-hidden w-4/5">
          <thead>
            <tr class="bg-gray-200">
              <th class="px-4 py-2">Titre</th>
              <th class="px-4 py-2">Auteur</th>
              <th class="px-4 py-2">Année de publication</th>
              <th class="px-4 py-2">Genre</th>
              <th class="px-4 py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once 'classes/DAO/BookDAO.php';

            $bookDAO = new BookDAO("localhost", "root", "", "library");
            $books = $bookDAO->getAllBooks();

            foreach ($books as $book) {
              echo "<tr class='border-t border-gray-200'>
                    <td class='px-4 py-2'>{$book->getTitle()}</td>
                    <td class='px-4 py-2'>{$book->getAuthor()}</td>
                    <td class='px-4 py-2'>{$book->getPublicationYear()}</td>
                    <td class='px-4 py-2'>{$book->getGenre()}</td>
                    <td class='px-4 py-2'>
                        <button class='bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md' onclick=\"openEditPopup('{$book->getId()}', '{$book->getTitle()}', '{$book->getAuthor()}', '{$book->getPublicationYear()}', '{$book->getGenre()}')\">Modifier</button>
                        <form action='book_action.php'  method='post' id='deleteBookForm' class='inline'>
                            <input type='hidden' name='id' value='{$book->getId()}'>
                            <input type='submit' name='delete'  value='Supprimer' class='bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md delete-btn'>
                        </form>
                    </td>
                </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="  flex flex-col flex-end mb-4">
        <button onclick="openEmpruntModal()" class=" bg-blue-400 hover:bg-blue-300 text-center mt-10 ml-20 w-60 text-white font-semibold py-2 px-4 rounded">
          Emprunter un livre
        </button>
      </div>
      <h1 class="text-3xl font-bold text-center p-6">Liste des emprunts</h1>
      <div class="w-full flex items-center justify-center">
        <table class="table-auto  bg-white border border-gray-200 shadow-md rounded-lg overflow-hidden w-4/5">
          <thead>
            <tr class="bg-gray-200">
              <th class="px-4 py-2">Nom de livre</th>
              <th class="px-4 py-2">Date d’emprunt</th>
              <th class="px-4 py-2">Date de retour prévue</th>
              <th class="px-4 py-2">Date de retour</th>
              <th class="px-4 py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once 'classes/DAO/EmpruntDAO.php';

            $borrowingDAO = new EmpruntDAO("localhost", "root", "", "library");

            $emprunts = $borrowingDAO->getAllEmprunts();
            $availableBooks = $bookDAO->getAvailableBooks();

            foreach ($emprunts as $emprunt) {
              echo "<tr>
                   <td class='border px-4 py-2'>{$emprunt->getBookTitle()}</td>
                    <td class='border px-4 py-2'>{$emprunt->getBorrowDate()}</td>
                    <td class='border px-4 py-2'>{$emprunt->getDueDate()}</td>
                    <td class='border px-4 py-2'>{$emprunt->getReturnDate()}</td>
                    <td class='border px-4 py-2'>
                    <div class='flex gap-4'>
                      <button onclick=\"openExtendPopup('{$emprunt->getId()}', '{$emprunt->getDueDate()}')\" class='w-1/2 bg-yellow-500 text-white px-4 py-2 rounded'>prolonger</button>
                        <button onclick=\"openReturnPopup('{$emprunt->getId()}')\" class='w-1/2 bg-green-500 text-white  px-4 py-2 rounded'>retourner</button>
                  
                    </div>
                        </td>
                </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- ADD popup modal -->
      <div id="bookModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
          <h2 class="text-2xl mb-4">Ajouter un Livre</h2>
          <form action="book_action.php" method="post">
            <input type="hidden" id="id" name="id">
            <label for="title" class="block text-sm font-medium text-gray-700">Titre :</label>
            <input type="text" id="title" name="title" required class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full">

            <label for="author" class="block text-sm font-medium text-gray-700">Auteur :</label>
            <input type="text" id="author" name="author" required class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full">

            <label for="publication_year" class="block text-sm font-medium text-gray-700">Année de publication :</label>
            <input type="number" id="publication_year" name="publication_year" required class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full">

            <label for="genre" class="block text-sm font-medium text-gray-700">Genre :</label>
            <input type="text" id="genre" name="genre" required class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full">
            <input type="number" id="user_id" hidden name="user_id" value="<?php echo htmlspecialchars($user_id); ?>" required class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full">

            <div class="flex justify-end">
              <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuler</button>
              <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Soumettre</button>
            </div>
          </form>
        </div>
      </div>
      <!--EDIT  Popup modal -->
      <div id="editPopup" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
          <h2 class="text-xl text-center">Modifier le Livre</h2>
          <form id="editForm" action="book_action.php" method="post">
            <input type="hidden" id="edit_id" name="id">
            <label for="edit_title" class="block text-sm font-medium text-gray-700">Titre :</label>
            <input type="text" id="edit_title" name="title" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required><br>

            <label for="edit_author" class="block text-sm font-medium text-gray-700">Auteur :</label>
            <input type="text" id="edit_author" name="author" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required><br>

            <label for="edit_publication_year" class="block text-sm font-medium text-gray-700">Année de publication :</label>
            <input type="number" id="edit_publication_year" name="publication_year" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required><br>

            <label for="edit_genre" class="block text-sm font-medium text-gray-700">Genre :</label>
            <input type="text" id="edit_genre" name="genre" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required><br>

            <input type="number" id="edit_user_id" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>" hidden required>
            <div class="flex justify-end">
              <button type="button" onclick="closeEditPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuler</button>
              <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Confirmer</button>
            </div>

          </form>
        </div>
      </div>
      <!-- delete model -->
      <div id="deleteModel" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
              <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
              <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this book?</h3>
              <button type='submit' name='delete' class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                Supprimer
              </button>
              <button onclick="closedeleteModal()" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
          </div>
        </div>
      </div>

      <!-- popup for emprunt live -->
      <!-- popup for emprunter un livre  -->
      <div id="empruntPopup" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <form action="emprunt_action.php" method="post" class="bg-white p-4 rounded shadow-md mb-8 w-2/6">
          <input type="number" id="user_id" hidden name="user_id" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" value="<?php echo htmlspecialchars($user_id); ?>">

          <label for="book_id" class="block text-sm font-medium text-gray-700">Livre:</label>
          <select id="book_id" name="book_id" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required>
            <option value="" disabled selected>Selectionner un livre</option>
            <?php foreach ($availableBooks as $book) : ?>
              <option value="<?php echo $book['id']; ?>"><?php echo $book['title']; ?></option>
            <?php endforeach; ?>
          </select>
          <input type="date" id="borrow_date" name="borrow_date" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full hidden" required>

          <label for="due_date" class="block text-sm font-medium text-gray-700">Date de retour prévue:</label>
          <input type="date" id="due_date" name="due_date" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required>

          <div class="flex justify-end">
            <button type="button" onclick="closeEmpruntModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuler</button>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Soumettre</button>
          </div>
        </form>

      </div>
      <!-- Popup modal to extend borrowing period -->
      <div id="extendBorrowingPopup" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
        <div class="bg-white p-4 rounded shadow-md w-1/4">
          <h2 class="text-xl font-bold mb-4">Prolonger l’emprunt</h2>
          <form id="extendForm" action="emprunt_action.php" method="post" class="w-full">
            <input type="hidden" id="extend_id" name="id">
            <input type="hidden" name="action" value="extend">

            <label for="new_due_date" class="block text-sm font-medium text-gray-700">Nouvelle date de retour prévue:</label>
            <input type="date" id="new_due_date" name="new_due_date" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required>

            <div class="flex justify-end">
              <button type="button" onclick="closeExtendPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuler</button>
              <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Confirmer</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Popup modal to return a book -->
      <div id="returnBookPopup" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
        <div class="bg-white p-4 rounded shadow-md w-1/4">
          <h2 class="text-xl font-bold mb-4">Retourner un livre</h2>
          <form id="returnForm" action="emprunt_action.php" method="post" class="w-full">
            <input type="hidden" id="return_id" name="id">
            <input type="hidden" name="action" value="return">


            <input type="date" id="return_date" name="return_date" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full hidden " required>

            <div class="flex justify-end">
              <button type="button" onclick="closeReturnPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuler</button>
              <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Confirmer</button>
            </div>
          </form>
        </div>
      </div>


      <script>
        function openEditPopup(id, title, author, publication_year, genre, user_id) {

          document.getElementById('edit_id').value = id;
          document.getElementById('edit_title').value = title;
          document.getElementById('edit_author').value = author;
          document.getElementById('edit_publication_year').value = publication_year;
          document.getElementById('edit_genre').value = genre;


          document.getElementById('editPopup').classList.remove('hidden');
        }

        function closeEditPopup() {
          // Cacher le popup modal et réinitialiser le formulaire
          document.getElementById('editPopup').classList.add('hidden');
        }

        function openModal() {
          document.getElementById('bookModal').classList.remove('hidden');
        }

        function closeModal() {
          document.getElementById('bookModal').classList.add('hidden');
        }
        // delete model
        function opendeleteModal() {
          document.getElementById('deleteModel').classList.remove('hidden');
        }

        function closedeleteModal() {
          document.getElementById('deleteModel').classList.add('hidden');
        }

        // emprunt un livre
        function openExtendPopup(id, due_date) {
          document.getElementById('extend_id').value = id;
          document.getElementById('new_due_date').value = due_date;
          document.getElementById('extendBorrowingPopup').classList.remove('hidden');
        }

        function closeExtendPopup() {
          document.getElementById('extendBorrowingPopup').classList.add('hidden');
        }

        function openReturnPopup(id) {
          document.getElementById('return_id').value = id;
          document.getElementById('returnBookPopup').classList.remove('hidden');
        }

        function closeReturnPopup() {
          document.getElementById('returnBookPopup').classList.add('hidden');
        }

        function openEmpruntModal() {
          document.getElementById('empruntPopup').classList.remove('hidden');
        }

        function closeEmpruntModal() {
          document.getElementById('empruntPopup').classList.add('hidden');
        }

        document.getElementById('borrow_date').value = new Date().toISOString().split('T')[0];
        document.getElementById('return_date').value = new Date().toISOString().split('T')[0];

        // function deleteformSubmit(e,bookId) {
        //     e.preventDefault();
        //     const formData = new FormData(document.getElementById('deleteBookForm'));

        //     fetch('book_action.php', {
        //         method: 'POST',
        //         body: new URLSearchParams(formData)
        //     })
        //     .then(response => {
        //     console.log('r',response);
        //         if (!response.ok) {

        //             throw new Error('Network response was not ok');
        //         }
        //         return response.json();
        //     })
        //     .then(data => {
        //       console.log('d',data);
        //         if (data.error) {
        //             alert('Error: ' + data.error);
        //         } else {
        //             alert(data.message); 
        //         }
        //     })
        //     .catch(error => {

        //         console.error('Erreur:', error);  console.log(error);
        //     });
        // }  
      </script>
    </div>
</body>

</html>