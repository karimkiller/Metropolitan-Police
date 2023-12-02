<?php
// admin-page.php
session_start();

// Check if the admin is authenticated
if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header('Location: admin-login.php');
    exit();
}

// Dummy user data array (replace this with your database query)
$users = [
    ['id' => 1, 'username' => 'john_doe', 'approved' => true],
    ['id' => 2, 'username' => 'jane_doe', 'approved' => false],
    // Add more users as needed
];

// Process user approval/disapproval
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['approve'])) {
        // Handle user approval logic (e.g., update database)
        $userId = $_POST['approve'];
        // Replace the following with your database update query
        // Example: $sql = "UPDATE users SET approved = 1 WHERE id = $userId";
        // Execute your update query here

        // After updating, you might want to redirect to avoid resubmission
        header('Location: admin-page.php');
        exit();
    } elseif (isset($_POST['disapprove'])) {
        // Handle user disapproval logic (e.g., update database)
        $userId = $_POST['disapprove'];
        // Replace the following with your database update query
        // Example: $sql = "UPDATE users SET approved = 0 WHERE id = $userId";
        // Execute your update query here

        // After updating, you might want to redirect to avoid resubmission
        header('Location: admin-page.php');
        exit();
    }
}
?>

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
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        form {
            display: inline-block;
        }

        button {
            background-color: #4287f5;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #4287f5;
            text-decoration: none;
        }
    </style>
    <title>Admin Page</title>
</head>
<body>
    <h2>Welcome, Admin!</h2>

    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Approval Status</th>
            <th>Action</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['approved'] ? 'Approved' : 'Not Approved'; ?></td>
                <td>
                    <?php if (!$user['approved']): ?>
                        <form method="post">
                            <input type="hidden" name="approve" value="<?php echo $user['id']; ?>">
                            <button type="submit">Approve</button>
                        </form>
                    <?php else: ?>
                        <form method="post">
                            <input type="hidden" name="disapprove" value="<?php echo $user['id']; ?>">
                            <button type="submit">Disapprove</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="admin-logout.php">Logout</a> <!-- Include a logout link for the admin -->
</body>
</html>
