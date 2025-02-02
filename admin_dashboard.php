<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

require_once 'Database.php';
require_once 'Admin.php';
require_once 'User.php'; // Make sure the User class is included

if (!isset($_SESSION['username']) || $_SESSION['status'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$db = new Database();
$admin = new Admin($db->getConnection());
$user = new User($db->getConnection());

// Get the ID of the currently logged-in admin (the one creating the user)
$admin_id = $_SESSION['user_id'];  // Assuming 'user_id' is stored in session

// Get statistics for the dashboard
$users = $admin->getUsers();
$totalUsers = $admin->getTotalUsers();
$totalProperties = $admin->getTotalProperties();
$totalMessages = $admin->getTotalMessages();

// Handle form submission for creating a new user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'], $_POST['status'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Call the createUser method with created_by as admin_id
    if ($user->createUser($username, $hashedPassword, $status, $admin_id)) {
        echo "User created successfully!";
    } else {
        echo "Error creating user.";
    }
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
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <h1>Welcome, Admin!</h1>

    <h2>Create New User</h2>
    <form method="POST" action="admin_dashboard.php">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <label>Status:</label>
        <select name="status">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <button type="submit">Create User</button>
    </form>

    <div class="dashboard">
        <h2>Statistics</h2>
        <div class="stats">
            <h3>Total Users: <?= $totalUsers ?></h3>
            <h3>Total Properties: <?= $totalProperties ?></h3>
            <h3>Total Messages: <?= $totalMessages ?></h3>
        </div>

        <h2>Manage Users</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['status'] ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $user['id'] ?>">Edit</a> |
                        <a href="delete_user.php?id=<?= $user['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
