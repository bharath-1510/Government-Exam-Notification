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

        table {
            width: 95%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;

        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        td {
            width: 25%;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #b8b7b7;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        form,
        .exam-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            min-height: 500px;
            max-width: 525px;
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

        .col-2 {
            width: 49%;
        }

        .container {
            display: flex;
            width: 100%;
            padding: 10px;
            justify-content: space-between;
        }

        .table-container {
            overflow: auto;
            height: 430px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-2">
            <div class="exam-section">
                <h3>Applied Exam</h3>
                <div class="table-container">
                    <table>
                        <?php
                        $host = "localhost";
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
                        $examinfo = array();
                        $exam_keys = array();
                        $db_exam = array();
                        $sql1 = "SELECT * FROM exam_info";
                        $result1 = $con->query($sql1);
                        $appliedExam =  array();
                        while ($row = $result1->fetch_assoc()) {
                            $db_exam[$row["id"]] = $row["name"];
                        }
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($id === $row["id"]) {
                                    $currentDate = new DateTime();
                                    $sql1 = "SELECT * FROM exams where user_id=" . $id;
                                    $result1 = $con->query($sql1);
                                    if ($result1->num_rows > 0) {
                                        while ($row1 = $result1->fetch_assoc()) {

                                            if ($currentDate < $row1["exam_datetime"]) {
                                                $stmt = $con->prepare("UPDATE exams SET status = 1 WHERE id = " . $row1["id"]);
                                                $stmt->execute();
                                            }
                                            $exam_info = array();
                                            $exam_info["Datetime"] = $row1["exam_datetime"];
                                            $exam_info["Location"] = $row1["location"];
                                            $exam_info["Completed"] = $row1["status"] == 0 ? "No" : "Yes";
                                            $examinfo[$row1["exam_id"]] = $exam_info;
                                            $exam_keys = array_keys($exam_info);
                                        }
                                        echo "<td>Exam Name</td>";


                                        foreach ($exam_keys as $key) {
                                            echo "<td>" . $key . "</td>";
                                        }
                                        
                                        $id_key = array_keys($examinfo);

                                        foreach ($id_key as $key) {
                                            echo "<tr>";
                                            echo "<td>" . $db_exam[$key] . "</td>";
                                            array_push($appliedExam, $db_exam[$key]);
                                            foreach ($examinfo[$key] as $value) {
                                                echo "<td>" . $value . "</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        
                                    } else {
                                        echo "<h4>No Exams Applied</h4>";
                                    }
                                    $f = 0;
                                    break;
                                }
                            }

                            if ($f)
                                header("Location: index.php");
                        }

                        echo '
                    </table>
                </div>
            </div>
        </div>
        <div class="col-2">

            <form action="" method="post">

                <label>Exam name</label>
                <div class="select-container">
                    <select name="id">
                        <option value="">Select Option</option>';
                        $eligible = array(
                            "SSLC" => array("SSLC"),
                            "HSC" => array("SSLC", "HSC"),
                            "Diploma" => array("SSLC", "Diploma"),
                            "Graduation" => array("SSLC", "HSC", "Graduation"),
                            "Post Graduation" => array("SSLC", "HSC", "Graduation", "Post Graduation"),
                        );
                        $sql = "SELECT qualification FROM education_info where id =" . $id;
                        $result = $con->query($sql);


                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $graduationArray = $eligible[$row["qualification"]];
                                $sql1 = "SELECT id,name,qualification FROM exam_info";
                                $result1 = $con->query($sql1);
                                while ($row1 = $result1->fetch_assoc()) {
                                    if (in_array($row1["qualification"], $graduationArray) && !(in_array($row1["name"], $appliedExam)))

                                        echo "<option value=" . $row1["id"] . ">" . $row1["name"] . "</option>";
                                }
                            }
                        }

                        echo '
                        </select>
                        <div class="select-arrow">&#9660;</div>
                </div>
                <label>Exam Date</label>
                <div class="select-container">
                    <select name="date">
                        <option value="">Select Date</option>';
                        $currentDate = new DateTime();
                        $nextSaturday = clone $currentDate;
                        $nextSaturday->modify('next saturday');

                        // Calculate the next Sunday
                        $nextSunday = clone $nextSaturday;
                        $nextSunday->modify('next sunday');

                        // Format and display the results
                        echo "<option value=" . $nextSaturday->format('Y-m-d') . PHP_EOL . ">" . $nextSaturday->format('Y-m-d') . PHP_EOL . "</option>";
                        echo "<option value=" . $nextSunday->format('Y-m-d') . PHP_EOL . ">" . $nextSunday->format('Y-m-d') . PHP_EOL . "</option>";

                        echo '
                    </select>
                    <div class="select-arrow">&#9660;</div>
                </div>
                <label>Exam Time</label>
                <div class="select-container">
                    <select name="time">
                        <option value="">Select Time</option>';
                        $startTime = new DateTime('10:00');
                        $endTime = new DateTime('18:00');


                        $currentTime = clone $startTime;

                        while ($currentTime <= $endTime) {
                            echo
                            "<option value=" . $currentTime->format('H:i') . PHP_EOL . ">" . $currentTime->format('H:i') . PHP_EOL . "</option>";

                            $currentTime->add(new DateInterval('PT3H'));
                            $currentTime->add(new DateInterval('PT30M'));
                        }
                        echo '
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
                </div>';
                        echo '<button type="submit">Save</button>';

                        echo '
                        </form>
                </div>

            </div>
</body>';


                        use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\Exception;

                        require 'vendor/autoload.php';
                        $mail = new PHPMailer(true);

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            $id = $_GET['id'];
                            $date = $_POST["date"];
                            $time = $_POST["time"];
                            $exam_id = $_POST["id"];
                            $centre = $_POST["centre"];
                            $host = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "students4244";
                            $con = mysqli_connect($host, $username, $password, $dbname);
                            if (!$con) {
                                die("Connection failed!" . mysqli_connect_error());
                            }
                            $datetime = $date . ' ' . $time;
                            $sql1 = "SELECT * FROM exam_info";
                            $result1 = $con->query($sql1);
                            while ($row = $result1->fetch_assoc()) {
                                $db_exam[$row["id"]] = $row["name"];
                            }
                            $sql = "INSERT INTO exams (user_id,exam_id, exam_datetime, 
        location) VALUES (?, ?, ?,?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bind_param('iiss', $id, $exam_id, $datetime, $centre);
                            if ($stmt->execute()) {
                                try {
                                    $id = $_GET['id'];
                                    $sql = "SELECT name,email FROM login_info where id = " . $id;
                                    $result = $con->query($sql);
                                    $name = "";
                                    $email = "";

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $email = $row["email"];
                                        }
                                    }
                                    $mail->isSMTP();
                                    $mail->Host       = 'smtp.gmail.com';
                                    $mail->SMTPAuth   = true;
                                    $mail->Username   = 'governmentapp168@gmail.com';
                                    $mail->Password   = 'qivt ulit qbbw gfjo';
                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                                    $mail->Port       = 465;


                                    $mail->setFrom('governmentapp168@gmail.com', 'Government App');
                                    $mail->addAddress($email, $name);


                                    $mail->isHTML(true);
                                    $mail->Subject = 'Government Exam Notification';
                                    $mail->Body    = '<br><br><br>You have Applied for ' . $db_exam[$exam_id] .
                                        ' Exam.<br><br>Location : ' . $centre .
                                        "<br>Time : " . $time .
                                        "<br>Date : " . $date . "<br><br><br><h3>THANKYOU</h3>";

                                    $mail->send();
                                    echo "<script>alert('Exam Applied Succesfully and Invitation Sent')</script>";
                                } catch (Exception $e) {
                                    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
                                }
                                echo "<script>window.location.href = 'home.php?id=" . $id . "';</script>";
                            } else {
                                echo "<script>alert('Error')</script>";
                            }
                            mysqli_close($con);
                        }
                        ?>


</html>
