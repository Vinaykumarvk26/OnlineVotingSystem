<?php
include "header.php"; 
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['SESS_NAME'])!="") {
    header("Location: voter.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login for Voting</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: #35424a;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 0.5rem;
            color: #35424a;
        }
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        input[type="submit"] {
            background-color: #e8491d;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #35424a;
        }
        .error-message {
            color: #e8491d;
            text-align: center;
            margin-bottom: 1rem;
        }
        @media (max-width: 480px) {
            .container {
                width: 90%;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Login for Voting</h3>
        <?php 
        global $nam, $error;
        if ($error) echo "<p class='error-message'>" . htmlspecialchars($error) . "</p>";
        if ($nam) echo "<p>" . htmlspecialchars($nam) . "</p>";
        ?>
        <form action="login_action.php" method="post" id="myform">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" name="login" value="Login">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/validator/13.6.0/validator.min.js"></script>
    <script>
        document.getElementById('myform').addEventListener('submit', function(event) {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            
            if (username.trim() === '') {
                alert('Please Enter Username');
                event.preventDefault();
                return false;
            }
            
            if (username.length > 50) {
                alert('Username must be less than 50 characters');
                event.preventDefault();
                return 