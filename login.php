<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si les champs email et password sont envoyés
    if (isset($_POST['email']) && isset($_POST['password'])) {
       
        require_once __DIR__ . '/app/config/Database.php';
        $db = new Database();
        $conn = $db->getConnection();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            var_dump( $user);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            $userRole = $_SESSION['user_role'];
            if ($userRole === 'admin') {
                header('Location: app/users.php');
            } elseif ($userRole === 'user') {
                header('Location: app/books.php');
            } else {
               

                session_destroy();
                header('Location: index.php');
                exit();
            }
           
        } else {
            // Mauvaise authentification, afficher un message d'erreur
            echo "Invalid input. Please check your information and try again.";
        }
    }
}
?>
