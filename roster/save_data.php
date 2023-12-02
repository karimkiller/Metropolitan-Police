<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php'; // Include the Composer autoloader

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_data_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$callSign = $_POST["callSign"];

// Check for duplicates before saving the data
$checkDuplicateSql = "SELECT * FROM user_data WHERE first_name = '$firstName' AND last_name = '$lastName'";
$checkDuplicateResult = $conn->query($checkDuplicateSql);

if ($checkDuplicateResult->num_rows > 0) {
    $message = "Error: Name already exists in the database.";
    $messageClass = "error";

    // Redirect to index.php after displaying the error message
    echo '<script>
            setTimeout(function(){
                window.location.href = "index.php";
            }, 5000);
          </script>';
} else {
    // Insert data into the database
    $insertSql = "INSERT INTO user_data (first_name, last_name, call_sign) VALUES ('$firstName', '$lastName', '$callSign')";

    if ($conn->query($insertSql) === TRUE) {
        $message = "Data saved successfully!";
        $messageClass = "success";

        // Log the user's input to Discord
        $discordMessage = "User submitted data:\nFirst Name: $firstName\nLast Name: $lastName\nCall Sign: $callSign";
        logToDiscord($discordMessage);

        // Redirect to view_data.php after 5 seconds
        echo '<script>
                setTimeout(function(){
                    window.location.href = "view_data.php";
                }, 5000);
              </script>';
    } else {
        $message = "Error: " . $insertSql . "<br>" . $conn->error;
        $messageClass = "error";
    }
}

$conn->close();

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

        .message-container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success {
            color: #4caf50;
        }

        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="message-container <?php echo $messageClass; ?>">
        <p><?php echo $message; ?></p>
    </div>
</body>
</html>
