<!DOCTYPE html>
<html>

<?php

session_start();

$error = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = "127.0.0.1";
    $usernameDB = "root";
    $passwordDB = "";
    $db = "RealEstate";

    // Create connection
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // check login
    $stmt = $conn->prepare("SELECT pw, status FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword, $status);
    $stmt->fetch();

    if ($hashedPassword && password_verify($password, $hashedPassword)) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = $status;
        if ($status === 'admin') {
            header("Location: admin_dashboard.php");
        } else if ($status === 'user') {
            header("Location: main.php");
        }
    exit;
} else {
    $error = "Incorrect username or password!";
}
}



?>

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

                <form method="POST" action="login.php" onsubmit="validateUser()">
                    <label for="first">
                        Username:
                    </label>
                    <input type="text" id="username" name="username" placeholder="Enter your Username" required>

                    <label for="password">
                        Password:
                    </label>
                    <input type="password" id="password" name="password" placeholder="Enter your Password" required>

                    <div class="wrap">
                        <button type="submit">
                            Submit
                        </button>
                    </div>
                    <p id=isLoginCorrect></p>
                </form>

                <?php if ($error): ?>
                    <p style="color: red;"><?= $error ?></p>
                <?php endif; ?>



            </div>
        </div>
    </div>
</body>

</html>