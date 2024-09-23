<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hashing the password

    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #123A6B; /* Dark blue background */
            color: #D2B37C; /* Secondary text color */
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #342217; /* Accent color for headings */
            margin-bottom: 20px;
        }

        form {
            background-color: #192233; /* Form background color */
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #D2B37C; /* Label color */
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            width: 100%;
            border: 1px solid #B08145; /* Border color */
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: #342217; /* Input background color */
            color: #D2B37C; /* Input text color */
        }

        input[type="submit"] {
            background-color: #20548E; /* Button background color */
            color: white; /* Button text color */
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #B08145; /* Color on hover */
        }

        p {
            color: red; /* Error message color */
        }

        form {
    background-color: #192233; /* Form background color */
    padding: 20px;
    border-radius: 10px;
    padding: 30px 30px;
    display: inline-block;
    max-width: 400px; /* Set a maximum width */
    margin: 20px auto; /* Center the form */
    width: 90%; /* Make it responsive */
}

    </style>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
