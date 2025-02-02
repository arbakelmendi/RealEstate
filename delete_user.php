<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['status'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require_once 'User.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = intval($_GET['id']);
    $user = new User();

    if ($user->deleteUserById($userId)) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user.";
    }

    header("Location: admin_dashboard.php");
    exit;
} else {
    echo "Invalid request.";
}
?>
