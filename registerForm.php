<!DOCTYPE html>
<html lang="en">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];

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
    $sql = "SELECT username FROM `users` WHERE username = '".$_POST['Username']."'";
    $query = mysqli_query($conn, $sql); // sqlobject 
    $anything_found = mysqli_num_rows($query);

    if ($anything_found>0) {
        echo "This user exist!";
        return false;


       // $result = mysqli_fetch_assoc($query); // turn to assoc array
        // ['username' =>'Arba','password'=>'arba123','status'=>'user','id'=> 8724]

       /* if ($result) {
            // Access the 'username' field from the result
            $resultstring = $result['username'];
            echo "This user exist!";
            echo "</br>";
        } else {
            echo "This user exist!";
            // header('Location: login.php');
            return;
        }*/

       /* // check pw of user
        $sqlPw = "SELECT pw FROM `users` WHERE username = '$username' AND pw = '$password';";

        $queryPw = mysqli_query($conn, $sqlPw);

        if ($queryPw != false) {

            $resultPw = mysqli_fetch_assoc($queryPw); // turn to assoc array
            // ['password'=>'arba123']

            if (!$resultPw) {
                echo "The password is incorrect!";
            }


            //check the status of user
            $sqlS = "SELECT status FROM users WHERE username = '$username'";

            $queryS = mysqli_query($conn, $sqlS);

            $resultS = mysqli_fetch_assoc($queryS);


            if ($resultS['status'] == 'admin') {
                header('Location: admin_dashboard.php');
            } else if ($resultS['status'] == 'user') {
                header('Location: user_home.php');
            } else {
                echo "Incorrect password!";
            }
        } else {
            echo "User does not exist!";
        }*/
    }else{
        echo "success";
        return false;
    }
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
                <!--****** change all pages -->
                <li><a href="main.php">Home</a></li>
                <li><a href="#">About</a></li>
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
    <input type="text" id="Firstname" name="Firstname" placeholder="Enter your Firstname" required>
    <label for="lastname">
        Lastname:
    </label>
    <input type="text" id="Lastname" name="Lastname" placeholder="Enter your Lastname" required>
    <label for="username">
        Username:
    </label>
    <input type="text" id="username" name="Username" placeholder="Enter your Username" required>

    <label for="password">
        Password:
    </label>
    <input type="password" id="password" name="Password" placeholder="Enter your Password" required>

    <span class= "error">Username already exist. </span> 
    <span class= "success">Username can be assigned. </span> 

    <div class="wrap">
        <button type="submit">
            Sign Up
        </button>
    </div>
</form>


</div>
</body>

</html>