<?php
require_once 'Database.php';
require_once 'Agent.php';

$database = new Database();
$db = $database->getConnection();
$agent = new Agent($db);


$message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $agent->name = trim($_POST['name']);
    $agent->email = trim($_POST['email']);
    $agent->role = trim($_POST['role']);
    $agent->image = trim($_POST['image']);

    if (!empty($agent->name) && !empty($agent->email) && !empty($agent->role)) {
        if ($agent->createAgent()) {
            $message = "Agent created successfully!";
        } else {
            $message = "Error creating agent.";
        }
    } else {
        $message = "Please fill in all required fields.";
    }
}


if (isset($_GET['delete_id'])) {
    $agent->id = $_GET['delete_id'];

    if ($agent->deleteAgent()) {
        $message = "Agent deleted successfully!";
    } else {
        $message = "Error deleting agent.";
    }
}


$result = $agent->getAgents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            margin: 30px 0;
        }

        .message {
            color: green;
            text-align: center;
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            width: 80%;
            max-width: 600px;
        }

        form label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
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

        form button:hover {
            background-color: #0056b3;
        }

        table {
            width: 80%;
            max-width: 900px;
            margin: 20px 0;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .action-btn {
            padding: 6px 12px;
            margin-right: 5px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9em;
            transition: background-color 0.3s;
        }

        .action-btn.edit {
            background-color: #28a745;
        }

        .action-btn.edit:hover {
            background-color: #218838;
        }

        .action-btn.delete {
            background-color: #dc3545;
        }

        .action-btn.delete:hover {
            background-color: #c82333;
        }

        img {
            border-radius: 5px;
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            form, table {
                width: 95%;
            }
        }
        
      

        .navbar {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            display: inline;
            margin-right: 20px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<div class="navbar">
        <ul>
            <li><a href="main.php">Home</a></li>
            <li><a href="admin_dashboard.php">User Dashboard</a></li>
            <li><a href="agent_dashboard.php">Agent Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
<body>

<h1>Agent Dashboard</h1>


<?php if (!empty($message)) echo "<p class='message'>{$message}</p>"; ?>


<h2>Create Agent</h2>
<form method="POST">
    <label>Name:</label> <input type="text" name="name" required><br>
    <label>Email:</label> <input type="email" name="email" required><br>
    <label>Role:</label> <input type="text" name="role" required><br>
    <label>Image Path:</label> <input type="text" name="image"><br>
    <button type="submit" name="create">Create Agent</button>
</form>


<h2>Agents List</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['role'] ?></td>
                <td><img src="./img/<?= $row['image'] ?>" alt="Agent Image"></td>
                <td>
                    <a class="action-btn edit" href="edit_agent.php?id=<?= $row['id'] ?>">Edit</a>
                    <a class="action-btn delete" href="agent_dashboard.php?delete_id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this agent?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>

