<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['status'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$servername = "127.0.0.1";
$usernameDB = "root";
$passwordDB = "";
$db = "RealEstate";

$conn = new mysqli($servername, $usernameDB, $passwordDB, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE users SET username = ?, status = ? WHERE id = ?");
    $stmt->bind_param("ssi", $username, $status, $id);

    if ($stmt->execute()) {
        echo "User updated successfully!";
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error updating user: " . $conn->error;
    }

    $stmt->close();
} else {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT username, status FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($username, $status);
    $stmt->fetch();

    $stmt->close();
}

$conn->close();
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
