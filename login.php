<?php
session_start();
require 'Database.php'; // Include the Database class
require 'User.php'; // Include the User class

$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create a Database object and get the connection
    $db = new Database();
    $pdo = $db->getConnection();

    // Create a User object and authenticate the user
    $user = new User($pdo);
    $authenticatedUser = $user->authenticate($username, $password);

    if ($authenticatedUser) {
        // Login successful
        $_SESSION['username'] = $username;
        $_SESSION['status'] = $authenticatedUser['status'];

        // Redirect based on user status
        if ($authenticatedUser['status'] === 'admin') {
            header("Location: admin_dashboard.php");
        } else if ($authenticatedUser['status'] === 'user') {
            header("Location: main.php");
        }
        exit;
    } else {
        // Login failed
        $error = "Incorrect username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <script type="text/javascript" src="./js/login.js"></script>
    <title>ProRealEstate-Login</title>
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
        <div>
            <div class="login-form">
                <form method="POST" action="login.php" onsubmit="return validateUser()">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter your Username" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your Password" required>

                    <div class="wrap">
                        <button type="submit">Submit</button>
                    </div>
                    <p id="isLoginCorrect"></p>
                </form>
                <?php if (!empty($error)): ?>
                    <p style="color: red;"><?= $error ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>