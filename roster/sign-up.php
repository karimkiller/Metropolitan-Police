<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($username) || empty($password)) {
        $error = 'Username and password are required';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'user_authentication';

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            $_SESSION['signup_success'] = true;
            header('Location: login.php');
            exit();
        } else {
            $error = 'Error during signup. Please try again.';
        }

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
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form class="signup-form" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Sign Up</button>
        </form>

        <a href="login.php">Already have an account? Log in here</a>

        <?php
        if (isset($_SESSION['signup_success']) && $_SESSION['signup_success'] === true) {
            echo '<p class="success">Sign up successful! You can now log in.</p>';
            unset($_SESSION['signup_success']);
        }
        ?>
    </div>
</body>
</html>
