<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Exam Notification</title>
    <style>
        .select-container {
            position: relative;
            width: 100%;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        /* Style the select box */
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            appearance: none;

        }

        /* Style the arrow icon for select box */
        .select-arrow {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
            /* Ensure the arrow doesn't interfere with select box click */
        }


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

        .inline {
            display: flex;
            justify-content: space-between;
        }

        .col {
            width: 49%;
        }
    </style>
</head>

<body>
    <?php
    $host = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "students4244";
    $con = mysqli_connect($host, $username, $password, $dbname);
    if (!$con) {
        die("Connection failed!" . mysqli_connect_error());
    }
    $id = $_GET['id'];
    $sql = "SELECT id FROM login_info";
    $result = $con->query($sql);
    $f = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($id === $row["id"]) {
                $f = 0;
                break;
            }
        }
        if ($f)
            header("Location: index.php");
    }
    ?>
    <form action="" method="post">
        <h2>Personal Information</h2>
        <label>Full Name</label>
        <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
        <div class="inline">
            <div class="col">
                <label>Gender</label>
                <div class="select-container">
                    <select name="gender">
                        <option value="">Select Option</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                    <div class="select-arrow">&#9660;</div>
                </div>
            </div>
            <div class="col">
                <label>Community</label>
                <div class="select-container">
                    <select name="community">
                        <option value="">Select Option</option>
                        <option value="general">General</option>
                        <option value="obc">OBC</option>
                        <option value="sc">SC</option>
                        <option value="st">ST</option>
                    </select>
                    <div class="select-arrow">&#9660;</div>
                </div>
            </div>

        </div>
        <label>Religion</label>
        <input type="text" id="religion" name="religion" placeholder="Religion" required>
        <div class="inline">
            <div class="col">
                <label>Differently Abled</label>
                <div class="select-container">
                    <select name="disabled">
                        <option value="">Select Option</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <div class="select-arrow">&#9660;</div>
                </div>
            </div>
            <div class="col">
                <label>Srilankan Tamil Refugee</label>
                <div class="select-container">
                    <select name="refugee">
                        <option value="">Select Option</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <div class="select-arrow">&#9660;</div>
                </div>
            </div>

        </div>
        <label for="dob">Date of Birth</label><input type="date" id="dob" name="dob" required>
        <button type="submit">Save</button>


    </form>



</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];

    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $community = $_POST["community"];
    $religion = $_POST["religion"];
    $disabled = $_POST["disabled"] === "yes" ? 1 : 0;
    $refugee = $_POST["refugee"] === "yes" ? 1 : 0;
    $dob = $_POST["dob"];
    $host = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "students4244";
    $con = mysqli_connect($host, $username, $password, $dbname);
    if (!$con) {
        die("Connection failed!" . mysqli_connect_error());
    }


    $sql = "INSERT INTO personal_info (id,full_name, gender, 
        community,religion,refugee,differently_abled,dob) VALUES (?, ?, ?,?,?,?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('issssiis', $id, $fullname, $gender, $community, $religion, $refugee, $disabled, $dob);
    if ($stmt->execute()) {
        echo "<script>alert('Personal Information Saved')</script>";
        echo "<script>window.location.href = 'home.php?id=" . $id . "';</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
    mysqli_close($con);
}
?>


</html>