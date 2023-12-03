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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Include your stylesheet if needed -->
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>

        <form class="signup-form" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Sign Up</button>
        </form>

        <a href="login.php">Already have an account? Log in here</a>
    </div>
</body>
</html>
