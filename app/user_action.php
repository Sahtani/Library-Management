<?php
require_once 'classes/DAO/UserDAO.php';

$userDAO = new UserDAO("localhost", "root", "", "library");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST['addUser'])) {
        
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone'];
      
        $userDAO->addUser($firstName, $lastName, $email, $phoneNumber);
        header("Location: users.php");
    } elseif (isset($_POST['updateUser'])) {
    
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone'];$userDAO->updateUser($id, $firstName, $lastName, $email, $phoneNumber);
       
       
        header("Location: users.php");
    } elseif (isset($_POST['deactivate'])) {
        $id = $_POST['id'];

        $userDAO->deactivateUser($id);
        header("Location: users.php");
    }
}

// Redirect back to the page after processing the action

?>
