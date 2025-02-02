<?php

require_once 'Database.php';
require_once 'Agent.php';


$database = new Database();
$db = $database->getConnection();

$agent = new Agent($db);
$result = $agent->getAgents();


$isAdmin = isset($_SESSION['status']) && $_SESSION['status'] === 'admin';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProRealEstate - Agents</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
       
        .navbar {
            background-color: #333;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            width: 100px;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .navbar ul li a:hover {
            background-color: #007bff;
        }

        
        .page-title {
            text-align: center;
            font-size: 2.5em;
            margin: 30px 0;
            color: #444;
        }

       
        .agent-container {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center;
            padding: 20px;
        }

        .agent-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .agent-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        .agent-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-top: 20px;
            margin-bottom: 15px;
            border: 2px solid #ddd;
        }

        .agent-details {
            padding: 15px;
            color: #666;
        }

        .agent-details h3 {
            margin: 0;
            font-size: 1.3em;
            color: #333;
        }

        .agent-details p {
            margin: 6px 0;
            font-size: 14px;
            line-height: 1.5;
        }

        @media (max-width: 768px) {
            .agent-container {
                flex-direction: column;
                align-items: center;
            }

            .agent-card {
                width: 90%;
            }

            .navbar ul {
                flex-direction: column;
                align-items: center;
            }

            .navbar ul li {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>


<div class="navbar">
    <img src="img/logo.png" class="logo">
    <ul> 
        <li><a href="main.php">Home</a></li>
        <li><a href="index.php">Agents</a></li>
        <li><a href="contactUs.php">Contact</a></li>
        <?php if ($isAdmin): ?>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
        <?php endif; ?>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>


<h1 class="page-title">Meet Our Agents</h1>


<div class="agent-container">
<?php
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "<div class='agent-card'>";
    echo "<img src='./img/{$image}' alt='{$name}' class='agent-image'>";
    echo "<div class='agent-details'>";
    echo "<h3>{$name}</h3>";
    echo "<p><strong>Role:</strong> {$role}</p>";
    echo "<p><strong>Email:</strong> {$email}</p>";
    echo "</div></div>";
}
?>
</div>

</body>
</html>

