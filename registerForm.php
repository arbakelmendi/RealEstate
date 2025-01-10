<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>RegisterForm</title>
</head>
<body>
<div class="banner">
        <div class="navbar">
            <img src="img/logo.png" class="logo">
            <ul>
                <!--****** change all pages -->
                <li><a href="main.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="agents.php">Agents</a></li>
                <li><a href="contactUs.php">Contact</a></li>
                <li><a href="login.php" class="h-btn1">Login</a></li>
                <li><a href="registerForm.php" class="h-btn2">Sign Up</a></li>

            </ul>
        </div>
    <div class="container" id="signup">
        <h1 class="form-title">Register</h1>
        <form method="post" action="">
            <div class="input">
                <input type="text" name="fName" id="fName" placeholder="First Name" required>
            </div>
            <div class="input-group">
                <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            </div>
            <div class="input-group">
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" id="password" placeholder="Password" required>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
        <p class="or">
            ------or------
        </p>
        <div class="links">
            <p>Already Have Account?</p>
            <button id="signInButton">Sign In</button>
        </div>
    </div>
</body>
</html>