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
            background-color: #7a7373;
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
            background-color: #007bff;
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
            background-color: #007bff;
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
    <form id="login-form" action="" method="post">
        <h2>Login</h2>
        <input type="text" id="email" name="email" placeholder="Email" required>

        <input type="password" id="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>

        <div class="switch-form">
            <p>Don't have an account? <a onclick="switchForm('signup-form')">Sign Up</a></p>
        </div>
    </form>

    <form id="signup-form" style="display: none;" action="" method="post">
        <h2>Sign Up</h2>
        <input type="text" id="username" name="username" placeholder="Enter Email's Username" required>
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
    try {
        $name = $_POST["username"];
        $email = $_POST["email"];
        $userPassword = $_POST["password"];
        if ($userPassword !== $_POST["confirm-password"]) {
            echo "<script>alert('Password Not Match');</script>";
        } else {
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d H:i:s');
            $host = "localhost:3308";
            $username = "root";
            $password = "";
            $dbname = "students4244";
            $con = mysqli_connect($host, $username, $password, $dbname);
            if (!$con) {
                die("Connection failed!" . mysqli_connect_error());
            }
            $sql = "INSERT INTO login_info (name, email, createdAt,password) VALUES (?, ?, ?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param('ssss', $name, $email, $date, $userPassword);
            if ($stmt->execute()) {
                echo "<script>alert('User Registration Done')</script>";
            } else {
                echo "<script>alert('Error')</script>";
            }
            mysqli_close($con);
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            echo "<script>alert('Error: User Already Exists.')</script>";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
} else
if (
    isset($_POST["email"]) && isset($_POST["password"])
) {
    $email = $_POST["email"];
    $userPassword = $_POST["password"];
    $host = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "students4244";
    $con = mysqli_connect($host, $username, $password, $dbname);
    if (!$con) {
        die("Connection failed!" . mysqli_connect_error());
    }
    $sql = "SELECT id,email,password FROM login_info";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($email === $row["email"] && $userPassword === $row['password']) {
                $id = $row['id'];
                header("Location: home.php?id=$id");
                break;
            }
        }
        echo "<script>alert('Password Mismatches')</script>";
    } else {
        echo "<script>alert('User Not Found')</script>";
    }
    $con->close();
}
?>

</html>