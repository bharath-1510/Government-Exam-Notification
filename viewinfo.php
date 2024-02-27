<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Examination Notification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Use a different font for the headings and body text */
        @import url('https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            padding: 0px;
            background-color: #7a7373;
            color: white;
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
            width: 50%;
        }

        th {
            background-color: #f2f2f2;
        }

        td:nth-child(odd) {
            background-color: #b8b7b7;
        }

        tr:hover {
            background-color: #f1f1f1;
        }



        h1,
        h2,
        h3 {
            margin-top: 10px;
            text-transform: uppercase;

            font-weight: 700;
            text-align: center;
        }


        .heading {
            text-align: center;
            padding: 10px;
        }

        .col-2 {
            width: 49%;
            margin-top: 40px;
        }

        .column {
            width: 100%;
            height: 525px;
            flex-wrap: wrap;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 10px;
            text-align: center;
            font-size: 1rem;
            color: black;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="exam-details">

        <h1>information</h1>
        <div class="column">
            <div class="col-2">
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
                $sql = "SELECT id,email FROM login_info";
                $result = $con->query($sql);
                $f = 1;
                $info = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($id === $row["id"]) {
                            $info["Email"] =
                                $row["email"];

                            $sql1
                                = "SELECT * FROM contact_info where id=" . $id;
                            $sql2
                                = "SELECT * FROM document_info where id=" . $id;
                            $sql3
                                = "SELECT * FROM education_info  where id=" . $id;
                            $sql4
                                = "SELECT * FROM personal_info where id=" . $id;
                            $result1 = $con->query($sql1);
                            $result2 = $con->query($sql2);
                            $result3 = $con->query($sql3);
                            $result4 = $con->query($sql4);

                            while ($row1 = $result1->fetch_assoc()) {
                                $info["Phone Number"] = $row1["phonenumber"];
                                $info["State"] = $row1["state"];
                                $info["Nationality"] = $row1["nationality"];
                                $info["Address"] = $row1["address"];
                                $info["Pincode"] = $row1["pincode"];
                            }
                            while ($row1 = $result2->fetch_assoc()) {
                                $info["Typist Certificate"] = $row1["typist_cert"] == 0 ? "No" : "Yes";
                                $info["Stenography Certificate"] = $row1["stenography_cert"] == 0 ? "No" : "Yes";
                                $info["Computer Course Certificate"] = $row1["computer_course_cert"] == 0 ? "No" : "Yes";
                            }
                            while ($row1 = $result3->fetch_assoc()) {
                                $info["Field of Study"] = strtoupper($row1["field"]);
                                $info["Year of Passing"] = $row1["year_of_passing"];
                                $info["Mark"] = $row1["mark"];
                                $info["Qualification"] = $row1["qualification"];
                            }
                            while ($row1 = $result4->fetch_assoc()) {
                                $info["Date of Birth"] = $row1["dob"];
                                $info["Differently Abled"] = $row1["differently_abled"] == 0 ? "No" : "Yes";
                                $info["Refugee"] = $row1["refugee"] == 0 ? "No" : "Yes";
                                $info["Religion"] = strtoupper($row1["religion"]);
                                $info["Community"] = strtoupper($row1["community"]);
                                $info["Gender"] = ucfirst($row1["gender"]);
                                $info["Full name"] = $row1["full_name"];
                            }


                            $f = 0;
                            break;
                        }
                    }
                    if ($f)
                        header("Location: index.php");
                    $table1 = array(
                        "Full name", "Email", "Gender", "Community", "Religion", "Date of Birth",
                        "Differently Abled", "Refugee", "Phone Number", "Nationality"
                    );
                    $table2 = array(
                        "State",  "Address", "Pincode", "Field of Study",
                        "Year of Passing", "Mark", "Qualification", "Typist Certificate",
                        "Stenography Certificate", "Computer Course Certificate"
                    );
                    echo "
                        <table>";
                    foreach ($table1 as $value) {
                        echo "<tr>
                                <td>$value</td>
                                <td>" . $info[$value] . "</td>
                            </tr>";
                    }


                    echo "
                            </table>
                        </div>
                        <div class='col-2'>
                        <table>";
                    foreach ($table2 as $value) {
                        echo "<tr>
                                <td>$value</td>
                                <td>" . $info[$value] . "</td>
                            </tr>";
                    }
                    echo "   </table>
                        </div>
                        ";
                }
                ?>
            </div>
        </div>


</body>

</html>