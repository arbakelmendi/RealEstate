<?php
require_once 'Database.php';

class Admin {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUsers() {
        $stmt = $this->pdo->query("SELECT id, username, status FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalUsers() {
        $stmt = $this->pdo->query("SELECT COUNT(*) AS total_users FROM users");
        return $stmt->fetchColumn();
    }

    public function getTotalProperties() {
        $stmt = $this->pdo->query("SELECT COUNT(*) AS total_properties FROM properties");
        return $stmt->fetchColumn();
    }

    public function getTotalMessages() {
        $stmt = $this->pdo->query("SELECT COUNT(*) AS total_messages FROM contactus");
        return $stmt->fetchColumn();
    }
}
?>