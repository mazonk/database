<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $rankie = $_POST['rankie'];
    $description = $_POST['description'];

    $sql = "UPDATE users SET username = :username, fname = :fname, lname = :lname, email = :email, rankie = :rankie, description = :description WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':rankie', $rankie);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location: index.php');
} else {
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #20548E; /* Background color */
            color: #D2B37C; /* Text color */
            margin: 0;
            padding: 20px;
            text-align: center; /* Center align text */
        }

        h1 {
            color: #D2B37C; /* Header color */
            margin-bottom: 20px; /* Spacing below the heading */
        }

        form {
            display: inline-block; /* Center the form */
            background-color: #192233; /* Form background */
            padding: 20px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5); /* Shadow for depth */
        }

        label {
            display: block; /* Labels as block elements */
            margin: 10px 0 5px; /* Margin for spacing */
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: calc(100% - 20px); /* Full width minus padding */
            padding: 10px;
            margin-bottom: 15px; /* Spacing below inputs */
            border: 1px solid #D2B37C; /* Border color */
            border-radius: 5px; /* Rounded edges */
            background-color: #342217; /* Input background color */
            color: white; /* Input text color */
        }

        input[type="submit"] {
            background-color: #B08145; /* Submit button color */
            color: white; /* Button text color */
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s; /* Transition for hover effect */
        }

        input[type="submit"]:hover {
            background-color: #20548E; /* Button hover color */
        }
    </style>
</head>
<body>
    <h1>Edit User</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        
        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" value="<?php echo htmlspecialchars($user['fname']); ?>" required>
        
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" value="<?php echo htmlspecialchars($user['lname']); ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        
        <label for="rankie">Rankie:</label>
        <input type="number" name="rankie" id="rankie" value="<?php echo htmlspecialchars($user['rankie']); ?>" required>
        
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?php echo htmlspecialchars($user['description']); ?>">
        
        <input type="submit" value="Update User">
    </form>
</body>
</html>
