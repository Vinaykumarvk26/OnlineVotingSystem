<?php
if(!isset($_SESSION)) { 
    session_start();
}
include "auth.php";
include "header_voter.php";
include "connection.php";

// Simulating additional voter information
$voterInfo = [
    'age' => rand(18, 80),
    'gender' => ['Male', 'Female', 'Non-binary'][rand(0, 2)],
    'district' => 'District ' . rand(1, 10),
    'registrationDate' => date('Y-m-d', strtotime('-' . rand(1, 365) . ' days')),
    'votingCenter' => 'Center ' . rand(1, 20)
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailed Voter Information</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 20px;
        }
        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-right: 30px;
            border: 4px solid #4a90e2;
        }
        h1 {
            color: #2c3e50;
            margin: 0;
            font-size: 2.2em;
        }
        .voter-id {
            background-color: #4a90e2;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9em;
            margin-top: 10px;
            display: inline-block;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .info-item {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .info-item h3 {
            margin: 0 0 10px 0;
            color: #4a90e2;
            font-size: 1.1em;
        }
        .status {
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 30px;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .voted {
            background-color: #2ecc71;
            color: white;
        }
        .not-voted {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://api.dicebear.com/6.x/avataaars/svg?seed=<?php echo $_SESSION['SESS_NAME']; ?>" alt="Voter Avatar" class="avatar">
            <div>
                <h1>Welcome, <?php echo $_SESSION['SESS_NAME']; ?></h1>
                <span class="voter-id">Voter ID: <?php echo rand(100000, 999999); ?></span>
            </div>
        </div>
        <div class="info-grid">
            <div class="info-item">
                <h3>Age</h3>
                <p><?php echo $voterInfo['age']; ?> years</p>
            </div>
            <div class="info-item">
                <h3>Gender</h3>
                <p><?php echo $voterInfo['gender']; ?></p>
            </div>
            <div class="info-item">
                <h3>District</h3>
                <p><?php echo $voterInfo['district']; ?></p>
            </div>
            <div class="info-item">
                <h3>Registration Date</h3>
                <p><?php echo $voterInfo['registrationDate']; ?></p>
            </div>
            <div class="info-item">
                <h3>Voting Center</h3>
                <p><?php echo $voterInfo['votingCenter']; ?></p>
            </div>
        </div>
        <?php
        $username = $_SESSION['SESS_NAME'];
        $query = 'SELECT status, voted FROM voters WHERE username="'.$_SESSION['SESS_NAME'].'"';
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['status'] == "VOTED") {
                echo "<div class='status voted'>You have voted for: " . $row['voted'] . "</div>";
            } else {
                echo "<div class='status not-voted'>You have not voted yet. Please submit your vote!</div>";
            }
        } else {
            echo "<div class='status not-voted'>Error retrieving voter information.</div>";
        }
        ?>
    </div>
</body>
</html>