<?php
session_start();
require_once 'vendor/autoload.php'; // Include the Composer autoloader

use DiscordWebhooks\Embed;

// Check if the user is authenticated and has a valid token
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated'] || !isset($_SESSION['token'])) {
    // Redirect to login page if not authenticated
    logToDiscord("Unauthorized access attempt to index.php");
    header('Location: login.php');
    exit();
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

// Continue with the rest of your index.php code here
// ...

?>

<!-- Rest of your HTML and index content -->

<?php
function logToDiscord($message) {
    $webhookUrl = 'https://discord.com/api/webhooks/1180407503973007360/-9__bwR6BrTVEj2gP61U06Lewg-gASMWkf9lZyEM-55CgaLlkOh6bvWGUsqwu_OSGmee'; // Replace with your actual Discord webhook URL

    $embed = new Embed();
    $embed->title('User Action Log')
        ->color(0x4287f5) // Change the color as needed
        ->description($message)
        ->timestamp();

    $data = [
        'embeds' => [$embed->toArray()],
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
    <link rel="stylesheet" href="style.css">
    <title>User Data Form</title>
</head>
<body>
    <div class="container">
        <form action="save_data.php" method="post">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>

            <label for="callSign">Call Sign:</label>
            <input type="text" id="callSign" name="callSign" required>

            <button type="submit">Save Data</button>
        </form>

        <form action="view_data.php" method="get">
            <button type="submit" id="viewDataBtn">View Saved Data</button>
        </form>

        <div id="userDataDisplay"></div>
    </div>
</body>
</html>
