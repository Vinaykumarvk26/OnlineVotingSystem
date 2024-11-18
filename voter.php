<?php
if(!isset($_SESSION)) { 
    session_start();
}
include "auth.php";
include "header_voter.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Vote</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        header {
            background: #35424a;
            color: #ffffff;
            padding: 1rem 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
        }
        nav ul {
            padding: 0;
            list-style: none;
        }
        nav ul li {
            display: inline;
            margin: 0 10px;
        }
        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }
        .welcome-message {
            font-size: 1.5rem;
            color: #35424a;
            margin-bottom: 1rem;
        }
        .page-title {
            color: #e8491d;
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
        }
        .vote-form {
            background-color: #f9f9f9;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        .vote-question {
            font-size: 1.5rem;
            color: #35424a;
            text-align: center;
            margin-bottom: 2rem;
        }
        .radio-group {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .radio-option {
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .radio-option:hover {
            background-color: #f0f0f0;
        }
        .radio-option input[type="radio"] {
            display: none;
        }
        .radio-label {
            position: relative;
            padding-left: 35px;
            font-size: 1.2rem;
            line-height: 25px;
            display: inline-block;
            color: #35424a;
        }
        .radio-label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 20px;
            border: 2px solid #35424a;
            border-radius: 50%;
            background: #fff;
        }
        .radio-option input[type="radio"]:checked + .radio-label:after {
            content: '';
            position: absolute;
            left: 5px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #e8491d;
        }
        .submit-vote {
            display: block;
            width: 200px;
            margin: 2rem auto 0;
            padding: 10px;
            background-color: #e8491d;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .submit-vote:hover {
            background-color: #35424a;
        }
        .success-message,
        .error-message {
            text-align: center;
            padding: 10px;
            margin-top: 1rem;
            border-radius: 5px;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 1rem;
            }
            .vote-form {
                padding: 1rem;
            }
            .radio-label {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="welcome-message">Welcome, <?php echo htmlspecialchars($_SESSION['SESS_NAME']); ?></h1>
        <h2 class="page-title">Make a Vote</h2>
        <form action="submit_vote.php" name="vote" method="post" id="myform" class="vote-form">
            <h3 class="vote-question">What is your favorite political party?</h3>
            <div class="radio-group">
                <label class="radio-option">
                    <input type="radio" name="lan" value="BJP">
                    <span class="radio-label">BJP</span>
                </label>
                <label class="radio-option">
                    <input type="radio" name="lan" value="CONGRESS">
                    <span class="radio-label">CONGRESS</span>
                </label>
                <label class="radio-option">
                    <input type="radio" name="lan" value="AAP">
                    <span class="radio-label">AAP</span>
                </label>
                <label class="radio-option">
                    <input type="radio" name="lan" value="NOTA">
                    <span class="radio-label">NOTA</span>
                </label>
                <label class="radio-option">
                    <input type="radio" name="lan" value="NIRDLIY">
                    <span class="radio-label">NIRDLIY</span>
                </label>
            </div>
            <?php 
            global $msg, $error;
            if ($msg) echo "<p class='success-message'>$msg</p>";
            if ($error) echo "<p class='error-message'>$error</p>";
            ?>
            <button type="submit" name="submit" class="submit-vote">Submit Vote</button>
        </form>
    </div>
</body>
</html>