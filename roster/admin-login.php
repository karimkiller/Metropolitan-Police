<?php
// admin-login.php

session_start();

// Check if the admin is already authenticated
if (isset($_SESSION['admin']) && $_SESSION['admin']) {
    header('Location: admin-page.php');
    exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Dummy admin credentials (replace with your authentication logic)
    $adminUsername = 'karimkiller';
    $adminPassword = 'Killerlands22#';

    // Check if the entered credentials match the admin credentials
    if ($username === $adminUsername && $password === $adminPassword) {
        $_SESSION['admin'] = true; // Set admin session variable
        header('Location: admin-page.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Include your stylesheet if needed -->
    <title>Admin Login</title>
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

        .login-container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>

        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
