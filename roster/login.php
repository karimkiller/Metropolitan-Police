<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

use Maknz\Slack\Client;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

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

    // Prepare and execute the SQL statement to check user credentials
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify password and log in if credentials are valid
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['authenticated'] = true;
        $_SESSION['start_time'] = time();
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['username'] = $username;
        logToDiscord("User logged in: $username");
        header('Location: index.php');
        exit();
    } else {
        $error = 'Invalid username or password.';
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

if (isset($_SESSION['start_time']) && (time() - $_SESSION['start_time'] > 20)) {
    session_regenerate_id(true);
    session_unset();
    session_destroy();
    logToDiscord("Session expired for user: $username");
    header('Location: login.php');
    exit();
}

function logToDiscord($message) {
    $webhookUrl = 'https://discord.com/api/webhooks/1180407503973007360/-9__bwR6BrTVEj2gP61U06Lewg-gASMWkf9lZyEM-55CgaLlkOh6bvWGUsqwu_OSGmee';

    $embed = [
        'title' => 'User Action Log',
        'color' => hexdec('4287f5'),
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
    <title>Metropolitan</title>
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
        transition: translateY(-10px);
    }
    </style>
</head>
<body>
    <a class="admin-btn" href="admin-login.php">Admin</a>
    <div class="login-container">
        <h2>Login To Metropolitan Roster</h2>
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
