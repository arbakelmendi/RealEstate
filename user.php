<?php
require_once 'Database.php';

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function authenticate($username, $password) {
        $stmt = $this->pdo->prepare("SELECT pw, status FROM users WHERE username = ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['pw'])) {
            return $user;
        }
        return false;
    }

    public function register($username, $password, $status = 'user') {
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "Username already exists. <a href='login.php' style='color: blue; text-decoration: underline;'>Click here to login</a>";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("INSERT INTO users (username, pw, status) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $hashedPassword);
        $stmt->bindParam(3, $status);

        if ($stmt->execute()) {
            return "<span style='color: green;'>Registration successful! <a href='login.php' style='color: blue; text-decoration: underline;'>Click here to login</a></span>";
        } else {
            return "Registration failed. Please try again.";
        }
    }
}
?>
