<?php
if (isset($_SESSION['alert'])) {
    $message = $_SESSION['alert'];
    echo "<script>
        alert('$message');
    </script>";
    unset($_SESSION['alert']); // Hapus pesan setelah ditampilkan
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
        /* Red, black, and grey futuristic theme */
        body {
            background-color: #000; /* Black background */
            color: #fff; /* White text for contrast */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #ff4c4c; /* Futuristic red for headings */
            text-align: center;
            margin-top: 20px;
        }

        form {
            background-color: #1a1a1a; /* Dark grey form background */
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.5); /* Subtle red shadow */
            max-width: 400px;
            margin: 30px auto;
            border: 1px solid #333; /* Grey border for subtle depth */
        }

        label {
            font-weight: bold;
            color: #ff4c4c; /* Red for labels */
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="checkbox"] {
            background-color: #2a2a2a; /* Dark grey input fields */
            color: #fff;
            border: 1px solid #444; /* Slightly lighter grey border */
            border-radius: 8px;
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
        }

        input[type="checkbox"] {
            width: auto;
        }

        button {
            background-color: #ff4c4c; /* Vibrant red for buttons */
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #d14040; /* Slightly darker red on hover */
        }

        .btn-primary {
            background-color: #444; /* Grey for navigation buttons */
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            text-align: center;
            width: 150px;
            margin: 20px auto;
        }

        .btn-primary:hover {
            background-color: #ff4c4c; /* Red hover effect */
        }

        a {
            text-decoration: none;
        }

        /* Center alignment for overall layout */
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>

</head>
<body>
    <h2>Register</h2>
    
    <form action="/UAS_IF/register" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <label for="terms">
        <input type="checkbox" name="terms" required> I agree to the terms and conditions
        </label><br>
        <button type="submit">Register</button>
    </form>
    <a href="/UAS_IF/login" class="btn btn-primary">Go to Login</a>
</body>
</html>