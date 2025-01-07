<!DOCTYPE html>
<html>

<?php

// define POST on login.php
// check if access with post
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
    echo "Connected successfully</br>";


    // check user 
    $sql = "SELECT * FROM `users` WHERE username = '$username'";

    $query = mysqli_query($conn, $sql); // sqlobject 

    if ($query != false) {


        $result = mysqli_fetch_assoc($query); // turn to assoc array
        // ['username' =>'Arba','password'=>'arba123','status'=>'user','id'=> 8724]

        if ($result) {
            // Access the 'username' field from the result
            $resultstring = $result['username'];
            echo $resultstring;
        } else {
            echo "No user found with username: $username";
        }

        // check pw of user
        $sqlPw = "SELECT pw FROM `users` WHERE username = '$username' AND pw = '$password';";

        $queryPw = mysqli_query($conn, $sqlPw);

        if ($queryPw != false) {

            $resultPw = mysqli_fetch_assoc($queryPw); // turn to assoc array
            // ['password'=>'arba123']

            if (!$resultPw) {
                echo "The password is incorrect!";
            }
        }
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