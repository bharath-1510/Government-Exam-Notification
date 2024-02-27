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
        <h2>Exam Apply</h2>
        <label>Exam name</label>
        <div class="select-container">
            <select name="id">
                <option value="">Select Option</option>
                <?php
                $eligible = array(
                    "SSLC" => array("SSLC"),
                    "HSC" => array("SSLC", "HSC"),
                    "Diploma" => array("SSLC", "Diploma"),
                    "Graduation" => array("SSLC", "HSC", "Graduation"),
                    "Post Graduation" => array("SSLC", "HSC", "Graduation", "Post Graduation"),
                );
                $host = "localhost:3308";
                $username = "root";
                $password = "";
                $dbname = "students4244";
                $con = mysqli_connect($host, $username, $password, $dbname);
                if (!$con) {
                    die("Connection failed!" . mysqli_connect_error());
                }
                $id = $_GET['id'];
                $sql = "SELECT qualification FROM education_info where id =" . $id;
                $result = $con->query($sql);


                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $graduationArray = $eligible[$row["qualification"]];
                        $sql1 = "SELECT id,name,qualification FROM exam_info";
                        $result1 = $con->query($sql1);
                        while ($row1 = $result1->fetch_assoc()) {
                            if (in_array($row1["qualification"], $graduationArray))
                                echo "<option value=" . $row1["id"] . ">" . $row1["name"] . "</option>";
                        }
                    }
                }

                ?>

            </select>
            <div class="select-arrow">&#9660;</div>
        </div>
        <label>Exam Date</label>
        <div class="select-container">
            <select name="date">
                <option value="">Select Date</option>
                <?php
                $currentDate = new DateTime();
                $nextSaturday = clone $currentDate;
                $nextSaturday->modify('next saturday');

                // Calculate the next Sunday
                $nextSunday = clone $nextSaturday;
                $nextSunday->modify('next sunday');

                // Format and display the results
                echo "<option value=" . $nextSaturday->format('Y-m-d') . PHP_EOL . ">" . $nextSaturday->format('Y-m-d') . PHP_EOL . "</option>";
                echo "<option value=" . $nextSunday->format('Y-m-d') . PHP_EOL . ">" . $nextSunday->format('Y-m-d') . PHP_EOL . "</option>";

                ?>
            </select>
            <div class="select-arrow">&#9660;</div>
        </div>
        <label>Exam Time</label>
        <div class="select-container">
            <select name="time">
                <option value="">Select Time</option>
                <?php
                $startTime = new DateTime('10:00');
                $endTime = new DateTime('18:00');


                $currentTime = clone $startTime;

                while ($currentTime <= $endTime) {
                    echo
                    "<option value=" . $currentTime->format('H:i') . PHP_EOL . ">" . $currentTime->format('H:i') . PHP_EOL . "</option>";

                    $currentTime->add(new DateInterval('PT3H'));
                    $currentTime->add(new DateInterval('PT30M'));
                }
                ?>
            </select>
            <div class="select-arrow">&#9660;</div>
        </div>
        <label>Exam Centre</label>

        <div class="select-container">
            <select name="centre">
                <option value="Select Centre">Select Centre</option>
                <option value="Chennai">Chennai </option>
                <option value="Coimbatore">Coimbatore</option>
                <option value="Madurai">Madurai</option>
                <option value="Tiruchirappalli">Tiruchirappalli </option>
                <option value="Salem">Salem</option>
                <option value="Tirunelveli">Tirunelveli</option>
                <option value="Erode">Erode</option>
                <option value="Vellore">Vellore</option>
                <option value="Thanjavur">Thanjavur </option>
                <option value="cuddalore">Cuddalore</option>
                <option value="villupuram">villupuram</option>
            </select>
            <div class="select-arrow">&#9660;</div>
        </div>
        <button type="submit">Save</button>
    </form>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $exam_id = $_POST["id"];
    $centre = $_POST["centre"];
    $host = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "students4244";
    $con = mysqli_connect($host, $username, $password, $dbname);
    if (!$con) {
        die("Connection failed!" . mysqli_connect_error());
    }
    $datetime = $date . ' ' . $time;

    $sql = "INSERT INTO exams (user_id,exam_id, exam_datetime, 
        location) VALUES (?, ?, ?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('iiss', $id, $exam_id, $datetime, $centre);
    if ($stmt->execute()) {
        echo "<script>alert('Exam Applied Succesfully')</script>";
        echo "<script>window.location.href = 'home.php?id=" . $id . "';</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
    mysqli_close($con);
}
?>


</html>