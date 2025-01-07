<!DOCTYPE html>
<html>

<?php

// define POST on login.php
// check if access with post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of username & password field
    $username = $_POST['username'];
    if (empty($username)) {
        echo "Name is empty";
    } else {
        $servername = "127.0.0.1";
        $usernameDB = "root";
        $password = "";
        $db = "RealEstate";

        // Create connection
        $conn = new mysqli($servername,$usernameDB, $password , $db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        
        
    
            $sql="SELECT * FROM `users` WHERE username = '$username';";
            $query = mysqli_query($conn,$sql);
            $result = mysqli_fetch_assoc($query);
            $resultstring = $result['message'];
        
            echo $resultstring;
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
    <title>ProRealEstate</title>


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