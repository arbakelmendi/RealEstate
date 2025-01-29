<!DOCTYPE html>
<html lang="en">

<?php

session_start();

$error = ""; 
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username =$_POST['username'];
    $password =$_POST['password'];
    $status = 'user';

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
    //echo "Connected successfully</br>";


    // check user 
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error = "Username already exists. <a href='login.php' style='color: blue; text-decoration: underline;'>Click here to login</a>";
    }else{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, pw, status) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashedPassword, $status);

        if ($stmt->execute()) {
            $error = "<span style='color: green;'>Registration successful! <a href='login.php' style='color: blue; text-decoration: underline;'>Click here to login</a></span>";
        } else {
            $error = "Registration failed. Please try again.";
        }
    }

    $stmt->close();
    $conn->close();
}

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <title>RegisterForm</title>
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <img src="img/logo.png" class="logo">
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="agents.php">Agents</a></li>
                <li><a href="contactUs.php">Contact</a></li>
                <li><a href="login.php" class="h-btn1">Login</a></li>
                <li><a href="registerForm.php" class="h-btn2">Sign Up</a></li>

            </ul>
        </div>
        <div class="login-form">

<form method="POST" action="/registerForm.php" onsubmit="validateUser()">
<label for="firstname">
        Firstname:
    </label>
    <input type="text" id="Firstname" name="firstname" placeholder="Enter your Firstname" required>
    <label for="lastname">
        Lastname:
    </label>
    <input type="text" id="Lastname" name="lastname" placeholder="Enter your Lastname" required>
    <label for="username">
        Username:
    </label>
    <input type="text" id="username" name="username" placeholder="Enter your Username" required>

    <label for="password">
        Password:
    </label>
    <input type="password" id="password" name="password" placeholder="Enter your Password" required>



    <div class="wrap">
        <button type="submit">
            Sign Up
        </button>
    </div>
</form>




<?php if ($error): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    </div>
</body>

</html>