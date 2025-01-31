<?php
session_start();


if (!isset($_SESSION['username']) || $_SESSION['status'] !== 'admin') {
    header("Location: login.php");
    exit;
}


function getDbConnection() {
    $servername = "127.0.0.1";
    $usernameDB = "root";
    $passwordDB = "";
    $db = "RealEstate";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}


function getUsers() {
    $conn = getDbConnection();
    $query = "SELECT id, username, status FROM users";
    $result = $conn->query($query);
    
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    $conn->close();
    return $users;
}


function getTotalUsers() {
    $conn = getDbConnection();
    $query = "SELECT COUNT(*) AS total_users FROM users";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $conn->close();
    return $row['total_users'] ?? 0;
}


function getTotalProperties() {
    $conn = getDbConnection();
    $query = "SELECT COUNT(*) AS total_properties FROM properties";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $conn->close();
    return $row['total_properties'] ?? 0;
}


function getTotalMessages() {
    $conn = getDbConnection();
    $query = "SELECT COUNT(*) AS total_messages FROM messages";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $conn->close();
    return $row['total_messages'] ?? 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Dashboard</title>
  
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            display: inline;
            margin-right: 20px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .dashboard {
            padding: 20px;
        }

        .stats {
            margin-top: 30px;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
        }

        .stats h3 {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <h1>Welcome, Admin!</h1>

    <div class="dashboard">
        <h2>Statistics</h2>
        <div class="stats">
            <h3>Total Users: <?php echo getTotalUsers(); ?></h3>
            <h3>Total Properties: <?php echo getTotalProperties(); ?></h3>
            <h3>Total Messages: <?php echo getTotalMessages(); ?></h3>
        </div>

        <h2>Manage Users</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php
            $users = getUsers();
            foreach ($users as $user) {
                echo "<tr>
                        <td>{$user['id']}</td>
                        <td>{$user['username']}</td>
                        <td>{$user['status']}</td>
                        <td><a href='edit_user.php?id={$user['id']}'>Edit</a> | <a href='delete_user.php?id={$user['id']}'>Delete</a></td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
