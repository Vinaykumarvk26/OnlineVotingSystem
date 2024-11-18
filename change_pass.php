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
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h3 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }
        h4 {
            color: #e60808;
            text-align: center;
            margin-bottom: 15px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        .error {
            color: #e74c3c;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Change Password</h3>
        <h4><?php global $nam; echo $nam;?></h4>
        <div class="error"><?php global $error; echo $error;?></div>

        <form action="change_pass_action.php" method="post" id="myform">
            <label for="cpassword">Current Password:</label>
            <input type="password" name="cpassword" id="cpassword" value="">

            <label for="npassword">New Password:</label>
            <input type="password" name="npassword" id="npassword" value="">

            <label for="cnpassword">Confirm New Password:</label>
            <input type="password" name="cnpassword" id="cnpassword" value="">

            <input type="submit" name="cpass" value="UPDATE">
        </form>
    </div>

    <script type="text/javascript">
    var frmvalidator = new Validator("myform"); 
    frmvalidator.addValidation("cpassword","req","Please enter Current Password"); 
    frmvalidator.addValidation("cpassword","maxlen=50");
    frmvalidator.addValidation("npassword","req","Please enter New Password"); 
    frmvalidator.addValidation("npassword","maxlen=50");
    frmvalidator.addValidation("cnpassword","req","Please enter Confirm New Password"); 
    frmvalidator.addValidation("cnpassword","maxlen=50");
    </script>

    <?php include "footer.php";?>
</body>
</html>