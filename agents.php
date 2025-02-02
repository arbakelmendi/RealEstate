<?php

class Database {
    private $host = 'localhost';
    private $dbname = 'web_project';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error connecting to database: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

class Item {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllItems() {
        $stmt = $this->pdo->query("SELECT * FROM items");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addItem($name, $description) {
        $sql = "INSERT INTO items (name, description) VALUES (:name, :description)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'description' => $description]);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic PHP Project</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Item List</h1>
    <form action="insert.php" method="POST">
        <input type="text" name="name" placeholder="Item Name" required>
        <input type="text" name="description" placeholder="Description" required>
        <button type="submit">Add Item</button>
    </form>

    <h2>All Items:</h2>
    <ul>
        <?php
        require 'Database.php';
        $db = new Database();
        $item = new Item($db->getConnection());
        $items = $item->getAllItems();

        foreach ($items as $row) {
            echo "<li>" . htmlspecialchars($row['name']) . ": " . htmlspecialchars($row['description']) . "</li>";
        }
        ?>
    </ul>
</body>
</html>


<?php
require 'Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $db = new Database();
    $item = new Item($db->getConnection());
    $item->addItem($name, $description);

    header('Location: index.php');
}
?>

/* styles.css */
body {
    font-family: Arial, sans-serif;
    padding: 20px;
    max-width: 600px;
    margin: auto;
}
input {
    margin: 5px;
    padding: 8px;
    width: calc(100% - 16px);
}
button {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
}
button:hover {
    background-color: #0056b3;
}
