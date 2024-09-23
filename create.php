<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $rankie = $_POST['rankie'];
    $description = $_POST['description'];

    $sql = "INSERT INTO users (username, fname, lname, email, rankie, description) VALUES (:username, :fname, :lname, :email, :rankie, :description)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':rankie', $rankie);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
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
            margin-bottom: 20px;
            background-color: #123A6B; /* Header background color */
            padding: 15px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Shadow */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Text shadow */
        }

        form {
            background-color: #192233; /* Form background color */
            padding: 20px;
            border-radius: 10px; /* Rounded edges */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Shadow */
            display: inline-block; /* Center form */
            margin-top: 20px;
        }

        label {
            display: block; /* Make labels block elements */
            margin: 10px 0 5px; /* Spacing for labels */
            text-align: left; /* Left align text */
        }

        input[type="text"], input[type="email"], input[type="number"] {
            width: calc(100% - 20px); /* Full width minus padding */
            padding: 10px; /* Padding inside inputs */
            margin-bottom: 15px; /* Space below inputs */
            border: 1px solid #B08145; /* Border color */
            border-radius: 5px; /* Rounded corners */
            background-color: #342217; /* Input background color */
            color: #D2B37C; /* Input text color */
        }

        input[type="submit"] {
            background-color: #B08145; /* Submit button color */
            color: white; /* Button text color */
            border: none; /* Remove border */
            padding: 10px 15px; /* Button padding */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer on hover */
            transition: background-color 0.3s; /* Transition for hover */
        }

        input[type="submit"]:hover {
            background-color: #20548E; /* Color on hover */
        }
    </style>
</head>
<body>
    <h1>Add New User</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        
        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" required>
        
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="rankie">Rankie:</label>
        <input type="number" name="rankie" id="rankie" required>
        
        <label for="description">Description:</label>
        <input type="text" name="description" id="description">
        
        <input type="submit" value="Add User">
    </form>
</body>
</html>
