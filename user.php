<?php


require_once 'Database.php';

class User {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function isAdmin() {
        return isset($_SESSION['status']) && $_SESSION['status'] === 'admin';
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

    public function deleteUserById($userId) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT username, status FROM users WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $username, $status) {
        $stmt = $this->pdo->prepare("UPDATE users SET username = ?, status = ? WHERE id = ?");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $status);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Update user error: " . $e->getMessage());
            return false;
        }
    }

    
}
?>
