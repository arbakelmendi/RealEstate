<?php
session_start();
require_once 'Database.php';
require_once 'User.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $database = new Database();
    $pdo = $database->getConnection();

    
    $user = new User($pdo);

    
    $error = $user->register($username, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <title>Register Form</title>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="img/logo.png" class="logo">
            <ul>
                <li><a href="login.php" class="h-btn1">Login</a></li>
                <li><a href="registerForm.php" class="h-btn2">Sign Up</a></li>
            </ul>
        </div>
        <div class="login-form">
            <form method="POST" action="/registerForm.php" onsubmit="validateUser()">
                <label for="firstname">Firstname:</label>
                <input type="text" id="Firstname" name="firstname" placeholder="Enter your Firstname" required>

                <label for="lastname">Lastname:</label>
                <input type="text" id="Lastname" name="lastname" placeholder="Enter your Lastname" required>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your Username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your Password" required>

                <div class="wrap">
                    <button type="submit">Sign Up</button>
                </div>
            </form>

            <?php if ($error): ?>
                <p><?= $error ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
