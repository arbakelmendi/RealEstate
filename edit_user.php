<?php
session_start();


if (!isset($_SESSION['username']) || $_SESSION['status'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require_once 'Database.php';
require_once 'User.php';

$db = new Database();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $status = $_POST['status'];

    if ($user->updateUser($id, $username, $status)) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error updating user.";
    }
} else {
    $id = $_GET['id'];
    $userData = $user->getUserById($id);

    if (!$userData) {
        echo "User not found.";
        exit;
    }

    $username = $userData['username'];
    $status = $userData['status'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST" action="edit_user.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <label>Username:</label>
        <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" required>
        <label>Status:</label>
        <select name="status">
            <option value="admin" <?= $status === 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="user" <?= $status === 'user' ? 'selected' : '' ?>>User</option>
        </select>
        <button type="submit">Update</button>
    </form>
</body>
</html>