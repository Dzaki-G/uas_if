<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    $_SESSION['alert'] = "Anda bukan Admin.";
    header("Location: /UAS_IF/heroes");
    exit;
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>122140030 Dzaki</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Dark, red, and grey futuristic theme */
        body {
            background-color: #121212; /* Dark background */
            color: #fff; /* White text for contrast */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex; /* Enable flexbox for centering */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            min-height: 100vh; /* Full viewport height */
        }

        .title {
            font-family: 'Arial', sans-serif; /* Clean, modern font */
            font-size: 36px; /* Larger font size for emphasis */
            font-weight: bold; /* Bold text */
            color: #ff4c4c; /* Red color to match the futuristic theme */
            text-align: center; /* Center the text */
            margin-top: 20px; /* Add space at the top */
            text-transform: uppercase; /* Uppercase letters for a bold look */
            letter-spacing: 2px; /* Slight spacing between letters for readability */
        }

        .container {
            max-width: 1200px;
            width: 100%;
            background-color: #1a1a1a; /* Dark grey for container */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5); /* Subtle shadow for depth */
        }

        .btn-primary {
            background-color: #444; /* Grey for buttons */
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #ff4c4c; /* Red on hover */
        }

        .btn-danger {
            background-color: #d14040; /* Dark red for logout */
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #ff4c4c; /* Red on hover */
        }

        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 15px;
            text-align: center;
        }

        table th {
            background-color: #333; /* Dark grey for table headers */
            color: #ff4c4c; /* Red for headers */
            font-weight: bold;
        }

        table td {
            background-color: #1a1a1a; /* Dark grey for table rows */
            color: #fff; /* White text */
            border-bottom: 1px solid #444; /* Grey borders between rows */
        }

        table tr:hover {
            background-color: #333; /* Slight hover effect for rows */
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="title">User List</h2>
    <a href="/UAS_IF/heroes" class="btn btn-primary">Heroes</a>
    <a href="/UAS_IF/logout" class="btn btn-danger">Logout</a>
    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Browser</th>
                <th>IP Address</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user->id); ?></td>
                    <td><?php echo htmlspecialchars($user->username); ?></td>
                    <td><?php echo htmlspecialchars($user->email); ?></td>
                    <td><?php echo htmlspecialchars($user->created_at); ?></td>
                    <td><?php echo htmlspecialchars($user->browser); ?></td>
                    <td><?php echo htmlspecialchars($user->ipAddress); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
