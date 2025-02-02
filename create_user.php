<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['status'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require_once 'User.php';
require_once 'Database.php';

$db = new Database();
$user = new User($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

   
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if ($user->createUser($username, $hashedPassword, $status)) {
        echo "User created successfully!";
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
        exit;
    } else {
        echo "Error creating user.";
    }
}
