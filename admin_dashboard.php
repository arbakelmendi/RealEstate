<?php
session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

require_once 'Database.php';
require_once 'Admin.php';
require_once 'User.php'; 
require_once 'ContactForm.php';

if (!isset($_SESSION['username']) || $_SESSION['status'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$db = new Database();
$admin = new Admin($db->getConnection());
$user = new User($db->getConnection());
$ContactForm = new ContactForm($db->getConnection());
$messages = $ContactForm->getAllMessages();




$users = $admin->getUsers();
$totalUsers = $admin->getTotalUsers();
$totalProperties = $admin->getTotalProperties();
//$totalMessages = $admin->getTotalMessages();
$messages = $ContactForm->getAllMessages();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'], $_POST['status'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
     

   
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

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
            <li><a href="main.php">Home</a></li>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <h1>Welcome, Admin!</h1>


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

        <h2>Messages from Users</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
            <?php foreach ($messages as $message): ?>
                <tr>
                    <td><?= $message['id'] ?></td>
                    <td><?= $message['name'] ?></td>
                    <td><?= $message['surname'] ?></td>
                    <td><?= $message['email'] ?></td>
                    <td><?= $message['message'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</body>
</html>
