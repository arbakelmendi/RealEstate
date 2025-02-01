<?php
session_start();

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['username']) || $_SESSION['status'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = intval($_GET['id']); 

    
    $servername = "127.0.0.1";
    $usernameDB = "root";
    $passwordDB = "";
    $db = "RealEstate";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user.";
    }

    $stmt->close();
    $conn->close();

    header("Location: admin_dashboard.php");
    exit;
} else {
    echo "Invalid request.";
}
?>
