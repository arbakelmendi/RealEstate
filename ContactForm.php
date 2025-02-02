<?php
class ContactForm {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function submitForm($name, $surname, $email, $message) {
        if (empty($name) || empty($surname) || empty($email)) {
            return "All fields are required.";
        }

        $stmt = $this->pdo->prepare("INSERT INTO users (name, surname, username, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $surname, $email, $message]);

        return "Your message has been sent successfully.";
    }

    public function getAllMessages() {
        $stmt = $this->pdo->query("SELECT * FROM contactus");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>