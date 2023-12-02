<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_data_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    if ($_GET['action'] == 'edit') {
        // Redirect to the edit page with the selected ID
        header("Location: edit_data.php?id=" . $_GET['id']);
        exit();
    } elseif ($_GET['action'] == 'delete') {
        // Delete the record with the selected ID
        $deleteId = $_GET['id'];
        $deleteSql = "DELETE FROM user_data WHERE id = $deleteId LIMIT 1";

        if ($conn->query($deleteSql) === TRUE) {
            echo "<p>Record deleted successfully!</p>";

            // Redirect to the current page to avoid re-execution of code
            echo '<script>window.location.href = "view_data.php";</script>';
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

$sql = "SELECT id, first_name, last_name, call_sign FROM user_data";
$result = $conn->query($sql);

$dataRows = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dataRows[] = $row;
    }
}

$conn->close();
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

        .data-container {
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .edit-button, .delete-button {
            padding: 8px;
            margin: 4px;
            border: none;
            cursor: pointer;
        }

        .edit-button {
            background-color: #2196F3;
            color: #fff;
        }

        .delete-button {
            background-color: #f44336;
            color: #fff;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <a href="index.php" class="back-button">Back</a>

    <div class="data-container">
        <?php if (!empty($dataRows)): ?>
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Call Sign</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($dataRows as $row): ?>
                    <tr>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['call_sign']; ?></td>
                        <td>
                            <button class="edit-button" onclick="editRecord(<?php echo $row['id']; ?>)">Edit</button>
                            <button class="delete-button" onclick="deleteRecord(<?php echo $row['id']; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No data found</p>
        <?php endif; ?>
    </div>

    <script>
        function editRecord(id) {
            window.location.href = "edit_data.php?id=" + id;
        }

        function deleteRecord(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = "view_data.php?action=delete&id=" + id;
            }
        }
    </script>
</body>
</html>

