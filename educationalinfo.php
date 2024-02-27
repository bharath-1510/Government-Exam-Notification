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
    echo '
    <form action="" method="post">
        <h2>Education Information</h2>
        <label>Qualification</label>
        <div class="select-container">
            <select name="qualification">
                <option value="">Select Qualification</option>
                <option value="SSLC">SSLC</option>
                <option value="HSC">HSC</option>
                <option value="Diploma">Diploma</option>
                <option value="Graduation">Graduation</option>
                <option value="Post Graduation">Post Graduation</option>
            </select>
            <div class="select-arrow">&#9660;</div>
        </div>
        <label for="field">Field of Study</label>
        <input type="text" id="field" name="field" placeholder="Computer Science, Mechanical ,.etc if not applicable, Please fill NA" required>

        <label for="yop">Year of Passing</label>
        <input type="number" id="yop" name="yop" min="1900" max="2099" step="1" required>

        <label for="mark">Percentage/CGPA:</label>
        <input type="number" id="mark" name="mark" min="0" max="100" step="0.01" required>
        <button type="submit">Save</button>


    </form>



</body>';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_GET['id'];

        $qualification = $_POST["qualification"];
        $field = $_POST["field"];
        $yop = $_POST["yop"];
        $mark = $_POST["mark"];



        $sql = "INSERT INTO education_info (id,qualification, field, 
        year_of_passing,mark) VALUES (?, ?, ?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('issid', $id, $qualification, $field, $yop, $mark);
        if ($stmt->execute()) {
            echo "<script>alert('Education Information Saved')</script>";
            echo "<script>window.location.href = 'home.php?id=" . $id . "';</script>";
        } else {
            echo "<script>alert('Error')</script>";
        }
        mysqli_close($con);
    }

    ?>


</html>