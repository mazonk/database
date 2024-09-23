<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include 'db.php';

// Fetch all users from the database
$sql = "SELECT * FROM users";
$stmt = $con->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
</head>
<body>
    <h1>User Entries</h1>
    <a href="create.php" class="button">Add New User</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Rankie</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
            <td><?php echo htmlspecialchars($user['fname']); ?></td>
            <td><?php echo htmlspecialchars($user['lname']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['rankie']); ?></td>
            <td><?php echo htmlspecialchars($user['description']); ?></td>
            <td>
    <a href="edit.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="button">Edit</a>
    <a href="delete.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="button" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
</td>
        </tr>
        <?php endforeach; ?>
        </table>
        <a href="logout.php" class="button" style="margin-top: 40px;">Logout</a></body>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #123A6B; /* Dark blue background */
        color: #D2B37C; /* Secondary text color */
        margin: 0;
        padding: 20px;
        text-align: center; /* Center align text */
    }

    h1 {
        color: #B08145; /* Accent color for headings */
        margin-bottom: 20px; /* Spacing below the heading */
    }

    a.button {
        margin: 5px 5px; /* Add spacing around buttons */
        display: inline-block; /* Make it behave like a button */
        padding: 10px 15px;
        background-color: #123A6B; /* Button background color */
        color: white; /* Button text color */
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        user-select: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow */
    }

    a.button:hover {
        background-color: #B08145; /* Color on hover */
        transform: scale(1.05); /* Slightly enlarge on hover */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #192233; /* Table background color */
        border-radius: 10px; /* Rounded edges */
        overflow: hidden; /* Ensures rounded corners are visible */
        margin-left: auto; /* Center the table */
        margin-right: auto; /* Center the table */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow */
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #B08145; /* Border color */
    }

    th {
        background-color: #B08145; /* Header background color */
        color: white; /* Header text color */
    }

    tr:hover {
        background-color: #20548E; /* Row hover color */
    }
</style>
