<?php
if (!isset($_SESSION)) {
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
    <title>Voting Results</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 1000px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }
        .page-title {
            color: #35424a;
            text-align: center;
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 2rem;
            border-bottom: 2px solid #35424a;
            padding-bottom: 1rem;
        }
        .voting-results {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .voting-results th, .voting-results td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }
        .voting-results thead {
            background-color: #35424a;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        .voting-results tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .voting-results tbody tr:hover {
            background-color: #f1f1f1;
        }
        .language-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        .language-info {
            display: flex;
            align-items: center;
        }
        .language-name {
            font-weight: 600;
            font-size: 1.1rem;
            color: #35424a;
        }
        .no-results {
            color: #e8491d;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 1rem;
            }
            .voting-results th, .voting-results td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="page-title">Voting Results So Far</h1>
        <?php
        include "connection.php";
        $member = mysqli_query($con, 'SELECT * FROM languages');
        if (mysqli_num_rows($member) == 0) {
            echo '<p class="no-results">No results found</p>';
        } else {
            echo '<table class="voting-results">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Language</th>
                            <th>About</th>
                            <th>Votes</th>
                        </tr>
                    </thead>
                    <tbody>';
            while($mb = mysqli_fetch_object($member)) {
                echo '<tr>
                        <td>' . htmlspecialchars($mb->lan_id) . '</td>
                        <td class="language-info">
                            <img src="https://via.placeholder.com/50" alt="Language Image" class="language-image">
                            <span class="language-name">' . htmlspecialchars($mb->fullname) . '</span>
                        </td>
                        <td>' . htmlspecialchars($mb->about) . '</td>
                        <td>' . htmlspecialchars($mb->votecount) . '</td>
                    </tr>';
            }
            echo '</tbody></table>';
        }
        ?>
    </div>
</body>
</html>
