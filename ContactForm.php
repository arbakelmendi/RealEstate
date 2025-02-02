<?php

class ContactForm {
    private $conn;

    public function __construct($servername, $username, $password, $db) {
        $this->conn = new mysqli($servername, $username, $password, $db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function submitForm($name, $surname, $email, $message) {
        if (empty($name) || empty($surname) || empty($email)) {
            return "All fields are required.";
        }

        $stmt = $this->conn->prepare("INSERT INTO users (name, surname, username, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $surname, $email, $message);

        if ($stmt->execute()) {
            return "Your message has been sent successfully.";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>