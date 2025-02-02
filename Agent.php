<?php
class Agent {
    private $conn;
    private $table = "agents";

    public $id;
    public $name;
    public $email;
    public $role;
    public $image;

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function createAgent() {
        $query = "INSERT INTO " . $this->table . " (emri, email, role, image) 
                  VALUES (:name, :email, :role, :image)";

        $stmt = $this->conn->prepare($query);

        
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->image = htmlspecialchars(strip_tags($this->image));

        
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':image', $this->image);

        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    
    public function getAgents() {
        $query = "SELECT id, emri AS name, email, role, image FROM " . $this->table;

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            die("Error fetching agents: " . $e->getMessage());
        }
    }

   
    public function updateAgent() {
        $query = "UPDATE " . $this->table . " 
                  SET emri = :name, email = :email, role = :role, image = :image 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->image = htmlspecialchars(strip_tags($this->image));

       
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':image', $this->image);

       
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    
    public function deleteAgent() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

       
        $this->id = htmlspecialchars(strip_tags($this->id));

       
        $stmt->bindParam(':id', $this->id);

        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>

