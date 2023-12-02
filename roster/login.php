<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php'; // Include the Composer autoloader

use Maknz\Slack\Client;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate username and password (replace with secure validation)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // For demonstration purposes, check against hard-coded values
    if ($username === 'karimkiller' && $password === 'Sandler22') {
        $_SESSION['authenticated'] = true;
        $_SESSION['start_time'] = time(); // Record the login time
        $_SESSION['token'] = bin2hex(random_bytes(32)); // Generate a secure token
        $_SESSION['username'] = $username; // Save the username
        logToDiscord("User logged in: $username");
        header('Location: index.php');
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}

// Check session timeout
if (isset($_SESSION['start_time']) && (time() - $_SESSION['start_time'] > 20)) {
    // If more than 20 seconds have passed, destroy the session and redirect to login
    session_regenerate_id(true); // Regenerate session ID for security
    session_unset();
    session_destroy();
    logToDiscord("Session expired for user: $username");
    header('Location: login.php');
    exit();
}

function logToDiscord($message) {
    $webhookUrl = 'https://discord.com/api/webhooks/1180407503973007360/-9__bwR6BrTVEj2gP61U06Lewg-gASMWkf9lZyEM-55CgaLlkOh6bvWGUsqwu_OSGmee'; // Replace with your actual Discord webhook URL

    $embed = [
        'title' => 'User Action Log',
        'color' => hexdec('4287f5'), // Change the color as needed
        'description' => $message,
        'timestamp' => date('c'),
    ];
    $data = [
        'embeds' => [$embed],
    ];

    $options = [
        'http' => [
            'header' => 'Content-Type: application/json',
            'method' => 'POST',
            'content' => json_encode($data),
        ],
    ];

    $context = stream_context_create($options);
    file_get_contents($webhookUrl, false, $context);
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
        font-family: 'Arial', sans-serif;
        background-color: #f0f0f0;
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
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-top: 10px;
        color: #555;
    }

    input {
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }

    button, .signup-btn {
        padding: 12px;
        background-color: #4287f5;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 20px;
        width: 100%;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .signup-btn {
        background-color: #4caf50;
    }

    .admin-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        background-color: #333;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover, .signup-btn:hover, .admin-btn:hover {
        background-color: #2c5da5;
    }
    </style>
</head>
<body>
    <a class="admin-btn" href="admin-login.php">Admin</a>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <a class="signup-btn" href="sign-up.php">Sign Up</a>
    </div>
</body>
</html>
