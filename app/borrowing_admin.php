<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrowing Management for Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <h1 class="text-2xl font-bold mb-4">Borrowing Management for Admin</h1>
    
    <h2 class="text-xl font-bold mb-4">List of Borrowings</h2>
    <table class="bg-white p-4 rounded shadow-md mb-8 w-full">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">User ID</th>
            <th class="border px-4 py-2">User Name</th>
            <th class="border px-4 py-2">Book ID</th>
            <th class="border px-4 py-2">Book Name</th>
            <th class="border px-4 py-2">Borrow Date</th>
            <th class="border px-4 py-2">Due Date</th>
            <th class="border px-4 py-2">Return Date</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        <?php
        require_once 'classes/DAO/EmpruntDAO.php';

        $empruntDAO = new EmpruntDAO("localhost", "root", "", "library");

        $borrowings = $empruntDAO->getAllEmprunts();

        foreach ($borrowings as $borrowing) {
            $userId = $borrowing->getUserId();
            $bookId = $borrowing->getBookId();
            $userName = $empruntDAO->getUserNameById($userId);
            $bookName = $empruntDAO->getBookNameById($bookId);
            echo "<tr>
                <td class='border px-4 py-2'>{$borrowing->getId()}</td>
                <td class='border px-4 py-2'>{$userId}</td>
                <td class='border px-4 py-2'>{$userName}</td>
                <td class='border px-4 py-2'>{$bookId}</td>
                <td class='border px-4 py-2'>{$bookName}</td>
                <td class='border px-4 py-2'>{$borrowing->getBorrowDate()}</td>
                <td class='border px-4 py-2'>{$borrowing->getDueDate()}</td>
                <td class='border px-4 py-2'>{$borrowing->getReturnDate()}</td>
                <td class='border px-4 py-2'>
                    <button onclick=\"openReturnPopup('{$borrowing->getId()}')\" class='bg-green-500 text-white px-4 py-2 rounded'>Return</button>
                </td>
            </tr>";
        }
        ?>
    </table>

    <!-- Popup modal to return a book -->
    <div id="returnBookPopup" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
        <div class="bg-white p-4 rounded shadow-md">
            <h2 class="text-xl font-bold mb-4">Return Book</h2>
            <form id="returnForm" action="borrowing_admin_action.php" method="post">
                <input type="hidden" id="return_id" name="id">
                <input type="hidden" name="action" value="returnadmin">
                
                <label for="return_date" class="block text-sm font-medium text-gray-700">Return Date:</label>
                <input type="date" id="return_date" name="return_date" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full" required>
                
                <label for="late_fee" class="block text-sm font-medium text-gray-700">Late Fee:</label>
                <input type="number" id="late_fee" name="late_fee" class="mt-1 mb-4 p-2 border border-gray-300 rounded w-full">
                
                <div class="flex justify-end">
                    <button type="button" onclick="closeReturnPopup()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Confirm</button>
                </div>
            </form>
        </div>
    </div>

    <script>
      
    </script>
</body>
</html>
