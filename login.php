<!DOCTYPE html>
<html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $username = $_POST['username'];
    if (empty($username)) {
        echo "Name is empty";
    } else {
        echo $username;
    }

    $password = $_POST['password'];
    if (empty($password)) {
        echo "PASSWORD is empty";
    } else {
        echo $password;
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <script type="text/javascript" src="./js/login.js"></script>
    <title>ProRealEstate - Find your dream house</title>


</head>


<body>




    <div class="banner">
        <div class="navbar">
            <img src="img/logo.png" class="logo">
            <ul>
                <!--********************* change all pages -->
                <li><a href="main.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Buying</a></li>
                <li><a href="#">Renting</a></li>
                <li><a href="#">Selling</a></li>
                <li><a href="contactUs.html">Contact</a></li>
                <li><a href="login.php" class="h-btn1">Login</a></li>
                <li><a href="#" class="h-btn2">Sign Up</a></li>

            </ul>
        </div>

    
<div>
        <div class="login-form">

            <form method="POST" action="/login.php" onsubmit="validateUser()">
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
            </form>


        </div>
    </div>
    </div>
</body>

</html>