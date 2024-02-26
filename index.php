<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Exam Notification</title>
    <style>
        a {
            cursor: pointer;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 97vh;

        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        form label {
            display: block;
            margin-bottom: 8px;
        }

        form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        form button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 23px;
            text-transform: uppercase;
        }

        form button:hover {
            background-color: #45a049;
        }

        .switch-form {
            text-align: center;
            margin-top: 16px;
        }

        .switch-form a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <form id="login-form" action="personal.php">
        <h2>Login</h2>
        <input type="text" id="username" name="username" placeholder="Username" required>

        <input type="password" id="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>

        <div class="switch-form">
            <p>Don't have an account? <a onclick="switchForm('signup-form')">Sign Up</a></p>
        </div>
    </form>

    <form id="signup-form" style="display: none;" action="" method="post">
        <h2>Sign Up</h2>
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
        <button type="submit">Sign Up</button>

        <div class="switch-form">
            <p>Already have an account? <a onclick="switchForm('login-form')">Login</a></p>
        </div>
    </form>

    <script>
        function switchForm(formId) {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('signup-form').style.display = 'none';

            document.getElementById(formId).style.display = 'block';
        }
    </script>

</body>
<?php
if (
    isset($_POST["username"]) && isset($_POST["email"])
    && isset($_POST["password"]) && isset($_POST["confirm-password"])
) {
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y H:i:s');
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "students4244";
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y H:i:s');
    $con = mysqli_connect($host, $username, $password, $dbname);
    if (!$con) {
        die("Connection failed!" . mysqli_connect_error());
    }

    mysqli_close($con);
} 
?>

</html>