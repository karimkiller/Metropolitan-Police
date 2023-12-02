<?php
// sign-up.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process signup form submission

    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validate the form data
    if (empty($username) || empty($password)) {
        $error = 'Username and password are required';
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Database connection details
        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'user_authentication';

        // Create a database connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement to insert user data
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            // Redirect to login page after successful signup
            header('Location: login.php');
            exit();
        } else {
            $error = 'Error during signup. Please try again.';
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!-- The rest of the HTML and styling remains the same as the previous example -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Include your stylesheet if needed -->
    <style>
       body {
    font-family: 'Arial', sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.container {
    max-width: 400px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.signup-form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
}

input {
    padding: 10px;
    margin-bottom: 16px;
}

button {
    background-color: #4287f5;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #3366cc;
}

.error-message {
    color: #ff0000;
    margin-bottom: 16px;
}
    </style>
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>

    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Sign Up</button>
    </form>

    <a href="login.php">Already have an account? Log in here</a>
</body>
</html>
