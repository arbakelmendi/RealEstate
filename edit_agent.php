<?php
require_once 'Database.php';
require_once 'Agent.php';

$database = new Database();
$db = $database->getConnection();

$agent = new Agent($db);


if (isset($_GET['id'])) {
    $agent->id = $_GET['id'];

    $query = "SELECT id, emri AS name, email, role, image FROM agents WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $agent->id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        die("Agent not found.");
    }
    $agent->name = $data['name'];
    $agent->email = $data['email'];
    $agent->role = $data['role'];
    $agent->image = $data['image'];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agent->id = $_POST['id'];
    $agent->name = $_POST['name'];
    $agent->email = $_POST['email'];
    $agent->role = $_POST['role'];
    $agent->image = $_POST['image'];

    if ($agent->updateAgent()) {
        
        header("Location: agent_dashboard.php");
        exit;
    } else {
        echo "<p>Error updating agent.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Agent</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
            background-color: #f9f9f9;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Agent</h1>

   
    
    <form method="POST" action="edit_agent.php">
        <input type="hidden" name="id" value="<?php echo $agent->id; ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $agent->name; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $agent->email; ?>" required><br>

        <label for="role">Role:</label>
        <input type="text" name="role" id="role" value="<?php echo $agent->role; ?>" required><br>

        <label for="image">Image Filename:</label>
        <input type="text" name="image" id="image" value="<?php echo $agent->image; ?>"><br>

        <button type="submit">Save Changes</button>
    </form>
</div>

</body>
</html>

