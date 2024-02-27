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


        form input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
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
        <h2>Contact Information</h2>
        <textarea name="address" id="address" cols="30" rows="5" placeholder="Address"></textarea>

        <input type="text" id="state" name="state" placeholder="State" required>
        <input type="text" id="nationality" name="nationality" placeholder="Nationality" required>
        <input type="number" inputmode="numeric" id="pincode" name="pincode" placeholder="Pincode" required>
        <input type="tel" id="phonenumber" name="phonenumber" placeholder="Phone Number" required>
        <button type="submit">Save</button>
    </form>



</body>';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_GET['id'];

        $address = $_POST["address"];
        $state = $_POST["state"];
        $nationality = $_POST["nationality"];
        $pincode = $_POST["pincode"];
        $phonenumber = $_POST["phonenumber"];



        $sql = "INSERT INTO contact_info (id,address, state, 
        nationality,pincode,phonenumber) VALUES (?, ?, ?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('isssss', $id, $address, $state, $nationality, $pincode, $phonenumber);
        if ($stmt->execute()) {
            echo "<script>alert('Contact Information Saved')</script>";
            echo "<script>window.location.href = 'home.php?id=" . $id . "';</script>";
        } else {
            echo "<script>alert('Error')</script>";
        }
        mysqli_close($con);
    }
    ?>


</html>