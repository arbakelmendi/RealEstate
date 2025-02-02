<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent</title>
    <link rel="stylesheet" href="styles/andi.css">
</head>

<body>

    <div class="banner">
        <div class="navbar">
            <img src="img/logo.png" class="logo">
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="agents.php">Agents</a></li>
                <li><a href="contactUs.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>
        </div>
      
    <div class="container">



        <div class="main-content">

            <div class="agents">
                <div class="agent-card">
                    <img src="./img/logo.png.webp" alt="Agent Logo">
                    <div class="agent-details">
                        <h3>Elmedina Menxhiqi</h3>
                        <p>Agent</p>
                        <p>ElmedinaMenxhiqi@gmail.com</p>
                        <a href="#">View Listings</a>
                    </div>
                </div>
                <div class="agent-card">
                    <img src="./img/logo.png.webp" alt="Agent Logo">
                    <div class="agent-details">
                        <h3>Olis Osmani</h3>
                        <p>Agent</p>
                        <p>OlisOsmani2005@gmail.com</p>
                        <a href="#">View Listings</a>
                    </div>
                </div>
                <div class="agent-card">
                    <img src="./img/logo.png.webp" alt="Agent Logo">
                    <div class="agent-details">
                        <h3>Andi Dragusha</h3>
                        <p>Agent</p>
                        <p>Andidragusha541@gmail.com</p>
                        <a href="#">View Listings</a>
                    </div>
                </div>
                <div class="agent-card">
                    <img src="./img/logo.png.webp" alt="Agent Logo">
                    <div class="agent-details">
                        <h3>Arba Kelmendi</h3>
                        <p>Agent</p>
                        <p>Arbakelmendi@gmail.com</p>
                        <a href="#">View Listings</a>
                    </div>
                </div>
            </div>


            <div class="sidebar">

                <div class="find-agent">
                    <h3>Find Agent</h3>
                    <input type="text" placeholder="Enter agent name">
                    <select>
                        <option>All Categories</option>
                    </select>
                    <select>
                        <option>All Cities</option>
                    </select>
                    <button>Search Agent</button>
                </div>

                <div class="recent-viewed">
                    <h3>Recent Viewed</h3>
                    <div class="listing">
                        <img src="./img/banesa.jpg">
                        <p>BANESE ME QIRA NE DARDANI</p>
                        <p>$450</p>
                    </div>
                    <div class="listing">
                        <img src="./img/banesa2.jpg">
                        <p>BANESE ME QIRA NE ULPIAN</p>
                        <p>$530</p>
                    </div>
                    <div class="listing">
                        <img src="./img/banesa3.jpeg">
                        <p>BANESE ME QIRA NE PEJTON </p>
                        <p>$400</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>