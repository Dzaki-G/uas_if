<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['alert'])) {
    echo "<script>alert('" . $_SESSION['alert'] . "');</script>";
    unset($_SESSION['alert']); // Hapus alert setelah ditampilkan
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
            color: #fff; /* White text */
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
            background-color: #1a1a1a; /* Dark grey background for the form */
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.5); /* Subtle red glow */
            max-width: 400px;
            margin: 30px auto;
            border: 1px solid #333; /* Grey border for depth */
        }

        input[type="text"],
        input[type="password"] {
            background-color: #2a2a2a; /* Dark grey for input fields */
            color: #fff;
            border: 1px solid #444; /* Slightly lighter grey border */
            border-radius: 8px;
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
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
            background-color: #d14040; /* Darker red on hover */
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

        /* Centering the entire content vertically and horizontally */
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
<h2>Login</h2>
<form id="loginForm" action="/UAS_IF/login" method="POST">
    <input type="text" id="username" name="username" placeholder="Username" required>
    <div id="usernameError" class="error-message"></div>
    
    <input type="text" id="email" name="email" placeholder="Email" required>
    <div id="emailError" class="error-message"></div>
    
    <input type="password" id="password" name="password" placeholder="Password" required>
    <div id="passwordError" class="error-message"></div>
    
    <button type="submit">Login</button>
</form>
<a href="/UAS_IF/register" class="btn btn-primary">Go to Register</a>

<style>
    .error-message {
        color: #ff4c4c; /* Futuristic red for error messages */
        font-size: 14px;
        margin-top: 5px;
    }
</style>

<script>
    document.getElementById('username').addEventListener('input', function () {
        const errorDiv = document.getElementById('usernameError');
        if (this.value.trim() === '') {
            errorDiv.textContent = 'Name is required';
        } else {
            errorDiv.textContent = '';
        }
    });

    document.getElementById('email').addEventListener('input', function () {
        const errorDiv = document.getElementById('emailError');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (this.value.trim() === '') {
            errorDiv.textContent = 'Email is required';
        } else if (!emailRegex.test(this.value)) {
            errorDiv.textContent = 'Invalid email format';
        } else {
            errorDiv.textContent = '';
        }
    });

    document.getElementById('password').addEventListener('input', function () {
        const errorDiv = document.getElementById('passwordError');
        if (this.value.trim() === '') {
            errorDiv.textContent = 'Password is required';
        } else if (this.value.trim().length < 2) {
            errorDiv.textContent = 'Password must be at least 2 characters';
        } else {
            errorDiv.textContent = '';
        }
    });

    document.getElementById('loginForm').addEventListener('submit', function (event) {
        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        
        let valid = true;

        if (username === '') {
            document.getElementById('usernameError').textContent = 'Name is required';
            valid = false;
        }
        if (email === '' || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            document.getElementById('emailError').textContent = email === '' ? 'Email is required' : 'Invalid email format';
            valid = false;
        }
        if (password === '' || password.length < 2) {
            document.getElementById('passwordError').textContent = password === '' ? 'Password is required' : 'Password must be at least 2 characters';
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
</script>
</html>