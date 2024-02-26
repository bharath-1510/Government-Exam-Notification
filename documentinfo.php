<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Exam Notification</title>
    <style>
        .radio-group {
            display: flex;
            width: 400px;
            gap: 20px;
        }

        .rb {
            width: 50px;
            display: flex;
        }

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
            max-width: 800px;
            width: 100%;
        }

        form label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="radio"] {
            margin-right: 5px;
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
            padding: 10px;
        }
    </style>
</head>

<body>
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
    <form action="" method="post" enctype="multipart/form-data">
        <div class="inline">
            <div class="col">
                <h2>Mandatory Documents</h2>
                <label for="resume">Upload Your Resume/CV (Only .doc, .docx, .pdf files allowed)</label>
                <input type="file" id="resume" name="resume" accept=".doc, .docx, .pdf" required>

                <label for="photo">Upload Your Photo (Only .jpg, .jpeg, .png files allowed)</label>
                <input type="file" id="photo" name="photo" accept=".jpg, .jpeg, .png" required>

                <label for="signature">Upload Your Signature (Only .jpg, .jpeg, .png files allowed)</label>
                <input type="file" id="signature" name="signature" accept=".jpg, .jpeg, .png" required>
            </div>
            <div class="col">
                <h2>Optional Fields</h2>
                <label for="typistCert">Have you completed any Typist Certification?</label>
                <div class="radio-group">
                    <div class="rb">

                        <input type="radio" name="typistCert" value="yes">
                        Yes
                    </div>
                    <div class="rb">

                        <input type="radio" name="typistCert" value="no" checked>
                        No
                    </div>
                </div>

                <label for="stenographerCert">Have you completed any Stenographer Certification?</label>
                <div class="radio-group">
                    <div class="rb">
                        <input type="radio" name="stenographerCert" value="yes">
                        Yes
                    </div>
                    <div class="rb">
                        <input type="radio" name="stenographerCert" value="no" checked>
                        No
                    </div>
                </div>


                <label for="computerCourseCert">Have you completed any Computer Course Certification?</label>
                <div class="radio-group">
                    <div class="rb">

                        <input type="radio" name="computerCourseCert" value="yes">
                        Yes
                    </div>
                    <div class="rb">

                        <input type="radio" name="computerCourseCert" value="no" checked>
                        No
                    </div>
                </div>

            </div>
        </div>
        <button type="submit">Save</button>


    </form>



</body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_GET['id'];
    $resume = file_get_contents($_FILES["resume"]["tmp_name"]);

    $photoBlob = file_get_contents($_FILES['photo']['tmp_name']);
    $signatureBlob = file_get_contents($_FILES['signature']['tmp_name']);

    $typistCert = $_POST["typistCert"] === "yes" ? 1 : 0;
    $stenographerCert = $_POST["stenographerCert"] === "yes" ? 1 : 0;
    $computerCourseCert = $_POST["computerCourseCert"] === "yes" ? 1 : 0;

    $dsn = 'mysql:host=localhost;dbname=students4244';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    // Insert data into the database
    $stmt = $pdo->prepare("INSERT INTO document_info (id,resume, photo, signature
     , typist_cert, stenography_cert, computer_course_cert
     ) VALUES ($id,:resume, :photo, :sign
     ,:typist, :steno, :cs
     )");

    $stmt->bindParam(':resume', $resume, PDO::PARAM_LOB);
    $stmt->bindParam(':photo', $photoBlob, PDO::PARAM_LOB);
    $stmt->bindParam(':sign', $signatureBlob, PDO::PARAM_LOB);

    $stmt->bindParam(':typist', $typistCert, PDO::PARAM_BOOL);
    $stmt->bindParam(':steno', $stenographerCert, PDO::PARAM_BOOL);
    $stmt->bindParam(':cs', $computerCourseCert, PDO::PARAM_BOOL);

    if ($stmt->execute()) {
        echo "<script>alert('Details Uploaded Succesfully')</script>";
        echo "<script>window.location.href = 'home.php?id=" . $id . "';</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
    mysqli_close($con);
}
?>


</html>