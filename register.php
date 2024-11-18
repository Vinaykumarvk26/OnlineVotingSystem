<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    h3 {
        color: #333;
        margin-top: 20px;
    }

    form {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: auto;
    }

    label, input {
        font-size: 1rem;
        color: #333;
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0 16px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus, input[type="password"]:focus {
        border-color: #4CAF50;
        outline: none;
    }

    .g-recaptcha {
        margin: 16px 0;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .error-message {
        color: red;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }
</style>

<script src='https://www.google.com/recaptcha/api.js'></script>
<?php include "header.php";
if(!isset($_SESSION)) {
session_start();
}   
if (isset($_SESSION['SESS_NAME'])!="") {
 header("Location: voter.php");
}
?>
<br><br>
<center>
<legend> <h3> Register </h3></legend> <center>
<?php global $nam; echo $nam; ?> 
<?php global $error; echo $error; ?>
<center>
<form action="reg_action.php" method="post" id="myform">
    Firstname:
    <input type="text" name="firstname" value="" />
    <br>
    Lastname: 
    <input type="text" name="lastname" value="" />
    <br>
    Username: 
    <input type="text" name="username" value="" />
    <br>
    Password: 
    <input type="password" name="password" value="" />
    <br>
    <div class="g-recaptcha" data-sitekey="6LeD3hEUAAAAAKne6ua3iVmspK3AdilgB6dcjST0"></div> 
    <br>
    <input type="submit" name="submit" value="Next" />
</form>
</center>

<script type="text/javascript">
    var frmvalidator = new Validator("myform"); 
    frmvalidator.addValidation("firstname", "req", "Please enter student firstname"); 
    frmvalidator.addValidation("firstname", "maxlen=50");
    frmvalidator.addValidation("lastname", "req", "Please enter student lastname"); 
    frmvalidator.addValidation("lastname", "maxlen=50");
    frmvalidator.addValidation("username", "req", "Please enter student username"); 
    frmvalidator.addValidation("username", "maxlen=50");
    frmvalidator.addValidation("password", "req", "Please enter student password"); 
    frmvalidator.addValidation("password", "minlen=6", "Password must not be less than 6 characters.");
</script>
<?php include "footer.php"; ?>
